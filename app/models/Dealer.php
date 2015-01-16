<?php

class Dealer extends \Eloquent {
	protected $guarded = [];

	public function appointment()
	{
		return $this->belongsTo('Appointment');
	}
}