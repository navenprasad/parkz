@extends('layouts.master')

@section('title')
List of Vehicles
@stop

@section('content')

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-12">
        <div class="page-header">
            <p class="pull-right"><a href="{{ route('vehicles.create') }}" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span> New Vehicle</a></p>
            <h2>Vehicles</h2>
        </div>

        {{ Form::open(array('method'=>'get','class'=>'form-inline well well-small')) }}

	    <div class="form-group">
		    {{ Form::label('keywords', 'Search:') }}
		    {{ Form::text('keywords', Input::get('keywords',null), array('class'=>'lg-inline-input form-control', 'placeholder'=>'Model, licence plate, owner...')) }}
	    </div>

	    <button type="submit" class="btn">Go</button>
	    {{ link_to_route('customers.index', 'Reset Filter', array(), array('class'=>'btn btn-warning')) }}

	    <div class="pull-right">
		    {{ link_to_route('customers.export', 'Export to CSV', Input::all(), array('class'=>'btn btn-success')) }}
	    </div>

        {{Form::close()}}
    </div>
</div>

<div class="row">
    <p>Showing: {{ $vehicles->getTotal() }} vehicle(s)</p>
    <div class="col-xs-12 col-sm-6 col-md-12">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Owner</th>
                    <th>Type</th>
                    <th>Lugar</th>
                    <th>Brand</th>
                    <th>MyVi</th>
                    <th>Color</th>
                    <th>Lincense Plate</th>
                    <th>Price</th>
                    <th>Due Date</th>
                    <th>Actions</th>
                </tr>
                </thead>

                @if ($vehicles->count())
                <tbody>
                @foreach($vehicles as $vehicle)
                <tr>
                    <td>{{ $vehicle->id }}</td>
                    <td>{{ $vehicle->customer->last_name }}, {{ $vehicle->customer->name }}</td>
                    <td>{{ $vehicle->vehicleType->name }}</td>
                    <td>{{ $vehicle->spot_id }}</td>
                    <td>{{ $vehicle->brand }}</td>
                    <td>{{ $vehicle->model }}</td>
                    <td>{{ $vehicle->color }}</td>
                    <td>{{ $vehicle->license_plate }}</td>
                    <td>{{ $vehicle->price }}</td>
                    <td>{{ $vehicle->rent_due }}</td>
	                <td><a href="{{ route('vehicles.show', $vehicle->id) }}" title="Ver Detalles"><i class="fa fa-eye"></i></a> - <a href="{{ route('vehicles.edit', $vehicle->id) }}" title="Editar"><i class="fa fa-pencil-square-o"></i></a> - <a href="{{ route('vehicles.delete', $vehicle->id) }}" title="Eliminar"><i class="fa fa-ban"></i></a></td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="9">No results for your search.</td>
                </tr>
                @endif
                </tbody>
            </table>
        </div>
        {{ $vehicles->links() }}
    </div>
</div><!-- End: .row -->


@stop