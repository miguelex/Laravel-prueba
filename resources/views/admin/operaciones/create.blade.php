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
                    Editar operación
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.operaciones.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="">Tipo</label>
                          <input type="text" class="form-control" name="tipo">
                        </div>
                        <button type="submit" class="btn btn-primary">Añadir</button>
                        <a href="{{ route('admin.operaciones.index') }}" class="btn btn-danger">Cancelar</a>
                      </form>
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
