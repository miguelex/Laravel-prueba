@extends('adminlte::page')

@section('title', 'Diario')

@section('content_header')
    <h1>Diario</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="diario">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tipo</th>
                        <th>Usuario</th>
                        <th>Fecha</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($diarios as $diario )
                        <tr>
                            <td>{{$diario->id }}</td>
                            <td>{{$diario->tipo }}</td>
                            <td>{{$diario->name }}</td>
                            <td>{{$diario->codigoTiempo }}</td>
                            <td>{{$diario->accion}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $diarios->links() }}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#diario').DataTable({
                responsive: true,
                autoWidth: false,
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

                }
            });
        } );
    </script>
@endsection
