@extends('adminlte::page')

@section('title', 'Escritorio')

@section('content_header')
    <h1>Escritorio</h1>
@stop

@section('content')
    @can('admin.user.create')
        @include('partials.admin')
    @endcan

    @can('admin.empleados.create')
        @include('partials.user')
    @endcan

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

