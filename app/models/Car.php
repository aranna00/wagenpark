<?php

class Car extends \Eloquent {
	protected $guarded = [];

	public function user()
	{
		return $this->belongsTo('User');
	}
	public function appointment()
	{
		return $this->hasOne('Appointment');
	}
}