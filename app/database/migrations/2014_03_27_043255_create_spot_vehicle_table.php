<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSpotVehicleTable extends Migration {

	public function up()
	{
		Schema::create('spot_vehicle', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('spot_id')->unsigned();
			$table->integer('vehicle_id')->unsigned();
			$table->date('date_start');
			$table->date('date_end')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('spot_vehicle');
	}
}