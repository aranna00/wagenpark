<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$adminGroup     = Sentry::findGroupById(1);
		$dealerGroup    = Sentry::findGroupById(2);
		$userGroup      = Sentry::findGroupById(3);

		$user = Sentry::createUser([
			'email'     => 'aranna00@gmail.com',
		    'password'  => 'test',
		    'activated'  => 'true',
		    'first_name'=> 'Aran',
		    'last_name' => 'Kieskamp'
		                           ]);
		$user->addGroup($adminGroup);

		$user = Sentry::createUser([
		   'email'     => 'info@dealerschaap.nl',
		   'password'  => 'dealers',
		   'activated'  => 'true',
		   'first_name'=> 'Lisa',
		   'last_name' => 'Schaap'
		]);
		$user->addGroup($dealerGroup);

		$user = Sentry::createUser([
			                           'email'     => 'info@dealerbrederode.nl',
			                           'password'  => 'dealers',
			                           'activated'  => 'true',
			                           'first_name'=> 'Steven',
			                           'last_name' => 'Brederode'
		                           ]);
		$user->addGroup($dealerGroup);

		$user = Sentry::createUser([
			                           'email'     => 'info@dealerorsouw.nl',
			                           'password'  => 'dealers',
			                           'activated'  => 'true',
			                           'first_name'=> 'Floris',
			                           'last_name' => 'Orsouw'
		                           ]);
		$user->addGroup($dealerGroup);

		$user = Sentry::createUser([
			                           'email'     => 'info@dealermudde.nl',
			                           'password'  => 'dealers',
			                           'activated'  => 'true',
			                           'first_name'=> 'Robert',
			                           'last_name' => 'Mudde'
		                           ]);
		$user->addGroup($dealerGroup);

		$user = Sentry::createUser([
			                           'email'     => 'info@dealerjacobsen.nl',
			                           'password'  => 'dealers',
			                           'activated'  => 'true',
			                           'first_name'=> 'Nico',
			                           'last_name' => 'jacobsen'
		                           ]);
		$user->addGroup($dealerGroup);

		$user = Sentry::createUser([
			                           'email'     => 'info@dealerwensink.nl',
			                           'password'  => 'dealers',
			                           'activated'  => 'true',
			                           'first_name'=> 'Peter',
			                           'last_name' => 'wensink'
		                           ]);
		$user->addGroup($dealerGroup);

		$user = Sentry::createUser([
			                           'email'     => 'info@dealerjansen.nl',
			                           'password'  => 'dealers',
			                           'activated'  => 'true',
			                           'first_name'=> 'Laura',
			                           'last_name' => 'Jansen'
		                           ]);
		$user->addGroup($dealerGroup);

		$user = Sentry::createUser([
			                           'email'     => 'info@dealerduursma.nl',
			                           'password'  => 'dealers',
			                           'activated'  => 'true',
			                           'first_name'=> 'Danny',
			                           'last_name' => 'Schaap'
		                           ]);
		$user->addGroup($dealerGroup);

		$user = Sentry::createUser([
										'email'     => 'r.krol@rocit.nl',
		                                'password'  => 'users',
		                                'activated' => true,
		                                'first_name'=> 'Rob',
		                                'last_name' => 'Krol',
		                           ]);
		$user->addGroup($userGroup);

		$user = Sentry::createUser([
			                           'email'     => 'w.buuren@rocit.nl',
			                           'password'  => 'users',
			                           'activated' => true,
			                           'first_name'=> 'Willem',
			                           'last_name' => 'Buuren',
		                           ]);
		$user->addGroup($userGroup);

		$user = Sentry::createUser([
			                           'email'     => 'k.horst@rocit.nl',
			                           'password'  => 'users',
			                           'activated' => true,
			                           'first_name'=> 'Karel',
			                           'last_name' => 'Horst',
		                           ]);
		$user->addGroup($userGroup);

		$user = Sentry::createUser([
			                           'email'     => 'h,klaver@rocit.nl',
			                           'password'  => 'users',
			                           'activated' => true,
			                           'first_name'=> 'Harm',
			                           'last_name' => 'Klaver',
		                           ]);
		$user->addGroup($userGroup);

		$user = Sentry::createUser([
			                           'email'     => 'k.ernst@rocit.nl',
			                           'password'  => 'users',
			                           'activated' => true,
			                           'first_name'=> 'Katarina',
			                           'last_name' => 'Ernst',
		                           ]);
		$user->addGroup($userGroup);

		$user = Sentry::createUser([
			                           'email'     => 'r.ruiter@rocit.nl',
			                           'password'  => 'users',
			                           'activated' => true,
			                           'first_name'=> 'Rachel',
			                           'last_name' => 'Ruiter',
		                           ]);
		$user->addGroup($userGroup);

		$user = Sentry::createUser([
			                           'email'     => 'f.okma@rocit.nl',
			                           'password'  => 'users',
			                           'activated' => true,
			                           'first_name'=> 'Floyd',
			                           'last_name' => 'Okma',
		                           ]);
		$user->addGroup($userGroup);

		$user = Sentry::createUser([
			                           'email'     => 'j.bakker@rocit.nl',
			                           'password'  => 'users',
			                           'activated' => true,
			                           'first_name'=> 'Janneke',
			                           'last_name' => 'Bakker',
		                           ]);
		$user->addGroup($userGroup);

		$user = Sentry::createUser([
			                           'email'     => 'a.smit@rocit.nl',
			                           'password'  => 'users',
			                           'activated' => true,
			                           'first_name'=> 'Anton',
			                           'last_name' => 'Smit',
		                           ]);
		$user->addGroup($userGroup);

		$user = Sentry::createUser([
			                           'email'     => 'b.oosterhuis@rocit.nl',
			                           'password'  => 'users',
			                           'activated' => true,
			                           'first_name'=> 'Beau',
			                           'last_name' => 'Oosterhuis',
		                           ]);
		$user->addGroup($userGroup);

		$user = Sentry::createUser([
			                           'email'     => 'p.klaassen@rocit.nl',
			                           'password'  => 'users',
			                           'activated' => true,
			                           'first_name'=> 'Pablo',
			                           'last_name' => 'Klaassen',
		                           ]);
		$user->addGroup($userGroup);

		$user = Sentry::createUser([
			                           'email'     => 'j.jansma@rocit.nl',
			                           'password'  => 'users',
			                           'activated' => true,
			                           'first_name'=> 'Jarold',
			                           'last_name' => 'Jansma',
		                           ]);
		$user->addGroup($userGroup);
	}

}