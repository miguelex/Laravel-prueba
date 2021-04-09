@extends('adminlte::page')

@section('title', 'Changelog')

@section('content_header')
    <h1>Control de cambios</h1>
@stop

@section('content')
    <ul>
        <li>Versión 09/04/2021</li>
        <ol>
            <li>Creación del Changelog</li>
            <li>Creación de usuarios desde panel lateral</li>
            <li>Darle funcionalidad al botón eliminar usuario</li>
            <li>https en heroku</li>
            <li>Logo nuevo</li>
        </ol>

    </ul>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
