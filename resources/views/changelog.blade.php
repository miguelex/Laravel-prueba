@extends('adminlte::page')

@section('title', 'Changelog')

@section('content_header')
    <h1>Control de cambios</h1>
@stop

@section('content')
    <ul>
        <li>Versión 05/05/2021-b</li>
        <ol>
            <li>Añadido paginación a empleados</li>
            <li>Código de colores para identificar rapdiamente la situación en la que esta cada empleado</li>
            <li>Datos del Dashboard  reales - salvo los relacionados con el reconocimiento facial- </li>

        </ol>
    </ul>
    <ul>
        <li>Versión 05/05/2021-a</li>
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
        <li>Versión 25/04/2021</li>
        <ol>
            <li>Armonización de las vistas</li>
            <li>Comprobación de las validaciones</li>
            <li>Rol correcto en la tarjeta del nombre. EN caso de tener los dos roles, se meustra el prioritario</li>
            <li>La imagen de perfil ya no es una imagen aleatoria de internet. Falta permitir la subida de la misma</li>
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
