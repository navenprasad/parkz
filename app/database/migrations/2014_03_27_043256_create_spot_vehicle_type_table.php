<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSpotVehicleTypeTable extends Migration {

	public function up()
	{
		Schema::create('spot_vehicle_type', function(Blueprint $table) {
			$table->timestamps();
			$table->integer('spot_id')->unsigned();
			$table->integer('vehicle_type_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('spot_vehicle_type');
	}
}