<?php namespace Parking\Models;

class VehicleType extends \Eloquent {

	public $timestamps = false;
    protected $fillable = array(
        'id',
        'name',
        'created_at',
        'updated_at'
    );

    public static $rules = array(
        'name'          =>  'required|max:25'
    );

	public function vechicles()
	{
		return $this->hasMany('Vehicle');
	}

}