@extends('adminlte::page')

@section('title', 'Editar rol')

@section('content_header')
    <h1>Editar empleado</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            {!! Form::model($empleado, ['route' =>['admin.empleados.update', $empleado], 'method' => 'put']) !!}

                @include('admin.empleados.partials.form')
                {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}

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
