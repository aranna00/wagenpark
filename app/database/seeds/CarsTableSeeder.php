<?php

class CarsTableSeeder extends Seeder {

	public function run()
	{
		$cars = [
			[
				'license_plate' => 'SP-HB-76',
			    'brand'         => 'Volvo',
			    'dealer_id'     => 2,
			    'user_id'       => 14,
			],
		    [
			    'license_plate' => 'ZR-VG-26',
		        'brand'         => 'Nissan',
		        'dealer_id'     => 1,
		        'user_id'       => 15,
		    ],
		    [
			    'license_plate' => '6-KBP-9',
		        'brand'         => 'Jaguar',
		        'dealer_id'     => 5,
		        'user_id'       => 16,
			],
		    [
			    'license_plate' => 'NX-XR-22',
		        'brand'         => 'Opel',
		        'dealer_id'     => 4,
		        'user_id'       => 17,
			],
		    [
			    'license_plate' => '12-XND-2',
		        'brand'         => 'Volvo',
				'dealer_id'     => 2,
		        'user_id'       => 18,
			],
		    [
			    'license_plate' => '5-GHB-1',
		        'brand'         => 'Volkswagen',
		        'dealer_id'     => 3,
		        'user_id'       => 19,
			],
		    [
			    'license_plate' => '9-KVP-24',
		        'brand'         => 'Mercedes',
		        'dealer_id'     => 6,
		        'user_id'       => 20,
			],
		    [
			    'license_plate' => 'LN-ND-98',
		        'brand'         => 'Rover',
		        'dealer_id'     => 7,
		        'user_id'       => 21,
			],
		    [
			    'license_plate' => '1-EDF-2',
		        'brand'         => 'Nissan',
		        'dealer_id'     => 1,
		        'user_id'       => 22,
			],
		    [
			    'license_plate' => '99-ND-NN',
		        'brand'         => 'Volkswagen',
		        'dealer_id'     => 3,
		        'user_id'       => 23,
			],
		    [
			    'license_plate' => '2-ABC-3',
		        'brand'         => 'Porsche',
		        'dealer_id'     => 8,
		        'user_id'       => 24,
			],
		    [
			    'license_plate' => 'SX-XR-57',
		        'brand'         => 'Volvo',
		        'dealer_id'     => 2,
		        'user_id'       => 25
			]
		];
		foreach($cars as $car){
			Car::create($car);
		}
	}

}