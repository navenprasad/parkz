<?php
use Parking\Models\Customer;

class CustomersController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $customers = Customer::with('vehicles');

        // Search by type OR keyword
        if( Input::has('keywords') ) {

            $customers->where(function($q) {

                $q->orWhere(function($query) {
                    $query->where('name','like','%' . Input::get('keywords') .'%')
                        ->orWhere('last_name','like','%' . Input::get('keywords') .'%')
                        ->orWhere('dni','like','%' . Input::get('keywords') .'%')
                        ->orWhere('email','like','%' . Input::get('keywords') .'%');
                });
            });
        }

        $customers->orderBy('created_at','desc');

        $data = array(
            'customers' => $customers->paginate(10)
        );

        return View::make('customers.index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $customer = new Customer();
        return View::make('customers.form', compact('customer'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $input = Input::all();

        $validation = Validator::make($input, Customer::$rules);

        if ($validation->fails()) return Redirect::back()->withErrors($validation)->withInput();

        $customer = Customer::create($input);
        return Redirect::route('customers.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $customer = Customer::with('vehicles')->findOrFail($id);
        return View::make('customers.show', compact('customer'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $customer = Customer::findOrFail($id);
        return View::make('customers.form', compact('customer'));
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

        $validation = Validator::make($input, Customer::$rules);

        if ($validation->fails()) return Redirect::back()->withErrors($validation)->withInput();

        $customer = Customer::findOrFail($id);
        $customer->fill($input);
        $customer->save();

        return Redirect::route('customers.show', $customer->id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($id)
	{
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return Redirect::route('customers.index');
	}

    public function export()
    {
        $customers = Customer::with('vehicles');

        // Search by type OR keyword
        if( Input::has('keywords') ) {

            $customers->where(function($q) {

                $q->orWhere(function($query) {
                    $query->where('name','like','%' . Input::get('keywords') .'%')
                        ->orWhere('last_name','like','%' . Input::get('keywords') .'%')
                        ->orWhere('dni','like','%' . Input::get('keywords') .'%')
                        ->orWhere('email','like','%' . Input::get('keywords') .'%');
                });
            });
        }

        $customers->orderBy('created_at','desc');

        $customers = $customers->get();

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

        foreach($customers as $customer) {
            $csv_array[] = array(
                $customer->id,
                $customer->name,
                $customer->last_name,
                $customer->vehicles->count(),
                $customer->street_name,
                $customer->street_number,
                $customer->suburb,
                $customer->dni,
                $customer->email,
                $customer->home_phone,
                $customer->mobile_phone,
                $customer->created_at,
                $customer->updated_at
            );
        }
        $tmp_csv = tempnam(sys_get_temp_dir(), 'Tmp_CSV');
        $generator = new \EasyCSV\Writer($tmp_csv);

        $generator->writeFromArray($csv_array);
        return Response::download($tmp_csv, 'Customers_'.date('d_m_Y').'.csv');
    }

}
