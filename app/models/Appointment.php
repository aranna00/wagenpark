<?php

class Appointment extends \Eloquent {
	protected $guarded = [];

	public function car()
	{
		return $this->belongsTo('Car');
	}
	public function dealer()
	{
		return $this->belongsTo('Dealer');
	}

	public function user()
	{
		return $this->belongsTo('User');
	}
}