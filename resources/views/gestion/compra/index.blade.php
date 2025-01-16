@extends('layout.plantilla1')

@section('titulo', 'Compra')

@section('contenido')

    <div class="container">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">COMPRA REALIZADA</h5>
                <button type="button" class="btn btn-danger btn-lg float-right"
                    onclick="window.location.href='{{ route('compra.create') }}'">
                    + Nuevo
                </button>
                <p class="card-text">
                <div class="table-responsive" style="background:#FFF;">
                    <table class="table" id="tabla_compra">
                        <thead style="background-color:#FF5F67;color: #fff;">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">DOC</th>
                                <th scope="col">N° DOC.</th>
                                <th scope="col">NOMBRE DE PROVEEDOR</th>
                                <th scope="col">TIPO DE PAGO</th>
                                <th scope="col">MÉTODO DE PAGO</th>
                                <th scope="col">ESTADO</th>
                                <th scope="col">OPCIONES</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>



    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            var table = $('#tabla_compra').DataTable({
                responsive: true, // Habilitar la opción responsive
                autoWidth: false,
                searchDelay: 2000,
                processing: true,
                serverSide: true,
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "zeroRecords": "Nada encontrado - disculpa",
                    "info": "Mostrando la página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    "search": "Buscar:",
                    "paginate": {
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },

                order: [
                    [0, "asc"]
                ],
                ajax: {
                    url: "{{ route('compra.index') }}",
                    type: "GET",
                    error: function(xhr, error) {
                        console.error("Error en la carga de datos:", error);
                    }
                },
                columns: [{
                        data: 'COM_Id',
                        name: 'COM_Id'
                    },
                    {
                        data: 'COM_TipoDocumento',
                        name: 'COM_TipoDocumento',
                    },
                    {
                        data: 'COM_NumDocumento',
                        name: 'COM_NumDocumento',
                    },
                    {
                        data: 'PROV_Nombre',
                        name: 'PROV_Nombre',
                    },
                    {
                        data: 'COM_TipoPago',
                        name: 'COM_TipoPago',
                    },
                    {
                        data: 'MEP_Nombre',
                        name: 'MEP_Nombre',
                    },
                    {
                        data: 'COM_Status',
                        name: 'COM_Status',
                    },
                    {
                        data: null,
                        name: '',
                        'render': function(data, type, row) {
                            return data.action3 + ' ' + data.action1 + ' ' + data.action2;
                        }
                    }
                ],
            });

        })
    </script>
@endsection
