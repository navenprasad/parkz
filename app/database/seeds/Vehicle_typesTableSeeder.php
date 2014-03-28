<?php

class Vehicle_typesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		 DB::table('vehicle_types')->delete();

		$types = array('Auto Chico', 'Auto Grande', 'Camioneta', 'Motocicleta');

		foreach ($types as $type) {
			DB::table('vehicle_types')->insert(array('name'   =>  $type));
		}
	}

}
