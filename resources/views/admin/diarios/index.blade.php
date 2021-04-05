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
                        Diarios
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-sm">
                            <thead>
                                <th>ID</th)>
                                <th>Tipo</th)>
                                <th>Usuario</th)>
                                <th>Fecha</th)>
                                <th>Accion</th)>
                            </thead>
                            <tbody>
                                @foreach ($diarios as $diario)
                                    <tr>
                                        <td>
                                            {{$diario->id}}
                                        </td>
                                        <td>
                                            {{$diario->tipo}}
                                        </td>
                                        <td>
                                            {{$diario->name}}
                                        </td>
                                        <td>
                                            {{$diario->codigoTiempo }}
                                        </td>
                                        <td>
                                            {{$diario->accion}}
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
