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
                <th>Situación</th>
                <th>Fecha nacimiento</th>
                <th>Ciudad</th>
                <th>Código postal</th>
                <th>Direccion</th>
                <th>Foto</th>
                <th colspan="2"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($empleados as $empleado )
                <tr>
                    <td>{{ $empleado->id }}</td>
                    <td>{{ $empleado->nombre }}</td>
                    <td>{{ $empleado->apellidos }}</td>
                    <td>{{ $empleado->dni }}</td>
                    <td>{{ $empleado->tipo }}</td>
                    <td>{{ $empleado->fechaNacimiento }}</td>
                    <td>{{ $empleado->ciudadNombre }}</td>
                    <td>{{ $empleado->codigoPostal }}</td>
                    <td>{{ $empleado->direccion }}</td>
                    @if ($empleado->cara_id > 0)
                        <td><span class="badge badge-success">Si</span></td>
                    @else
                        <td><span class="badge badge-danger">No</span></td>
                    @endif
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
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
