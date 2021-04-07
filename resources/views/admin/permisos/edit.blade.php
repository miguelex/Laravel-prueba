@extends('adminlte::page')

@section('title', 'Permisos')

@section('content_header')
    <h1>Editar permiso</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            {!! Form::model($permiso, ['route' =>['admin.permisos.update', $permiso], 'method' => 'put']) !!}

                @include('admin.permisos.partials.form')
                {!! Form::submit('Actualizar permiso', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
