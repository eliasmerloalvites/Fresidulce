@extends('layout.plantilla1')
@section('title', 'proveedor')
@section('contenido')

    <head>
        <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
        <link href="{{ asset('plugins/select2/css/select2.min.css') }}" rel="stylesheet">
        <link href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}" rel="stylesheet">
        <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    </head>
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
                                    <select id="PROV_TipoDocumento" name="PROV_TipoDocumento"
                                        class="form-control select2 select2-info" data-dropdown-css-class="select2-info"
                                        required>
                                        <option value="" selected disabled>Seleccione un tipo de documento</option>
                                        <option value="DNI">DNI</option>
                                        <option value="RUC">RUC</option>
                                        <option value="Pasaporte">Pasaporte</option>
                                        <option value="Carnet de extranjería">Carnet de extranjería</option>
                                    </select>
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
                                        placeholder="Dirección">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label class="control-label"
                                        style=" text-align: left; display: block;">Descripción:</label>
                                    <input type="text" id="PROV_Descripcion" name="PROV_Descripcion"
                                        class="form-control " placeholder="Descripción">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label class="control-label" style=" text-align: left; display: block;">Celular:</label>
                                    <input type="text" id="PROV_Celular" name="PROV_Celular" class="form-control "
                                        placeholder="Celular">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label class="control-label" style=" text-align: left; display: block;">E-mail:</label>
                                    <input type="text" id="PROV_Correo" name="PROV_Correo" class="form-control "
                                        placeholder="Email">
                                </div>
                            </div>
                            <p></p>
                            <button id="saveBtn" class="btn btn-primary"><i class="fas fa-save"></i>Guardar</button>
                            <button id="updateBtn" class="btn btn-info" style="display: none;"><i
                                    class="fas fa-save"></i>Actualizar</button>
                            <button type="reset" id="btncancelar" class="btn btn-danger"> <i
                                    class="fas fa-ban"></i>Cancelar </button>
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

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.select2').select2()

            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

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
                } else if (numDoc == '' || numDoc.length > 12) {
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
                        $('#PROV_TipoDocumento').val('');
                        $('#PROV_TipoDocumento').change();
                        $('#proveedor_form').trigger("reset");
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

            $('body').on('click', '.editProveedor', function() {
                var Proveedor_id_edit = $(this).data('identificador');
                $.get('{{ route('proveedor.edit', ':proveedor') }}'.replace(':proveedor',
                        Proveedor_id_edit),
                    function(result) {
                        console.log(result);
                        $('#proveedor_id_edit').val(result.data.PROV_Id);
                        $('#PROV_TipoDocumento').val(result.data.PROV_TipoDocumento);
                        $('#PROV_TipoDocumento').change();
                        $('#PROV_NumDocumento').val(result.data.PROV_NumDocumento);
                        $('#PROV_RazonSocial').val(result.data.PROV_RazonSocial);
                        $('#PROV_Direccion').val(result.data.PROV_Direccion);
                        $('#PROV_Descripcion').val(result.data.PROV_Descripcion);
                        $('#PROV_Celular').val(result.data.PROV_Celular);
                        $('#PROV_Correo').val(result.data.PROV_Correo);

                        // Mostrar botón Actualizar y ocultar botón Guardar
                        $("#saveBtn").hide();
                        $("#updateBtn").show();
                    })
            });

            $('#updateBtn').click(function(e) {
                e.preventDefault();
                Proveedor_id_update = $('#proveedor_id_edit').val();
                $.ajax({
                    data: $('#proveedor_form').serialize(),
                    url: '{{ route('proveedor.update', ':proveedor') }}'.replace(':proveedor',
                        Proveedor_id_update),
                    type: "PUT",
                    dataType: 'json',
                    success: function(data) {
                        console.log('Success:', data);
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        });
                        cancelarUpdate();
                        table.draw();
                    },
                    error: function(data) {
                        console.log('Error:', data);
                        Toast.fire({
                            type: 'error',
                            title: 'Proveedor fallo al actualizarse.'
                        })
                    }
                });
            });

            $('#btncancelar').click(function(e) {
                cancelarUpdate();
                Swal.fire({
                    icon: 'info',
                    title: 'Registro cancelado',
                    text: 'El formulario se ha reiniciado correctamente.',
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
            });

            function cancelarUpdate() {
                $('#proveedor_form').trigger("reset");
                $('#PROV_TipoDocumento').val('');
                $('#PROV_TipoDocumento').change();
                $("#proveedor_id_edit").val('');
                $("#saveBtn").show(); // Mostrar botón Guardar
                $("#updateBtn").hide();
            }

            $('body').on('click', '.deleteProveedor', function() {

                var Proveedor_id_delete = $(this).data("id");
                $confirm = confirm("¿Estás seguro de que quieres eliminarlo?");
                if ($confirm == true) {
                    $.ajax({
                        type: "DELETE",

                        url: '{{ route('proveedor.destroy', ':proveedor') }}'.replace(
                            ':proveedor', Proveedor_id_delete),
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(data) {
                            table.draw();
                            console.log('success:', data);
                            Toast.fire({
                                type: 'success',
                                title: String(data.success),
                                icon: 'info'
                            });
                            

                        },
                        error: function(data) {
                            console.log('Error:', data);
                            Toast.fire({
                                type: 'error',
                                title: 'Proveedor fallo al Eliminarlo.',
                                icon: 'info'
                            })
                        }
                    });
                } else {
                    Toast.fire({
                        title: 'Acción cancelada',
                        text: 'Proveedor no ha sido eliminado.',
                        icon: 'info'
                    });
                }
            });
        });
    </script>

@endsection
