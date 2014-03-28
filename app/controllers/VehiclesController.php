<?php
use Parking\Models\Vehicle;
use Parking\Models\VehicleType;
use Parking\Models\Customer;
use Parking\Models\Place;

class VehiclesController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $vehicles = Vehicle::with('customer');

        // Search by type OR keyword
        if( Input::has('keywords') ) {

            $vehicles->where(function($q) {

                $q->orWhere(function($query) {
                    $query->where('name','like','%' . Input::get('keywords') .'%')
                        ->orWhere('last_name','like','%' . Input::get('keywords') .'%')
                        ->orWhere('dni','like','%' . Input::get('keywords') .'%')
                        ->orWhere('email','like','%' . Input::get('keywords') .'%');
                });
            });
        }

        $vehicles->orderBy('created_at','desc');

        $data = array(
            'vehicles' => $vehicles->paginate(10)
        );

        return View::make('vehicles.index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $data = array(
            'vehicle'   =>  new Vehicle(),
            'customers'   =>  Customer::all()
        );

        return View::make('vehicles.form', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $input = Input::all();
        return $input;

        $validation = Validator::make($input, Vehicle::$rules);

        if ($validation->fails()) return Redirect::back()->withErrors($validation)->withInput();

        $vehicle = Vehicle::create($input);
        return Redirect::route('vehicles.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $vehicle = Vehicle::with('vehicles')->findOrFail($id);
        return View::make('vehicles.show', compact('vehicle'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $data = array(
            'vehicle'           =>  Vehicle::findOrFail($id),
            'customers'           =>  Customer::all(),
            'places'            =>  Place::where('available', 1)->get(),
            'vehicle_types'     =>  VehicleType::all()
        );
        $places = DB::table('vehicle_types')
            ->whereExists(function($query)
            {
                $query->select(DB::raw(1))
                    ->from('places')
                    ->whereRaw('places.vehicle_type_id = vehicle_types.id');
            })
            ->get();

        return $places;
        return View::make('vehicles.form', $data);
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

        $validation = Validator::make($input, Vehicle::$rules);

        if ($validation->fails()) return Redirect::back()->withErrors($validation)->withInput();

        $vehicle = Vehicle::findOrFail($id);
        $vehicle->fill($input);
        $vehicle->save();

        return Redirect::route('vehicles.show', $vehicle->id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($id)
	{
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();
        return Redirect::route('vehicles.index');
	}

    public function export()
    {
        $vehicles = Vehicle::with('vehicles');

        // Search by type OR keyword
        if( Input::has('keywords') ) {

            $vehicles->where(function($q) {

                $q->orWhere(function($query) {
                    $query->where('name','like','%' . Input::get('keywords') .'%')
                        ->orWhere('last_name','like','%' . Input::get('keywords') .'%')
                        ->orWhere('dni','like','%' . Input::get('keywords') .'%')
                        ->orWhere('email','like','%' . Input::get('keywords') .'%');
                });
            });
        }

        $vehicles->orderBy('created_at','desc');

        $vehicles = $vehicles->get();

        $csv_array = array(array(
            'ID#',
            'First name',
            'Last name',
            'Vehicles',
            'Street Name',
            'Street Number',
            'Suburb',
            'DNI',
            'Email',
            'Home Phone',
            'Mobile Phone',
            'Created at',
            'Updated at'
        ));

        foreach($vehicles as $vehicle) {
            $csv_array[] = array(
                $vehicle->id,
                $vehicle->name,
                $vehicle->last_name,
                $vehicle->vehicles->count(),
                $vehicle->street_name,
                $vehicle->street_number,
                $vehicle->suburb,
                $vehicle->dni,
                $vehicle->email,
                $vehicle->home_phone,
                $vehicle->mobile_phone,
                $vehicle->created_at,
                $vehicle->updated_at
            );
        }
        $tmp_csv = tempnam(sys_get_temp_dir(), 'Tmp_CSV');
        $generator = new \EasyCSV\Writer($tmp_csv);

        $generator->writeFromArray($csv_array);
        return Response::download($tmp_csv, 'Vehicles_'.date('d_m_Y').'.csv');
    }

}
