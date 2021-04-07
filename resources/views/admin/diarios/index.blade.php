@extends('adminlte::page')

@section('title', 'Diario')

@section('content_header')
    <h1>Diario</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tipo</th>
                        <th>Usuario</th>
                        <th>Fecha</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($diarios as $diario )
                        <tr>
                            <td>{{$diario->id }}</td>
                            <td>{{$diario->tipo }}</td>
                            <td>{{$diario->name }}</td>
                            <td>{{$diario->codigoTiempo }}</td>
                            <td>{{$diario->accion}}</td>
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
