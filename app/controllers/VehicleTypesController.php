<?php
use Parking\Models\VehicleType;

class VehicleTypesController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $vehicle_types = VehicleType::orderBy('name','asc')->paginate(10);

        $data = array(
            'vehicle_types' => $vehicle_types
        );

        return View::make('vehicle_types.index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $vehicle_type = new VehicleType();
        return View::make('vehicle_types.form', compact('vehicle_type'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $input = Input::all();

        $validation = Validator::make($input, VehicleType::$rules);

        if ($validation->fails()) return Redirect::back()->withErrors($validation)->withInput();

        VehicleType::create($input);
        return Redirect::route('vehicle_types.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return VehicleType::findOrFail($id);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $vehicle_type = VehicleType::findOrFail($id);
        return View::make('vehicle_types.form', compact('vehicle_type'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $input = Input::all();

        $validation = Validator::make($input, VehicleType::$rules);

        if ($validation->fails()) return Redirect::back()->withErrors($validation)->withInput();

        $vehicle_type = VehicleType::findOrFail($id);
        $vehicle_type->fill($input);
        $vehicle_type->save();

        return Redirect::route('vehicle_types.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($id)
	{
        $vehicle_type = VehicleType::findOrFail($id);
        $vehicle_type->delete();
        return Redirect::route('vehicle_types.index');
	}
}
