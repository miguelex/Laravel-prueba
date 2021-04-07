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
            {!! Form::model($situacione, ['route' =>['admin.situaciones.update', $situacione], 'method' => 'put']) !!}

                @include('admin.situaciones.partials.form')
                {!! Form::submit('Actualizar situacion', ['class' => 'btn btn-primary']) !!}

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
