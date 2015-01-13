<?php

class Car extends \Eloquent {
	protected $guarded = [];

	public function user()
	{
		return $this->belongsTo('User');
	}
}