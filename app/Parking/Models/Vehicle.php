<?php namespace Parking\Models;

class Vehicle extends \Eloquent {

	protected $softDelete = true;

	public function customer()
	{
		return $this->belongsTo('Parking\Models\Customer');
	}

	public function vehicleType()
	{
		return $this->belongsTo('Parking\Models\VehicleType');
	}

	public function place()
	{
		return $this->belongsTo('Parking\Models\Place');
	}

	public function payments()
	{
		return $this->hasMany('Parking\Models\Payment');
	}

}