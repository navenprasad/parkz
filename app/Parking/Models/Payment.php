<?php

class Payment extends Eloquent {

	protected $table = 'payments';
	public $timestamps = true;
	protected $softDelete = true;

	public function vehicle()
	{
		return $this->belongsTo('Vehicle');
	}

}