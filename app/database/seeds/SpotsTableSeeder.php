<?php

class SpotsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('spots')->truncate();

		$faker = Faker\Factory::create();

		$vehicle_types = DB::table('vehicle_types')->count();

		for ($x=1; $x<=35; $x++) {
			$vehicle = array(
				'vehicle_type_id'=> $faker->randomNumber(1, $vehicle_types),
				'description'=> $faker->text,
				'created_at'=> $faker->dateTime,
				'updated_at'=> $faker->dateTime
			);

			DB::table('spots')->insert($vehicle);
		}
	}

}
