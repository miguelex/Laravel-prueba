@extends('adminlte::page')

@section('title', 'Empleados')

@section('content_header')
    <h1>Fotografía del empleado {{ $nombre }} {{ $apellidos }}</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        <img src="{{ url('storage/'.$id.'/'.$id.'.png') }}" alt="" title="" />
    </div>
</div>


@stop
