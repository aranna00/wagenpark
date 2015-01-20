<?php

class Dealer extends \Eloquent {
	protected $guarded = [];

	public function appointment()
	{
		return $this->hasOne('Appointment');
	}
	public function car()
	{
		return $this->hasMany('Car');
	}
}