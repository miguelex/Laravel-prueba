@extends('adminlte::page')

@section('title', 'Diario')

@section('content_header')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <h1>Diario</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-striped diario">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Categoria</th>
                        <th>Usuario</th>
                        <th>Fecha</th>
                        <th>Accion</th>
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

          var table = $('.diario').DataTable({
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

            ajax: "{{ route('diario.list') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'tipo', name: 'tipo'},
                {data: 'usuario', name: 'usuario'},
                {data: 'accion', name: 'accion'},
                {data: 'codigoTiempo', name: 'codigoTiempo'},
            ]
          });

        });
      </script>
@stop

