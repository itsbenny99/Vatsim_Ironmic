<?php

namespace Tests\Feature;

use App\Models\Approach;
use App\Models\Center;
use App\Models\Delivery;
use App\Models\FlightServiceStation;
use App\Models\Ground;
use App\Models\Tower;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class DownloadVATSIMData extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function get_vatsim_data()
    {
        $json = \GuzzleHttp\json_decode(file_get_contents("http://cluster.data.vatsim.net/vatsim-data.json"));
        $controllers = collect($json->clients)->filter(function($item) {
            return !Str::contains($item->callsign, "ATIS") and $item->frequency !== "199.998" and $item->clienttype == "ATC";
        });

        $DEL = $controllers->filter(function($item) {
            return Str::contains($item->callsign, "DEL");
        });

        $GND = $controllers->filter(function($item) {
            return Str::contains($item->callsign, "GND");
        });

        $TWR = $controllers->filter(function($item) {
            return Str::contains($item->callsign, "TWR");
        });

        $APP = $controllers->filter(function($item) {
            return Str::contains($item->callsign, "APP");
        });

        $CTR = $controllers->filter(function($item) {
            return Str::contains($item->callsign, "CTR");
        });

        $FSS = $controllers->filter(function($item) {
            return Str::contains($item->callsign, "FSS");
        });

        foreach($controllers as $controller) {
            if (Str::contains($controller->callsign, "DEL")) {
                $this->create_new_controller(Ground::class, $controller);
            }
            if (Str::contains($controller->callsign, "GND")) {
                $this->create_new_controller(Ground::class, $controller);
            }
            if (Str::contains($controller->callsign, "TWR")) {
                $this->create_new_controller(Tower::class, $controller);
            }
            if (Str::contains($controller->callsign, "CTR")) {
                $this->create_new_controller(Center::class, $controller);
            }
            if (Str::contains($controller->callsign, "FSS")) {
                $this->create_new_controller(FlightServiceStation::class, $controller);
            }
        }

        $first = Delivery::all()->toArray();
        dd($first);

    }

    public function validate_controller($controllers, $model) {
        $sessions = $model::where(["session_end" => false])->get();
        foreach ($sessions as $session) {

            foreach ($controllers as $controller) {

                if ($session->realname !== $controller->realname) {
                    
                }

            }

        }

        if ($session = $model::where(["session_end" => false], ["callsign" => $controller->callsign], ["fullname" => $controller->name])->first()) {
            $session->time_online
                = Carbon::parse($session->time_online)->addMinute();
            $session->save();
        } else {

        }
    }

    public function create_position_array($controller)

    public function create_new_controller($model, $controller) {
        $data = new $model();
        $data->position = $controller->callsign;
        $data->frequency = $controller->frequency;
        $data->time_online = Carbon::now()->startOfDay()->format('H:i:s');
        $data->save();
    }
}
