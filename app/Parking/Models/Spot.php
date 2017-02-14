<?php namespace Parking\Models;

class Spot extends \Eloquent {

	 public static $rules = array(
    
    );

	protected $fillable = array(
        'id',
        'description',
        'vehicle_type_id',
        'created_at',
        'updated_at'
    );

	public function vechicleType()
	{
		return $this->hasOne('Parking\Models\VehicleType');
	}

	// public function vehicle()
	// {
	// 	return $this->belongsTo('Parking\Models\Vehicle');
	// }
	public function vehicle()
	{
		return $this->belongsTo('Parking\Models\Vehicle');
	}

}