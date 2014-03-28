<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInvoicesTable extends Migration {

	public function up()
	{
		Schema::create('invoices', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('spot_vehicle_id')->unsigned();
			$table->decimal('amount');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('invoices');
	}
}