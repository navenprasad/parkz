<?php

class CustomersTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		 DB::table('customers')->delete();

		$faker = Faker\Factory::create();

		for ($x=1; $x<=20; $x++) {
			$customer = array(
				'name'=> $faker->company,
				'last_name'=> $faker->lastName,
				'street_name'=> $faker->streetAddress,
				'street_number'=> $faker->randomNumber(1, 2000),
				'suburb'=> $faker->city,
				'dni'=> $faker->randomNumber(8),
				'email'=> $faker->email,
				'home_phone'=> $faker->phoneNumber,
				'mobile_phone'=> $faker->phoneNumber,
				'created_at'=> $faker->dateTime,
				'updated_at'=> $faker->dateTime
			);

			DB::table('customers')->insert($customer);
		}
	}

}
