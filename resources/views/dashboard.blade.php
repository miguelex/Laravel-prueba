@extends('adminlte::page')

@section('title', 'Escritorio')

@section('content_header')
    <h1>Escritorio</h1>
@stop

@section('content')
    @can('admin.permission.create')
    <p class="text-center">Información visible solo para administradores</p>
    <br>
    <div class="container">
        <div class="row">
          <div class="col">
            <div class="small-box bg-gradient-warning">
                <div class="inner">
                  <h3>150</h3>
                  <p>Intentos de reconocimiento fallidos</p>
                </div>
                <div class="icon">
                  <i class="fas fa-exclamation-triangle"></i>
                </div>
                <a href="#" class="small-box-footer">
                  More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
          </div>
          <div class="col">
            <div class="small-box bg-success">
                <div class="inner">
                  <h3>73%</h3>
                  <p>Reconocimientos correctos</p>
                </div>
                <div class="icon">
                  <i class="fas fa-chart-pie"></i>
                </div>
                <a href="#" class="small-box-footer">
                  More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="small-box bg-info">
                <div class="inner">
                  <h3>150</h3>
                  <p>Nuevas jornadas registradas</p>
                </div>
                <div class="icon">
                  <i class="fas fa-calendar-alt"></i>
                </div>
                <a href="#" class="small-box-footer">
                  More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
          </div>
          <div class="col">
            <div class="small-box bg-info">
                <div class="inner">
                  <h3>150</h3>
                  <p>Nuevos empleados</p>
                </div>
                <div class="icon">
                  <i class="fas fa-user-plus"></i>
                </div>
                <a href="#" class="small-box-footer">
                  More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
          </div>
          <div class="col">
            <div class="small-box bg-info">
                <div class="inner">
                  <h3>150</h3>
                  <p>Entradas nuevas en el diario</p>
                </div>
                <div class="icon">
                  <i class="fas fa-copy"></i>
                </div>
                <a href="#" class="small-box-footer">
                  More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
          </div>
        </div>
      </div>
    @endcan



    @can('admin.permission.create2')
    <br><br>
    <p class="text-center">Información visible solo para usuarios</p>
    <br>
    <div class="container">
        <div class="row">
          <div class="col">
            <div class="small-box bg-info">
                <div class="inner">
                  <h3>150</h3>
                  <p>Empleados</p>
                </div>
                <div class="icon">
                  <i class="fas fa-shopping-cart"></i>
                </div>
                <a href="#" class="small-box-footer">
                  More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
          </div>
          <div class="col">
            <div class="small-box bg-info">
                <div class="inner">
                  <h3>150</h3>
                  <p>New Orders</p>
                </div>
                <div class="icon">
                  <i class="fas fa-shopping-cart"></i>
                </div>
                <a href="#" class="small-box-footer">
                  More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="small-box bg-info">
                <div class="inner">
                  <h3>150</h3>
                  <p>New Orders</p>
                </div>
                <div class="icon">
                  <i class="fas fa-shopping-cart"></i>
                </div>
                <a href="#" class="small-box-footer">
                  More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
          </div>
          <div class="col">
            <div class="small-box bg-info">
                <div class="inner">
                  <h3>150</h3>
                  <p>New Orders</p>
                </div>
                <div class="icon">
                  <i class="fas fa-shopping-cart"></i>
                </div>
                <a href="#" class="small-box-footer">
                  More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
          </div>
          <div class="col">
            <div class="small-box bg-info">
                <div class="inner">
                  <h3>150</h3>
                  <p>New Orders</p>
                </div>
                <div class="icon">
                  <i class="fas fa-shopping-cart"></i>
                </div>
                <a href="#" class="small-box-footer">
                  More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
          </div>
        </div>
      </div>
    @endcan
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

