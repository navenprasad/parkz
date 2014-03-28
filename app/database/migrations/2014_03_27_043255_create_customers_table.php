<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomersTable extends Migration {

	public function up()
	{
		Schema::create('customers', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('last_name');
			$table->string('street_name')->nullable();
			$table->integer('street_number')->nullable();
			$table->string('suburb')->nullable();
			$table->string('dni');
			$table->string('email')->nullable();
			$table->string('home_phone')->nullable();
			$table->string('mobile_phone')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('customers');
	}
}