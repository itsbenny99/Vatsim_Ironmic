<?php

namespace App\Console\Commands;

use App\Models\Approach;
use App\Models\Center;
use App\Models\Delivery;
use App\Models\FlightServiceStation;
use App\Models\Ground;
use App\Models\Tower;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class DownloadData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'VATSIM:Download';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download & Parse new vatsim data.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $json = \GuzzleHttp\json_decode(file_get_contents("http://cluster.data.vatsim.net/vatsim-data.json"));
        $atcTypes = [
            [
                "type" => "DEL",
                "model" => Delivery::class
            ],
            [
                "type" => "GND",
                "model" => Ground::class
            ],
            [
                "type" => "TWR",
                "model" => Tower::class
            ],
            [
                "type" => "APP",
                "model" => Approach::class
            ],
            [
                "type" => "CTR",
                "model" => Center::class
            ],
            [
                "type" => "FSS",
                "model" => FlightServiceStation::class
            ],
        ];
        $controllers = collect($json->clients)->filter(function($item) {
            return !Str::contains($item->callsign, "ATIS") and !Str::contains($item->callsign, "_X_") and !Str::contains($item->callsign, "_M_") and $item->frequency !== "199.998" and $item->clienttype == "ATC";
        });

        foreach ($atcTypes as $atc) {
            $this->validate_controller(($controllers->filter(function($item) use ($atc) {
                return Str::contains($item->callsign, $atc["type"]);
            })), $atc["model"]);
        }
    }

    public function validate_controller($controllers, $model) {
        $sessions = $model::where(["session_end" => false])->get();
        foreach ($sessions as $session) {
            if ($controllers) {
                if (!in_array($session->cid, $controllers->pluck('cid')->toArray())) {
                    $this->end_session($session, $model);
                } else {
                    $this->increase_minute($session, $model);
                }
            }
        }
        foreach ($controllers as $controller) {
            $sessions = $model::where(["session_end" => false, "position" => $controller->callsign, "cid" => $controller->cid])->first();
            if (!$sessions) {
                $this->start_session($controller, $model);
            }
        }
    }

    public function increase_minute($controller, $model) {
        $controller->time_online = Carbon::parse($controller->time_online)->addMinute();
        $controller->save();
    }

    public function end_session($controller, $model) {
        $controller->session_end = true;
        $controller->save();
    }

    public function start_session($controller, $model) {
        $data = new $model();
        $data->realname = $controller->realname;
        $data->cid = $controller->cid;
        $data->position = $controller->callsign;
        $data->frequency = $controller->frequency;
        $data->time_online = Carbon::now()->startOfDay()->format('H:i:s');
        $data->save();
    }
}
