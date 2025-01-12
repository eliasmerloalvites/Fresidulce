@extends('layout.plantilla1')
@section('title', 'proveedor')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">CREAR PROVEEDOR</h5>
                        <p class="card-text"></p>
                        <form method="POST" id="proveedor_form" action="{{ route('proveedor.store') }}">
                            @csrf
                            <input type="text" id="proveedor_id_edit" hidden>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label class="control-label" style=" text-align: left; display: block;">Tipo de
                                        documento:</label>
                                    <input type="text" id="PROV_TipoDocumento" name="PROV_TipoDocumento"
                                        class="form-control " placeholder="Tipo de documento" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label class="control-label" style=" text-align: left; display: block;">Número de
                                        documento:</label>
                                    <input type="text" id="PROV_NumDocumento" name="PROV_NumDocumento"
                                        class="form-control " placeholder="Número de documento" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label class="control-label" style=" text-align: left; display: block;">Razón
                                        social:</label>
                                    <input type="text" id="PROV_RazonSocial" name="PROV_RazonSocial"
                                        class="form-control " placeholder="Razón social" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label class="control-label"
                                        style=" text-align: left; display: block;">Dirección:</label>
                                    <input type="text" id="PROV_Direccion" name="PROV_Direccion" class="form-control "
                                        placeholder="Dirección" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label class="control-label"
                                        style=" text-align: left; display: block;">Descripción:</label>
                                    <input type="text" id="PROV_Descripcion" name="PROV_Descripcion"
                                        class="form-control " placeholder="Descripción" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label class="control-label" style=" text-align: left; display: block;">Celular:</label>
                                    <input type="text" id="PROV_Celular" name="PROV_Celular" class="form-control "
                                        placeholder="Celular" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label class="control-label" style=" text-align: left; display: block;">E-mail:</label>
                                    <input type="text" id="PROV_Correo" name="PROV_Correo" class="form-control "
                                        placeholder="Email" >
                                </div>
                            </div>
                            <p></p>
                            <button id="saveBtn" class="btn btn-primary"><i class="fas fa-save"></i>Guardar</button>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-7">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">LISTA DE PROVEEDORES</h5>
                        <p class="card-text">
                        <div class="table-responsive" style="background:#FFF;">
                            <table class="table" id="tabla_proveedor">
                                <thead style="background-color:#FF5F67;color: #fff;">
                                    <tr>
                                        <th scope="col">N°</th>
                                        <th scope="col">Tipo de documento</th>
                                        <th scope="col">Número de documento</th>
                                        <th scope="col">Razón social</th>
                                        <th scope="col">Dirección</th>
                                        <th scope="col">Descripción</th>
                                        <th scope="col">Celular</th>
                                        <th scope="col">E-mail</th>
                                        <th scope="col">Opciones</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
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
                timer: 3000,
                icon: 'info'
            });

            var table = $('#tabla_proveedor').DataTable({
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
                ajax: "{{ route('proveedor.index') }}",
                columns: [{
                        data: 'PROV_Id',
                        name: 'PROV_Id'
                    },
                    {
                        data: 'PROV_TipoDocumento',
                        name: 'PROV_TipoDocumento'
                    },
                    {
                        data: 'PROV_NumDocumento',
                        name: 'PROV_NumDocumento'
                    },
                    {
                        data: 'PROV_RazonSocial',
                        name: 'PROV_RazonSocial'
                    },
                    {
                        data: 'PROV_Direccion',
                        name: 'PROV_Direccion'
                    },
                    {
                        data: 'PROV_Descripcion',
                        name: 'PROV_Descripcion'
                    },
                    {
                        data: 'PROV_Celular',
                        name: 'PROV_Celular'
                    },
                    {
                        data: 'PROV_Correo',
                        name: 'PROV_Correo'
                    },
                    {
                        data: null,
                        name: '',
                        'render': function(data, type, row) {
                            return data.action1 + ' ' + data.action2;
                        }
                    }
                ]
            });

            $('#saveBtn').click(function(e) {
                e.preventDefault();
                tipoDoc = $("#PROV_TipoDocumento").val();
                numDoc = $("#PROV_NumDocumento").val();
                razSoci = $("#PROV_RazonSocial").val();

                if (tipoDoc == '') {
                    Toast.fire({
                        type: 'error',
                        title: 'Seleccione el Tipo de documento por favor'
                    });
                    return false;
                } else if (numDoc == ''|| numDoc.length > 12 ) {
                    Toast.fire({
                        type: 'error',
                        title: 'Digite correctamente el número de documento por favor'
                    });
                    return false;
                } else if (razSoci == '') {
                    Toast.fire({
                        type: 'error',
                        title: 'Digite la razón social por favor'
                    });
                    return false;
                }
                $.ajax({
                    data: $('#proveedor_form').serialize(),
                    url: "{{ route('proveedor.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function(data) {
                        console.log('Success:', data);
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })
                        table.draw();
                    },
                    error: function(data) {
                        console.log('Error:', data);
                        Toast.fire({
                            type: 'error',
                            title: 'Proveedor fallo al Registrarse.'
                        })
                    }
                });
            });
        });
    </script>

@endsection
