@extends('layouts.master')

@section('title')
Listado de Clientes
@stop

@section('content')

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-12">
        <div class="page-header">
            <p class="pull-right"><a href="{{ route('customers.create') }}" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span> Nuevo Cliente</a></p>
            <h2>Clientes</h2>
        </div>

        {{ Form::open(array('method'=>'get','class'=>'form-inline well well-small')) }}

        <div class="form-group">
            {{ Form::label('keywords', 'Buscar:') }}
            {{ Form::text('keywords', Input::get('keywords',null), array('class'=>'lg-inline-input form-control', 'placeholder'=>'Nombre, apellido, dni o email...')) }}
        </div>

        <button type="submit" class="btn">Go</button>
        {{ link_to_route('customers.index', 'Limpiar filtros', array(), array('class'=>'btn btn-warning')) }}

        <div class="pull-right">
            {{ link_to_route('customers.export', 'Exportar a CSV', Input::all(), array('class'=>'btn btn-success')) }}
        </div>

        {{Form::close()}}
    </div>
</div>

<div class="row">
    <p>Mostrando: {{ $customers->getTotal() }} cliente(s)</p>
    <div class="col-xs-12 col-sm-6 col-md-12">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Apellido</th>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Teléfono fijo</th>
                    <th>Teléfono celular</th>
                    <th>Vehículos</th>
                    <th>Acciones</th>
                </tr>
                </thead>

                @if ($customers->count())
                <tbody>
                @foreach($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->last_name }}</td>
	                <td>{{ $customer->name }}</td>
                    <td>{{ $customer->street_name }} {{ $customer->street_number }}</td>
                    <td>{{ $customer->home_phone }}</td>
                    <td>{{ $customer->mobile_phone }}</td>
                    <td>{{ $customer->vehicles->count() }}</td>
                    <td><a href="{{ route('customers.show', $customer->id) }}" title="Ver Detalles"><i class="fa fa-eye"></i></a> - <a href="{{ route('customers.edit', $customer->id) }}" title="Editar"><i class="fa fa-pencil-square-o"></i></a> - <a href="{{ route('customers.delete', $customer->id) }}" title="Eliminar"><i class="fa fa-ban"></i></a></td>
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
        {{ $customers->links() }}
    </div>
</div><!-- End: .row -->


@stop