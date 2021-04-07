@extends('adminlte::page')

@section('title', 'Operaciones')

@section('content_header')
    <h1>Editar operacion</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            {!! Form::model($operacione, ['route' =>['admin.operaciones.update', $operacione], 'method' => 'put']) !!}

                @include('admin.operaciones.partials.form')
                {!! Form::submit('Actualizar operacion', ['class' => 'btn btn-primary']) !!}

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
