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
	public function dealer()
	{
		return $this->belongsTo('Dealer');
	}

	public static function findCarByLicense($license)
	{
		return $cars = DB::table('cars')->select('*')->where(['license_plate'=>$license])->first();
	}
}