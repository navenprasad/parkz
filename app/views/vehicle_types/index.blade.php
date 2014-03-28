@extends('layouts.master')

@section('title')
Vehicle Types
@stop

@section('content')

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-12">
        <div class="page-header">
            <p class="pull-right"><a href="{{ route('vehicle_types.create') }}" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span> Create</a></p>
            <h2>Vehicle Types</h2>
        </div>
    </div>
</div>

<div class="row">
    <p>Showing: {{ $vehicle_types->getTotal() }} vehicle type(s)</p>
    <div class="col-xs-12 col-sm-6 col-md-12">
        <table class="table table-striped table-condensed">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th class="text-right">Action(s)</th>
            </tr>
            </thead>

            @if ($vehicle_types->count())
            <tbody>
            @foreach($vehicle_types as $vehicle_type)
            <tr>
                <td>{{ $vehicle_type->id }}</td>
                <td>{{ $vehicle_type->name }}</td>
                <td class="text-right"><!-- Drop-down actions button -->
                    <div class="btn-group">
                        <a href="{{ route('vehicle_types.edit', $vehicle_type->id) }}" class="btn btn-default"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('vehicle_types.delete', $vehicle_type->id) }}"><i class="glyphicon glyphicon-ban-circle"></i> Delete</a></li>
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
        {{ $vehicle_types->links() }}
    </div>
</div><!-- End: .row -->


@stop