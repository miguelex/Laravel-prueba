@extends('adminlte::page')

@section('title', 'Changelog')

@section('content_header')
    <h1>Control de cambios</h1>
@stop

@section('content')
    <ul>
        <li>Versión 05/05/2021</li>
        <ol>
            <li>Añadido Link a la documentación de la API</li>
            <li>Creado 100 empleados aleatoriamente</li>
            <li>Refactorizado código del endpoint de subir los puntos</li>
            <li>Se añade a la vista de empleados información acerca de si el empelado tiene foto o no</li>
        </ol>
    </ul>
    <ul>
        <li>Versión 03/05/2021</li>
        <ol>
            <li>V1 de la API activa</li>
            <li>Solucionado error dni</li>
        </ol>
    </ul>
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
