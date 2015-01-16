<?php

class Appointment extends \Eloquent {
	protected $guarded = [];

	public function car()
	{
		return $this->hasOne('Car');
	}
	public function dealer()
	{
		return $this->hasOne('Dealer');
	}

	public function user()
	{
		return $this->hasOne('User');
	}
}