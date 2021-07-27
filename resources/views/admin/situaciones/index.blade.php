@extends('adminlte::page')

@section('title', 'Situaciones')

@section('content_header')
    <a class="btn btn-success btn-sm float-right" href="{{ route('admin.situaciones.create') }}">Añadir situación</a>
    <h1>Lista de situaciones</h1>
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
                            <th>Tipo</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($situaciones as $situacion )
                        <tr>
                            <td>{{ $situacion->id }}</td>
                            <td>{{ $situacion->tipo }}</td>
                            <td width="10px">
                                <a href="{{ route('admin.situaciones.edit', $situacion) }}" class="btn btn-sm btn-primary">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.situaciones.destroy', $situacion) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $situaciones->links() }}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
