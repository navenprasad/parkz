<?php

class VehiclesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('vehicles')->truncate();

		$faker = Faker\Factory::create();

		$customers = DB::table('customers')->count();
		$vehicle_types = DB::table('vehicle_types')->count();

		for ($x=1; $x<=35; $x++) {
			$vehicle = array(
				'customer_id'=> $faker->randomNumber(1, $customers),
				'vehicle_type_id'=> $faker->randomNumber(1, $vehicle_types),
				'brand'=> $faker->lastName,
				'model'=> $faker->state,
				'color'=> $faker->safeColorName,
				'license_plate'=> $faker->numerify($string = '###'),
				'price'=> $faker->randomNumber(3),
				'rent_due'=> $faker->date,
				'created_at'=> $faker->dateTime,
				'updated_at'=> $faker->dateTime
			);

			DB::table('vehicles')->insert($vehicle);
		}
	}

}
