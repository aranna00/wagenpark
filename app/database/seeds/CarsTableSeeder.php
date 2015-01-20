<?php

class CarsTableSeeder extends Seeder {

	public function run()
	{
		$cars = [
			[
				'license_plate' => 'SP-HB-76',
			    'brand'         => 'Volvo',
			    'dealer_id'     => Dealer::findDealerByName('Schaap')->id,
			    'user_id'       => Sentry::findUserByLogin('r.krol@rocit.nl')->id,
			    'workshop'      => 4,
			],
		    [
			    'license_plate' => 'ZR-VG-26',
		        'brand'         => 'Nissan',
			    'dealer_id'     => Dealer::findDealerByName('Brederode')->id,
			    'user_id'       => Sentry::findUserByLogin('w.buuren@rocit.nl')->id,
			    'workshop'      => 3,
		    ],
		    [
			    'license_plate' => '6-KBP-9',
		        'brand'         => 'Jaguar',
			    'dealer_id'     => Dealer::findDealerByName('orsouw')->id,
			    'user_id'       => Sentry::findUserByLogin('k.horst@rocit.nl')->id,
			    'workshop'      => 1,
			],
		    [
			    'license_plate' => 'NX-XR-22',
		        'brand'         => 'Opel',
			    'dealer_id'     => Dealer::findDealerByName('Mudde')->id,
			    'user_id'       => Sentry::findUserByLogin('h.klaver@rocit.nl')->id,
			    'workshop'      => 1,
			],
		    [
			    'license_plate' => '12-XND-2',
		        'brand'         => 'Volvo',
			    'dealer_id'     => Dealer::findDealerByName('Schaap')->id,
			    'user_id'       => Sentry::findUserByLogin('k.ernst@rocit.nl')->id,
			    'workshop'      => 6,
			],
		    [
			    'license_plate' => '5-GHB-1',
		        'brand'         => 'Volkswagen',
			    'dealer_id'     => Dealer::findDealerByName('Jacobsen')->id,
			    'user_id'       => Sentry::findUserByLogin('r.ruiter@rocit.nl')->id,
			    'workshop'      => 9,
			],
		    [
			    'license_plate' => '9-KVP-24',
		        'brand'         => 'Mercedes',
			    'dealer_id'     => Dealer::findDealerByName('Wensink')->id,
			    'user_id'       => Sentry::findUserByLogin('f.okma@rocit.nl')->id,
			    'workshop'      => 2,
			],
		    [
			    'license_plate' => 'LN-ND-98',
		        'brand'         => 'Rover',
			    'dealer_id'     => Dealer::findDealerByName('Jansen')->id,
			    'user_id'       => Sentry::findUserByLogin('j.bakker@rocit.nl')->id,
			    'workshop'      => 3,
			],
		    [
			    'license_plate' => '1-EDF-2',
		        'brand'         => 'Nissan',
			    'dealer_id'     => Dealer::findDealerByName('Brederode')->id,
			    'user_id'       => Sentry::findUserByLogin('a.smit@rocit.nl')->id,
			    'workshop'      => 2,
			],
		    [
			    'license_plate' => '99-ND-NN',
		        'brand'         => 'Volkswagen',
			    'dealer_id'     => Dealer::findDealerByName('Jacobsen')->id,
			    'user_id'       => Sentry::findUserByLogin('b.oosterhuis@rocit.nl')->id,
			    'workshop'      => 2,
			],
		    [
			    'license_plate' => '2-ABC-3',
		        'brand'         => 'Porsche',
			    'dealer_id'     => Dealer::findDealerByName('Duursma')->id,
			    'user_id'       => Sentry::findUserByLogin('p.klaassen@rocit.nl')->id,
			    'workshop'      => 5,
			],
		    [
			    'license_plate' => 'SX-XR-57',
		        'brand'         => 'Volvo',
			    'dealer_id'     => Dealer::findDealerByName('Schaap')->id,
			    'user_id'       => Sentry::findUserByLogin('j.jansma@rocit.nl')->id,
			    'workshop'      => 5,
			]
		];
		foreach($cars as $car){
			Car::create($car);
		}
	}

}