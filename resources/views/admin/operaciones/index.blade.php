@extends('adminlte::page')

@section('title', 'Escritorio')

@section('content_header')
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Listado de operaciones
                        <a href="{{ route('admin.operaciones.create') }}" class="btn btn-success btn-sm float-right">Nueva operación</a>
                    </div>
                    <div class="card-body">
                        @if (session('op.info'))
                            <div class="alert alert-success">
                                {{ session('op.info') }}
                            </div>
                        @endif
                        <table class="table table-hover table-sm">
                            <thead>
                                <th>ID</th)>
                                <th>Tipo</th)>
                                <th>Acciones</th)>
                            </thead>
                            <tbody>
                                @foreach ($operaciones as $operacion)
                                    <tr>
                                        <td>
                                            {{$operacion->id}}
                                        </td>
                                        <td>
                                            {{$operacion->tipo}}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.operaciones.edit',$operacion->id) }}" class="btn btn-warning">Editar</a>
                                            <a href="javascript: document.getElementById('delete-{{ $operacion->id }}').submit()" class="btn btn-danger">Eliminar</a>
                                            <form id="delete-{{ $operacion->id }}" action=" {{ route('admin.operaciones.destroy',$operacion->id) }}" method="POST">
                                                @method('delete')
                                                @csrf
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
