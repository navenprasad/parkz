<?php
use Parking\Models\Spot;
use Parking\Models\Vehicle;

class SpotsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		$spots = Spot::with('vehicle');
		$is_due = getdate();

		if( Input::has('keywords') ) {

            $spots->where(function($q) {

                $q->orWhere(function($query) {
                    $query->where('description','like','%' . Input::get('keywords') .'%');
                });
            });
        }

		$data = array(
            'spots' => $spots->paginate(10),
			'is_due' => $is_due
			
        );

        return View::make('spots.index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$data = array(
			'spot'   =>  new Spot(),
            'available_spots'   => Spot::where('available',0)->get(),
			'taken_spots'   => Spot::where('available',1)->get(),
            'vehicles'   =>  Vehicle::all()
        );

        return View::make('spots.form', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('spots.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('spots.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
