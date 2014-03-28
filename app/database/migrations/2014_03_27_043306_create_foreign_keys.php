php<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('spots', function(Blueprint $table) {
			$table->foreign('vehicle_type_id')->references('id')->on('vehicle_types')
						->onDelete('restrict')
						->onUpdate('cascade');
		});
		Schema::table('vehicles', function(Blueprint $table) {
			$table->foreign('customer_id')->references('id')->on('customers')
						->onDelete('restrict')
						->onUpdate('cascade');
		});
		Schema::table('vehicles', function(Blueprint $table) {
			$table->foreign('vehicle_type_id')->references('id')->on('vehicle_types')
						->onDelete('restrict')
						->onUpdate('cascade');
		});
		Schema::table('invoices', function(Blueprint $table) {
			$table->foreign('spot_vehicle_id')->references('id')->on('spot_vehicle')
						->onDelete('restrict')
						->onUpdate('cascade');
		});
		Schema::table('spot_vehicle', function(Blueprint $table) {
			$table->foreign('spot_id')->references('id')->on('spots')
						->onDelete('restrict')
						->onUpdate('cascade');
		});
		Schema::table('spot_vehicle', function(Blueprint $table) {
			$table->foreign('vehicle_id')->references('id')->on('vehicles')
						->onDelete('restrict')
						->onUpdate('cascade');
		});
		Schema::table('spot_vehicle_type', function(Blueprint $table) {
			$table->foreign('spot_id')->references('id')->on('spots')
						->onDelete('restrict')
						->onUpdate('cascade');
		});
		Schema::table('spot_vehicle_type', function(Blueprint $table) {
			$table->foreign('vehicle_type_id')->references('id')->on('vehicle_types')
						->onDelete('restrict')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('spots', function(Blueprint $table) {
			$table->dropForeign('spots_vehicle_type_id_foreign');
		});
		Schema::table('vehicles', function(Blueprint $table) {
			$table->dropForeign('vehicles_customer_id_foreign');
		});
		Schema::table('vehicles', function(Blueprint $table) {
			$table->dropForeign('vehicles_vehicle_type_id_foreign');
		});
		Schema::table('invoices', function(Blueprint $table) {
			$table->dropForeign('invoices_spot_vehicle_id_foreign');
		});
		Schema::table('spot_vehicle', function(Blueprint $table) {
			$table->dropForeign('spot_vehicle_spot_id_foreign');
		});
		Schema::table('spot_vehicle', function(Blueprint $table) {
			$table->dropForeign('spot_vehicle_vehicle_id_foreign');
		});
		Schema::table('spot_vehicle_type', function(Blueprint $table) {
			$table->dropForeign('spot_vehicle_type_spot_id_foreign');
		});
		Schema::table('spot_vehicle_type', function(Blueprint $table) {
			$table->dropForeign('spot_vehicle_type_vehicle_type_id_foreign');
		});
	}
}