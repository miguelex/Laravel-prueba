@extends('adminlte::page')

@section('title', 'Empleados')

@section('content_header')
    <a class="btn btn-success btn-sm float-right" href="{{ route('admin.empleados.create') }}">Añadir empleado</a>
    <h1>Lista de empleados</h1>
@stop

@section('content')
@if (session('info'))
<div class="alert alert-success">
    {{ session('info') }}
</div>
@endif
<div class="card">
<div class="card-body">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>DNI/NIE</th>
                <th>Direccion</th>
                <th>Ciudad</th>
                <th>Código postal</th>
                <th>Foto</th>
                <th>Situación</th>
                <th colspan="3">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($empleados as $empleado )
                <tr>
                    <td>{{ $empleado->id }}</td>
                    <td>{{ $empleado->nombre }}</td>
                    <td>{{ $empleado->apellidos }}</td>
                    <td>{{ $empleado->dni }}</td>
                    <td>{{ $empleado->direccion }}</td>
                    <td>{{ $empleado->ciudadNombre }}</td>
                    <td>{{ $empleado->codigoPostal }}</td>
                    @if ($empleado->cara_id > 0)
                        <td><span class="badge badge-success">Si</span></td>
                    @else
                        <td><span class="badge badge-danger">No</span></td>
                    @endif
                    <td>
                    @if ($empleado->tipo == "Alta")
                        <span class="badge badge-success">
                    @elseif ($empleado->tipo == "Baja")
                        <span class="badge badge-danger">
                    @elseif ($empleado->tipo == "Vacaciones")
                        <span class="badge badge-info">
                    @else ($empleado->tipo == "Permiso")
                            <span class="badge badge-warning">
                    @endif
                    {{ $empleado->tipo }}</span></td>
                    <td width="10px">
                        <a href="{{ route('admin.empleados.edit', $empleado) }}" class="btn btn-sm btn-primary">Editar</a>
                    </td>
                    <td width="10px">
                        <form action="{{ route('admin.empleados.destroy', $empleado) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                    @if ($empleado->cara_id > 0)
                        <td width="10px">
                            <a href="{{ route('admin.empleados.show', $empleado) }}" class="btn btn-sm btn-success">Foto</a>                        </td>
                            <!--
                            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#yourModal{{$empleado->id}}">Foto</button>
                            -->
                        </td>
                    @else
                    <td width="10px">
                        <button type="button" class="btn btn-sm btn-success" disabled>Foto</button>
                    </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $empleados->links() }}
</div>

@foreach ($empleados as $empleado)
    <div class="modal fade text-left" id="yourModal{{$empleado->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ $empleado->nombre }} {{ $empleado->apellidos }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img id="image" src="{{ asset('storage/'.$empleado->id.'/'.$empleado->cara_id.'.png') }}" alt="{{ $empleado->nombre }} {{ $empleado->apellidos }}" title="{{ $empleado->nombre }} {{ $empleado->apellidos }}" />

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
