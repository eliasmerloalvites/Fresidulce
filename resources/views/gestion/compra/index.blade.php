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
                    <table class="table" id="tabla_dcompra">
                        <thead style="background-color:#FF5F67;color: #fff;">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">ALMACEN</th>
                                <th scope="col">NOMBRE DE PROVEEDOR</th>
                                <th scope="col">CANTIDAD</th>
                                <th scope="col">PRECIO DE COMPRA</th>
                                <th scope="col">PRECIO DE VENTA</th>
                                <th scope="col">Opciones</th>
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

            var table = $('#tabla_dcompra').DataTable({
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
                ajax: "{{ route('compra.index') }}",
                columns: [{
                        data: 'DCOM_Id',
                        name: 'DCOM_Id'
                    },
                    {
                        data: 'COM_Id',
                        name: 'COM_Id',
                    },
                    {
                        data: 'ALM_Id',
                        name: 'ALM_Id',
                    },
                    {
                        data: 'PRO_Id',
                        name: 'PRO_Id',
                    },
                    {
                        data: 'DCOM_Cantidad',
                        name: 'DCOM_Cantidad',
                    },
                    {
                        data: 'DCOM_PrecioCompra',
                        name: 'DCOM_PrecioCompra',
                    },
                    {
                        data: 'DCOM_PrecioVenta',
                        name: 'DCOM_PrecioVenta',
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
