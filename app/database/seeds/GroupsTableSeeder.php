<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class GroupsTableSeeder extends Seeder {

	public function run()
	{
		$group = Sentry::createGroup([
			'name'          => 'admin',
		    'permissions'   => [
			    'admin'     => 1,
		        'afspraken' => 1,
		        'dealers'   => 1,
		    ]
		                             ]);

		$group = Sentry::createGroup([
			'name'          => 'dealer',
		    'permissions'   => [
			    'afspraken' => 1,
		        'dealers'   => 1,
		    ]
		                             ]);

		$group = Sentry::createGroup([
			'name'          => 'user',
		    'permissions'   => [
			    'afspraken' => 1,
		    ]
		                             ]);
	}

}