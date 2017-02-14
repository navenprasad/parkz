<?php namespace Parking\Models;
use Carbon\Carbon;

class Vehicle extends \Eloquent {

	protected $softDelete = true;

	protected $fillable = array(
        'id',
        'customer_id',
        'vehicle_type_id',
        'brand',
        'model',
        'color',
        'license_plate',
        'price',
        'rent_due',
        'created_at',
        'updated_at'
    );

	public static $rules = array(
        'license_plate'          =>  'required|max:25'
    );

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

	// Mutators
	public function setRentDueAttribute($value)
	{
		$this->attributes['rent_due'] = ($value != '') ? Carbon::createFromFormat('Y-m-d', $value) : null;
	}

}