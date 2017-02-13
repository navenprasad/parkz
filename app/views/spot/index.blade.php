@extends('layouts.master')

@section('title')
List of Clients
@stop

@section('content')

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-12">
        <div class="page-header">
            <p class="pull-right"><a href="{{ route('place.create') }}" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span> New Client</a></p>
            <h2>Spots</h2>
        </div>

        {{ Form::open(array('method'=>'get','class'=>'form-inline well well-small')) }}

        <div class="form-group">
            {{ Form::label('keywords', 'Search:') }}
            {{ Form::text('keywords', Input::get('keywords',null), array('class'=>'lg-inline-input form-control', 'placeholder'=>'Name, Vehicle No., email...')) }}
        </div>

        <button type="submit" class="btn">Go</button>
        {{ link_to_route('place.index', 'Filter', array(), array('class'=>'btn btn-warning')) }}

        <div class="pull-right">
            {{ link_to_route('place.export', 'Export to CSV', Input::all(), array('class'=>'btn btn-success')) }}
        </div>

        {{Form::close()}}
    </div>
</div>

<div class="row">
    <p>Showing: {{ $place->getTotal() }} client(s)</p>
    <div class="col-xs-12 col-sm-6 col-md-12">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Address</th>
                    <th>Home Phone</th>
                    <th>Mobile Phone</th>
                    <th>No. Vehicles</th>
                    <th>Actions</th>
                </tr>
                </thead>

                @if ($place->count())
                <tbody>
                @foreach($place as $place)
                <tr>
                    <td>{{ $place->id }}</td>
                    <td>{{ $place->last_name }}</td>
	                <td>{{ $place->name }}</td>
                    <td>{{ $place->street_name }} {{ $place->street_number }}</td>
                    <td>{{ $place->home_phone }}</td>
                    <td>{{ $place->mobile_phone }}</td>
                    <td>{{ $place->vehicles->count() }}</td>
                    <td><a href="{{ route('place.show', $place->id) }}" title="Ver Detalles"><i class="fa fa-eye"></i></a> - <a href="{{ route('place.edit', $place->id) }}" title="Editar"><i class="fa fa-pencil-square-o"></i></a> - <a href="{{ route('place.delete', $place->id) }}" title="Eliminar"><i class="fa fa-ban"></i></a></td>
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
        {{ $place->links() }}
    </div>
</div><!-- End: .row -->


@stop