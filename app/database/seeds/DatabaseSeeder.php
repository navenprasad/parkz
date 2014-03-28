<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$this->call('Vehicle_typesTableSeeder');
		$this->call('CustomersTableSeeder');
		$this->call('VehiclesTableSeeder');
		$this->call('SpotsTableSeeder');
	}

}