<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSpotsTable extends Migration {

	public function up()
	{
		Schema::create('spots', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('vehicle_type_id')->unsigned();
			$table->text('description');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('spots');
	}
}