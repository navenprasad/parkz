<?php
use Parking\Models\Spot;

class SpotController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		$spots = Spot::with('vehicles');

        // Search by type OR keyword
        if( Input::has('keywords') ) {

            $places->where(function($q) {

                $q->orWhere(function($query) {
                    $query->where('id','like','%' . Input::get('keywords') .'%')
                        ->orWhere('vehicle_type_id','like','%' . Input::get('keywords') .'%')
                        ->orWhere('description','like','%' . Input::get('keywords') .'%');
                });
            });
        }

        $spots->orderBy('created_at','desc');

        $data = array(
            'spots' => $spots->paginate(10)
        );
        return View::make('spot.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('spots.create');
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
