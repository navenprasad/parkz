<?php
App::setLocale('es');
/*
 * ANONYMOUS PAGES
 */
Route::get('/', array('as'=>'home', 'uses'=>'AccountsController@index'));
Route::post('', 'AccountsController@postSignIn');

Route::get('test', function(){
	return url('public/assets/bower/font-awesome/fonts/fontawesome-webfont.woff?v=4.0.3');
});

/*
 * SECURE PAGES
 */
Route::group(array('before' => 'auth'), function () {
	// DASHBOARD
	Route::get('dashboard', array('as'=>'dashboard', 'uses'=>'DashboardController@index'));

	// CUSTOMERS
	Route::get('customers/export', array('as'=>'customers.export', 'uses'=>'CustomersController@export'));
	Route::get('customers/{customer_id}/delete', array('as'=>'customers.delete', 'uses'=>'CustomersController@delete'))
		->where('user_id', '[0-9]+');
	Route::resource('customers', 'CustomersController');

	// SPOTS
	Route::resource('spots', 'SpotsController');

	// VEHICLE TYPES
	Route::get('vehicle_types/{vehicle_type_id}/delete', array('as'=>'vehicle_types.delete', 'uses'=>'VehicleTypesController@delete'))
		->where('vehicle_type_id', '[0-9]+');
	Route::resource('vehicle_types', 'VehicleTypesController');

	// VEHICLES
	Route::get('vehicles/export', array('as'=>'vehicles.export', 'uses'=>'VehiclesController@export'));
	Route::get('vehicles/{vehicle_id}/delete', array('as'=>'vehicles.delete', 'uses'=>'VehiclesController@delete'))
		->where('vehicle_id', '[0-9]+');
	Route::resource('vehicles', 'VehiclesController');
});