<?php namespace Parking\Models;

class Customer extends \Eloquent {

	protected $softDelete = true;
	protected $fillable = array(
        'id',
        'name',
        'last_name',
        'street_name',
        'street_number',
        'suburb',
        'dni',
        'email',
        'home_phone',
        'mobile_phone',
        'created_at',
        'updated_at'
    );

    public static $rules = array(
        'name'          =>  'required|max:25',
        'last_name'     =>  'required|max:25',
        'street_name'   =>  'required|max:25',
        'street_number' =>  'required|numeric',
        'suburb'        =>  'required|max:25',
        'dni'           =>  'required|numeric',
        'email'         =>  'required|email|max:100',
        'home_phone'    =>  'numeric',
        'mobile_phone'  =>  'required|numeric'
    );

	public function vehicles()
	{
		return $this->hasMany('Parking\Models\Vehicle');
	}

}