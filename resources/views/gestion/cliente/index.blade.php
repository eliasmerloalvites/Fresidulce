@extends('layout.plantilla1')

@section('titulo', 'Clientes')

@section('contenido')

    <head>
        <!-- Ruta para incluir el archivo CSS -->
        <link href="{{ asset('css/stylemodal.css') }}" rel="stylesheet">

    </head>
    <div class="container">
        <div class="row ">
            @can('gestion.cliente.create')
                <div class="col-5">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">CREAR CLIENTE</h5>
                            <p class="card-text"></p>
                            <form method="POST" id="cliente_form" action="{{ route('gestion.cliente.store') }}">
                                @csrf
                                <input type="text" id="cliente_id_edit" hidden>
                                <div class="form-group row">
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <label class="control-label" style="text-align: left; display: block;">Tipo
                                            Documento:</label>
                                        <select class="form-control" id="idCLI_TipoDocumento" name="CLI_TipoDocumento"
                                            onchange="Limitar()" required>
                                            <option value="DNI">DNI</option>
                                            <option value="RUC">RUC</option>
                                            <option value="CE">CE</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: left;">
                                        <label for="name" class=" control-label">Numero Documento</label>
                                        <div class="input-group ">
                                            <input type="text" class="form-control sm" id="idCLI_NumDocumento"
                                                name="CLI_NumDocumento" placeholder="Ingrese Nº Documento" maxlength="8"
                                                required>
                                            <div class="input-group-append">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="Buscar_Cliente" style="display: block;"
                                                        onclick="buscarCliente()"><i class="fas fa-search"></i></span>
                                                    <span class="input-group-text hide" id="cargando"
                                                        style="display: none;"><img width="15px"
                                                            src="{{ asset('images/gif/cargando1.gif') }}"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <label class="control-label" style="text-align: left; display: block;">Nombre:</label>
                                        <input type="text" id="idCLI_Nombre" name="CLI_Nombre" class="form-control "
                                            placeholder="Ingrese Nombre" required>
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <label class="control-label"
                                            style="text-align: left; display: block;">Dirección:</label>
                                        <input type="text" id="idCLI_Direccion" name="CLI_Direccion" class="form-control "
                                            placeholder="Ingrese Dirección">
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <label class="control-label" style="text-align: left; display: block;">Celular:</label>
                                        <input type="number" id="idCLI_Celular" name="CLI_Celular" class="form-control "
                                            placeholder="Ingrese Celular">
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <label class="control-label" style="text-align: left; display: block;">Correo:</label>
                                        <input type="email" id="idCLI_Correo" name="CLI_Correo" class="form-control "
                                            placeholder="Ingrese correo">
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
            @endcan

            @can('gestion.cliente.index')
                <div class="col-7">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">LISTA DE CLIENTES</h5>
                            <p class="card-text">
                            <div class="table-responsive" style="background:#FFF;">
                                <table class="table" id="tabla_cliente">
                                    <thead style="background-color:#FF5F67;color: #fff;">
                                        <tr>
                                            <th scope="col">N°</th>
                                            <th scope="col">N° Doc</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Opciones</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan
        </div>
    </div>



    <!-- Modal Ver detalles-->
    <div class="modal fade" id="modalVerDetalle" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Detalles del Proveedor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <p class="col">Id Cliente: </p>
                        <p id="ver_CLI_Id" class="col"></p>
                    </div>
                    <div class="row">
                        <p class="col">Tipo Documento:</p>
                        <p id="ver_CLI_TipoDocumento" class="col"></p>
                    </div>
                    <div class="row">
                        <p class="col">Numero Documento:</p>
                        <p id="ver_CLI_NumDocumento" class="col"></p>
                    </div>
                    <div class="row">
                        <p class="col">Nombre: </p>
                        <p id="ver_CLI_Nombre" class="col"></p>
                    </div>
                    <div class="row">
                        <p class="col">Dirección: </p>
                        <p id="ver_CLI_Direccion" class="col"></p>
                    </div>
                    <div class="row">
                        <p class="col">Celular: </p>
                        <p id="ver_CLI_Celular" class="col"></p>
                    </div>
                    <div class="row">
                        <p class="col">Correo: </p>
                        <p id="ver_CLI_Correo" class="col"></p>
                    </div>
                    <div class="row">
                        <p class="col">Fecha de registro: </p>
                        <p id="ver_fecha_registro" class="col"></p>
                    </div>
                    <div class="row">
                        <p class="col">Fecha de actualización: </p>
                        <p id="ver_fecha_update" class="col"></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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

            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                icon: 'info'
            });

            var table = $('#tabla_cliente').DataTable({
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
                ajax: "{{ route('gestion.cliente.index') }}",
                columns: [{
                        data: 'CLI_Id',
                        name: 'CLI_Id'
                    },
                    {
                        data: 'CLI_NumDocumento',
                        name: 'CLI_NumDocumento'
                    },
                    {
                        data: 'CLI_Nombre',
                        name: 'CLI_Nombre'
                    },
                    {
                        data: null,
                        name: '',
                        'render': function(data, type, row) {
                            return  @can('gestion.cliente.show')
                                    data.action3 + ' ' +
                                @endcan
                            ''
                            @can('gestion.cliente.edit')
                                +data.action1 + ' ' +
                            @endcan
                            ''
                            @can('gestion.cliente.destroy')
                                +data.action2
                            @endcan ;
                        }
                    }
                ]
            });

            $('#saveBtn').click(function(e) {
                e.preventDefault();
                const form = document.getElementById('cliente_form');
                if (form.checkValidity()) {
                    $.ajax({
                        data: $('#cliente_form').serialize(),
                        url: "{{ route('gestion.cliente.store') }}",
                        type: "POST",
                        dataType: 'json',
                        success: function(data) {
                            console.log('Success:', data);
                            Toast.fire({
                                type: 'success',
                                title: data.success
                            })
                            cancelarUpdate();
                            table.draw();
                        },
                        error: function(data) {
                            console.log('Error:', data);
                            Toast.fire({
                                type: 'error',
                                title: 'cliente fallo al Registrarse.'
                            })
                        }
                    });
                } else {
                    form.reportValidity();
                }

            });

            $('body').on('click', '.editCliente', function() {
                var Cliente_id_edit = $(this).data('identificador');
                $.get('{{ route('gestion.cliente.edit', ['cliente' => ':cliente']) }}'.replace(':cliente',
                        Cliente_id_edit),
                    function(result) {
                        console.log(result);
                        $('#cliente_id_edit').val(result.data.CLI_Id);
                        $('#idCLI_TipoDocumento').val(result.data.CLI_TipoDocumento);
                        $('#idCLI_NumDocumento').val(result.data.CLI_NumDocumento);
                        $('#idCLI_Nombre').val(result.data.CLI_Nombre);
                        $('#idCLI_Direccion').val(result.data.CLI_Direccion);
                        $('#idCLI_Celular').val(result.data.CLI_Celular);
                        $('#idCLI_Correo').val(result.data.CLI_Correo);


                        // Mostrar botón Actualizar y ocultar botón Guardar
                        $("#saveBtn").hide();
                        $("#updateBtn").show();
                    })
            });

            $('#updateBtn').click(function(e) {
                e.preventDefault();
                const form = document.getElementById('cliente_form');
                if (form.checkValidity()) {
                    Cliente_id_update = $('#cliente_id_edit').val();
                    $.ajax({
                        data: $('#cliente_form').serialize(),
                        url: '{{ route('gestion.cliente.update', ['cliente' => ':cliente']) }}'
                            .replace(
                                ':cliente', Cliente_id_update),
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
                                title: 'Cliente fallo al actualizarse.'
                            })
                        }
                    });
                } else {
                    form.reportValidity();
                }
            });

            $('body').on('click', '.eyeCliente', function() {
                var Cliente_id_ver = $(this).data('id');
                $('#modalVerDetalle').modal('show');
                $.get('{{ route('gestion.cliente.show', ['cliente' => ':cliente']) }}'.replace(':cliente',
                        Cliente_id_ver),
                    function(data) {
                        $('#ver_CLI_Id').text(data.data.CLI_Id);
                        $('#ver_CLI_TipoDocumento').text(data.data.CLI_TipoDocumento);
                        $('#ver_CLI_NumDocumento').text(data.data.CLI_NumDocumento);
                        $('#ver_CLI_Nombre').text(data.data.CLI_Nombre);
                        $('#ver_CLI_Direccion').text(data.data.CLI_Direccion);
                        $('#ver_CLI_Celular').text(data.data.CLI_Celular);
                        $('#ver_CLI_Correo').text(data.data.CLI_Correo);
                        $('#ver_fecha_registro').text(moment(data.data.created_at).format(
                            'YYYY-MM-DD HH:mm:ss'));
                        $('#ver_fecha_update').text(moment(data.data.updated_at).format(
                            'YYYY-MM-DD HH:mm:ss'));
                    })
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

            $('body').on('click', '.deleteCliente', function() {

                var Cliente_id_delete = $(this).data("id");
                $confirm = confirm("¿Estás seguro de que quieres eliminarlo?");
                if ($confirm == true) {
                    $.ajax({
                        type: "DELETE",

                        url: '{{ route('gestion.cliente.destroy', ['cliente' => ':cliente']) }}'
                            .replace(
                                ':cliente', Cliente_id_delete),
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
                                title: 'Cliente fallo al Eliminarlo.',
                                icon: 'info'
                            })
                        }
                    });
                } else {
                    Toast.fire({
                        title: 'Acción cancelada',
                        text: 'La cliente no ha sido eliminada.',
                        icon: 'info'
                    });
                }
            });
        });

        function cancelarUpdate() {
            $('#cliente_form').trigger("reset");
            $("#cliente_id_edit").val('');
            $("#saveBtn").show(); // Mostrar botón Guardar
            $("#updateBtn").hide();
        }

        function Limitar() {
            var cod = document.getElementById("idCLI_TipoDocumento").value;
            if (cod == 'DNI') {
                $("#idCLI_NumDocumento").val("");
                $("#idCLI_NumDocumento").attr('maxlength', '8');
            } else {
                $("#idCLI_NumDocumento").val("");
                $("#idCLI_NumDocumento").attr('maxlength', '11');
            }
        }

        function buscarCliente() {
            if ($('#idCLI_TipoDocumento').val() == 'DNI') {
                var numdni = $('#idCLI_NumDocumento').val();
                if (numdni != '') {
                    ocultar()
                    var url = '/consultardni/' + numdni + '?';
                    $.ajax({
                        type: 'GET',
                        url: url,
                        success: function(dat) {
                            if (dat.success[1] == false) {
                                Swal
                                    .fire({
                                        title: "DNI Inválido",
                                        icon: 'error',
                                        confirmButtonColor: "#26BA9A",
                                        width: '350px',
                                        confirmButtonText: "Ok"
                                    })
                                    .then(resultado => {
                                        if (resultado.value) {
                                            $("#idCLI_Nombre").val("");
                                        } else {}
                                    });
                            } else {
                                $('#idCLI_Nombre').val(dat.success[0].apellido + ' ' + dat.success[0].nombre);
                            }
                        }

                    });
                } else {
                    //mostrar()
                    alert('Escriba el DNI.!');
                    $('#idCLI_NumDocumento').focus();
                }
            } else if ($('#idCLI_TipoDocumento').val() == 'RUC') {
                var numdni = $('#idCLI_NumDocumento').val();
                if (numdni != '') {
                    ocultar()
                    var url = '/consultarruc/' + numdni + '?';
                    $.ajax({
                        type: 'GET',
                        url: url,
                        success: function(dat) {
                            console.log(dat)
                            if (dat.success[0] == "") {
                                $('#idCLI_Nombre').val(dat.success[1]);
                                $('#idCLI_Direccion').val(dat.success[2] + ' ' + dat.success[3]);
                            } else {
                                $('#idCLI_Nombre').val(dat.success[0].apellido + ' ' + dat.success[0].nombre);
                            }

                        }

                    });
                } else {
                    alert('Escriba el RUC.!');
                    $('#idCLI_NumDocumento').focus();
                }
            }
        }

        function ocultar() {
            document.getElementById('Buscar_Cliente').style.display = 'none';
            document.getElementById('cargando').style.display = 'block';
            setInterval('mostrar()', 1000);
        }

        function mostrar() {
            $valorcito = $('#idCLI_Nombre').val();
            $valor = $valorcito.length;
            if ($valor > 0) {
                document.getElementById('Buscar_Cliente').style.display = 'block';
                document.getElementById('cargando').style.display = 'none';
            }
        }
    </script>
@endsection
