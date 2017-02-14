@extends('layouts.master')

@section('title')
List of Spots
@stop

@section('content')

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-12">
        <div class="page-header">
            <p class="pull-right"><a href="{{ route('spots.create') }}" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span> Assign Spot</a></p>
            <h2>Spots</h2>
        </div>

        {{ Form::open(array('method'=>'get','class'=>'form-inline well well-small')) }}

	    <div class="form-group">
		    {{ Form::label('keywords', 'Search:') }}
		    {{ Form::text('keywords', Input::get('keywords',null), array('class'=>'lg-inline-input form-control', 'placeholder'=>'Search spot description.')) }}
	    </div>

	    <button type="submit" class="btn">Go</button>
	    {{ link_to_route('spots.index', 'Reset Filter', array(), array('class'=>'btn btn-warning')) }}

	    

        {{Form::close()}}
    </div>
</div>

<div class="row">
    <p>Showing: {{ $spots->getTotal() }} spot(s)</p>
    <div class="col-xs-12 col-sm-6 col-md-12">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Description</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>License Plate</th>
                    <th>Color</th>

                    <th>Rent Due</th>
                </tr>
                </thead>

                @if ($spots->count())
                <tbody>
                @foreach($spots as $spot)
                <tr>
                @if ($spot->available )
                    <td>{{ $spot->id }}</td>
                    <td>{{ $spot->description }}</td>
                    <td>{{ $spot->vehicle->brand }}</td>
                    <td>{{ $spot->vehicle->model }}</td>           
                    <td>{{ $spot->vehicle->license_plate}}</td>
                     <td>{{ $spot->vehicle->color}}</td>
                    @if ($is_due >= $spot->vehicle->rent_due)
                    <td>{{'YES' }}</td>
                    @else
                    <td>{{ 'NO' }}</td>
                    {{ $is_due }}
                    @endif
                    {{ print_r($is_due)}}



                </tr>
                @endif
                @endforeach

                


                @else
                <tr>
                    <td colspan="9">No results for your search.</td>
                </tr>
                @endif
                </tbody>
            </table>
        </div>
        {{ $spots->links() }}
    </div>
</div><!-- End: .row -->


@stop