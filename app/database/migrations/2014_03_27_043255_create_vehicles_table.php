<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVehiclesTable extends Migration {

	public function up()
	{
		Schema::create('vehicles', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('customer_id')->unsigned();
			$table->integer('vehicle_type_id')->unsigned();
			$table->string('brand', 100)->nullable();
			$table->string('model', 100)->nullable();
			$table->string('color', 100)->nullable();
			$table->string('license_plate', 25);
			$table->decimal('price');
			$table->date('rent_due');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('vehicles');
	}
}