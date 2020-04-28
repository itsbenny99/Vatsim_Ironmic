<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightServiceStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flight_service_stations', function (Blueprint $table) {
            $table->id();
            $table->string('realname');
            $table->bigInteger('cid');
            $table->string('position');
            $table->float('frequency');
            $table->boolean('session_end')->default(false);
            $table->time("time_online");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flight_service_stations');
    }
}
