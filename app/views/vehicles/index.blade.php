@extends('layouts.master')

@section('title')
Vehicles List
@stop

@section('content')

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-12">
        <div class="page-header">
            <p class="pull-right"><a href="{{ route('vehicles.create') }}" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span> Create</a></p>
            <h2>Vehicles</h2>
        </div>

        {{ Form::open(array('method'=>'get','class'=>'form-inline well well-small')) }}

        <div class="form-group">
            {{ Form::label('keywords', 'Search:') }}
            {{ Form::text('keywords', Input::get('keywords',null), array('class'=>'form-control', 'placeholder'=>'Brand, model, color or license plate...')) }}
        </div>

        <button type="submit" class="btn">Go</button>
        {{ link_to_route('vehicles.index', 'Clear filters', array(), array('class'=>'btn btn-warning')) }}

        <div class="pull-right">
            {{ link_to_route('vehicles.export', 'Export to CSV', Input::all(), array('class'=>'btn btn-success')) }}
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
                    <th>Vehicle Type</th>
                    <th>Place</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Color</th>
                    <th>License Plate</th>
                    <th>Rent Price</th>
                    <th>Rent Due</th>
                    <th>Created at</th>
                    <th>Action(s)</th>
                </tr>
                </thead>

                @if ($vehicles->count())
                <tbody>
                @foreach($vehicles as $vehicle)
                <tr>
                    <td>{{ $vehicle->id }}</td>
                    <td>{{ $vehicle->customer->last_name }}, {{ $vehicle->customer->name }}</td>
                    <td>{{ $vehicle->vehicleType->name }}</td>
                    <td>{{ $vehicle->place_id }}</td>
                    <td>{{ $vehicle->brand }}</td>
                    <td>{{ $vehicle->model }}</td>
                    <td>{{ $vehicle->color }}</td>
                    <td>{{ $vehicle->license_plate }}</td>
                    <td>{{ $vehicle->price }}</td>
                    <td>{{ $vehicle->rent_due }}</td>

                    <td>{{ $vehicle->created_at }}</td>
                    <td><!-- Drop-down actions button -->
                        <div class="btn-group">
                            <a href="{{ route('vehicles.show', $vehicle->id) }}" class="btn btn-default">View</a>
                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ route('vehicles.edit', $vehicle->id) }}"><i class="glyphicon glyphicon-pencil"></i> Edit</a></li>
                                <li><a href="{{ route('vehicles.delete', $vehicle->id) }}"><i class="glyphicon glyphicon-ban-circle"></i> Delete</a></li>
                            </ul>
                        </div>
                    </td><!-- End drop-down actions button -->
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