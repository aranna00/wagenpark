<?php

class DealerTableSeeder extends Seeder {

	public function run()
	{
		Dealer::create(['name'=>'Brederode']);
		Dealer::create(['name'=>'Schaap']);
		Dealer::create(['name'=>'Jacobsen']);
		Dealer::create(['name'=>'Mudde']);
		Dealer::create(['name'=>'Orsouw']);
		Dealer::create(['name'=>'Wensink']);
		Dealer::create(['name'=>'Jansen']);
		Dealer::create(['name'=>'Duursma']);
	}

}