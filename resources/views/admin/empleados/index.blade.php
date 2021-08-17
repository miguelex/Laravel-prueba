@extends('adminlte::page')

@section('title', 'Empleados')

@section('content_header')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <a class="btn btn-success btn-sm float-right" href="{{ route('admin.empleados.create') }}">Añadir empleado</a>
    <h1>Lista de empleados</h1>
@stop

@section('content')
    @if (session('info'))
    <div class="alert alert-success">
        {{ session('info') }}
    </div>
    @endif
    <div class="card">
        <div class="card-body">
            <table class="table table-striped empleados">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>DNI/NIE</th>
                        <th>Direccion</th>
                        <th>Ciudad</th>
                        <th>Código Postal</th>
                        <th>Cara</th>
                        <th>Situación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
@stop

@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
    <script>
        $(function () {

          var table = $('.empleados').DataTable({
            responsive: true,
            autoWidth: false,
            processing: true,
            serverSide: true,
            "language": {
                "lengthMenu": "Ver _MENU_ registros por página",
                "zeroRecords": "No se encuentra ningún registro",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "No existen registros disponibles",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                'search': "Buscar:",
                'paginate' : {
                    'next': "Siguiente",
                    'previous': "Anterior"
                }

            },

            ajax: "{{ route('empleado.list') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'nombre', name: 'nombre'},
                {data: 'apellidos', name: 'apellidos'},
                {data: 'dni', name: 'dni'},
                {data: 'direccion', name: 'direccion'},
                {data: 'city', name: 'city'},
                {data: 'codigoPostal', name: 'codigoPostal'},
                {data: 'cara', name: 'cara', render: function(data, type, row){
                    face='';
                    if (data == null){
                        face = '<span class="badge badge-danger">'+"No"+'</span>';
                    }
                    else {
                        face = '<span class="badge badge-success">'+"Si"+'</span>';
                    }

                    return face;
                }},
                {data: 'situacion', name: 'situacion', render: function(data, type, row){
                  sev='';
                  switch (data){
                    case "Alta":
                        sev = '<span class="badge badge-success badge-pill">'+data+'</span>';
                        break;
                    case "Baja":
                        sev = '<span class="badge badge-danger badge-pill">'+data+'</span>';
                        break;
                    case "Vacaciones":
                        sev = '<span class="badge badge-info badge-pill">'+data+'</span>';
                        break;
                    case "Permiso":
                        sev = '<span class="badge badge-warning badge-pill">'+data+'</span>';
                        break;

                  }
                  return sev;
                }},
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ]
          });

        });
      </script>
@stop
