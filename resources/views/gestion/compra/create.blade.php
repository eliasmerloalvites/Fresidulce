@extends('layout.plantilla1')

@section('titulo', 'Registro Compra')

@section('contenido')

    <head>
        <link href="{{ asset('css/styleCompra.css') }}" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

        <!-- Bootstrap JS -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    </head>
    <div class="">
        <div class="">
            <div class="card-body">
                <div style="">
                    <form method="POST" id="compra_form" action="{{ route('compra.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-4">
                                <div class="card">
                                    <div class="card-body">
                                        <p class="card-text"></p>
                                        {{-- <input type="text" id="proveedor_id_edit" hidden> --}}
                                        <div class="form-group row ">
                                            <h5 class="card-title text-center"
                                                style="background-color: #28a745; color: white; padding: 10px;">
                                                Datos generales de la compra
                                            </h5>
                                            <p></p>
                                            <div class="col-md-6 pr-0">
                                                <div class="input-group input-group-select">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-file-alt"
                                                                style="font-size: 12px; color: #6c757d;"></i>
                                                        </span>
                                                    </div>
                                                    <select id="COM_TipoDocumento" name="COM_TipoDocumento"
                                                        style="font-size: 12px; text-align: left; padding-left: 10px; height: 100%;" class="form-control  " required>
                                                        <option value="" disabled selected>Tipo de
                                                            documento
                                                        </option>
                                                        <option value="Boleta">Boleta</option>
                                                        <option value="Factura">Factura</option>
                                                        <option value="Nota_Venta">Nota Venta</option>
                                                    </select>
                                                    <i class="fa fa-chevron-down dropdown-icon"></i>
                                                </div>
                                            </div>

                                            <!-- Número de Documento -->
                                            <div class="col-md-6 pl-0">
                                                <input type="number" class="form-control  rounded-0" id="COM_NumDocumento"
                                                    style="font-size: 12px; text-align: left; padding-left: 10px; height: 100%;"
                                                    name="COM_NumDocumento" placeholder="Número de documento" required>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-12 pl-0 pr-0">
                                                <div class="input-group input-group-sm ">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            Tipo pago
                                                        </span>
                                                    </div>
                                                    <select class="form-control" id="idCOM_TipoPago" name="COM_TipoPago" required >
                                                        <option value="" disabled selected>Seleccione tipo de pago</option>
                                                        <option value="Contado">Contado</option>
                                                        <option value="Credito">Crédito</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group row mb-0">
                                            <div class="col-md-12 pl-0 pr-0">
                                                <div class="input-group input-group-sm ">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            Metodo de pago
                                                        </span>
                                                    </div>
                                                    <select class="form-control" id="idMEP_Id" name="MEP_Id" required="">
                                                        <option value="">Seleccione metodo</option>
                                                        @foreach ($metodo_pago as $mep)
                                                            <option value="{{ $mep->MEP_Id }}">{{ $mep->MEP_Pago }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0">
                                            <div class="col-md-3 pl-0 pr-0">
                                                <div class="input-group">
                                                    <!-- Texto y Select -->
                                                    <span class="input-group-text rounded-0"
                                                        style="font-size: 12px; background-color:#bdc5cc; width: 100%; text-align: left; padding-left: 10px; display: flex; align-items: center;">
                                                        Proveedor
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-8 pl-0 pr-0">
                                                <div class="input-group input-group-select" style="position: relative;">
                                                    <!-- Select de proveedores -->
                                                    <select class="select2 form-control" id="PROV_Id" name="PROV_Id" 
                                                        style="font-size: 12px; text-align: left; padding-left: 10px; height: 100%; padding-right: 30px;">
                                                        <option value="" disabled selected>Seleccione proveedor</option>
                                                        @foreach ($proveedor as $itemproveedor)
                                                            <option value="{{ $itemproveedor->PROV_Id }}">
                                                                {{ $itemproveedor->PROV_TipoDocumento }} -
                                                                {{ $itemproveedor->PROV_NumDocumento }} -
                                                                {{ $itemproveedor->PROV_RazonSocial }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-1 pl-0 pr-0">
                                                <button title="Nuevo Proveedor" type="button" id="btnNuevoProveedor"
                                                    class="btn btn-icon btn-success btn-sm" onclick="NuevoProveedor()" title="Agregar Nuevo Proveedor" >
                                                    <i class="fa fa-plus"></i>
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="card">
                                    <div class="card-body">
                                        <p class="card-text"></p>
                                        <div class="form-group row mb-3">
                                            <h5 class="card-title text-center"
                                                style="background-color: #28a745; color: white; padding: 10px;">Información
                                                del producto
                                            </h5>
                                            <p></p>
                                            <!-- Columna Producto -->
                                            <div class="col-md-8 d-flex align-items-center">
                                                <div class="d-flex" style="width: 30%;">
                                                    <div class="input-group"
                                                        style=" background-color: #b0bec5; padding: 5px 10px; height: 35px;">
                                                        <span class="form-control rounded-0"
                                                            style="background: none; border: none; color: #333; font-size: 12px; ">
                                                            Producto
                                                        </span>
                                                    </div>
                                                </div>
                                                <div style="width: 70%;">
                                                    <div class="input-group" style="height: 35px;">
                                                        <select class="form-control rounded-0" id="PRO_Id"
                                                            name="PRO_Id"
                                                            style="font-size: 12px; text-align: left; padding-left: 10px; height: 100%; padding-right: 30px;">
                                                            <option value="" disabled selected>Seleccione Producto
                                                                @foreach ($producto as $itemProducto)
                                                            </option>
                                                            <option value="{{ $itemProducto->PRO_Id }}">
                                                                {{ $itemProducto->PRO_Nombre }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                        <i class="fa fa-chevron-down dropdown-icon"
                                                            style="position: absolute; right: 56px; top: 50%; transform: translateY(-50%); font-size: 16px; pointer-events: none;"></i>

                                                        <button title="Nuevo Producto" type="button"
                                                            id="btnNuevoProducto" class="btn btn-success btn-sm"
                                                            onclick="mostrarformularioP()"
                                                            style="border-bottom-right-radius: 10px; border-top-right-radius: 10px; height: 35px;">
                                                            <i class="fa fa-plus"></i> <i class="fa fa-user"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Columna Almacén -->
                                            <div class="col-md-4 d-flex align-items-center">
                                                <div class="d-flex" style="width: 35%;">
                                                    <div class="input-group"
                                                        style=" background-color: #b0bec5;   height: 35px;">
                                                        <span class="form-control"
                                                            style="background: none; border: none; color: #333; font-size: 12px;">
                                                            Almacén
                                                        </span>
                                                    </div>
                                                </div>
                                                <div style="width: 65%;">
                                                    <select id="ALM_Id" name="ALM_Id" class="form-control rounded-0"
                                                        required
                                                        style="font-size: 12px; text-align: left; padding-left: 10px; height: 35px; padding-right: 30px;">
                                                        <option value="">Seleccione Almacén</option>

                                                        @foreach ($almacen as $itemAlmacen)
                                                            <option value="{{ $itemAlmacen->ALM_Id }}">
                                                                {{ $itemAlmacen->ALM_Nombre }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <i class="fa fa-chevron-down dropdown-icon"
                                                        style="position: absolute; right: 20px; top: 50%; transform: translateY(-50%); font-size: 16px; pointer-events: none;"></i>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-3">
                                            <!-- Precio de compra -->
                                            <div class="col-md-4 d-flex align-items-center">
                                                <div class="d-flex" style="width: 50%;">
                                                    <div class="input-group"
                                                        style=" background-color: #b0bec5;  height: 40px;width:95px;">
                                                        <span class="form-control"
                                                            style="background: none; border: none; color: #333; font-size: 12px;  ">
                                                            Precio de compra
                                                        </span>
                                                    </div>
                                                </div>
                                                <input type="number" id="DCOM_PrecioCompra" name="DCOM_PrecioCompra"
                                                    class="form-control rounded-0" placeholder="Precio Compra"
                                                    style="height: 40px; font-family: 'Arial', sans-serif; font-size: 12px; font-weight: 400; color: #555; background-color: #f9f9f9; border: 1px solid #ccc; padding-left: 10px; border-radius: 5px; transition: all 0.3s ease;">
                                            </div>
                                            <div class="col-md-4 d-flex align-items-center">
                                                <div class="d-flex" style="width: 50%;">
                                                    <div class="input-group"
                                                        style="background-color: #b0bec5; height: 40px;width:95px;">
                                                        <span class="form-control"
                                                            style="background: none; border: none; color: #333; font-size: 12px; ">
                                                            Precio de venta
                                                        </span>
                                                    </div>
                                                </div>
                                                <input type="number" id="DCOM_PrecioVenta" name="DCOM_PrecioVenta"
                                                    class="form-control rounded-0" placeholder="Precio Venta"
                                                    style="height: 40px; font-family: 'Arial', sans-serif; font-size: 12px; font-weight: 400; color: #555; background-color: #f9f9f9; border: 1px solid #ccc; padding-left: 10px; border-radius: 5px; transition: all 0.3s ease;">
                                            </div>
                                            <div class="col-md-4 d-flex align-items-center">
                                                <div class="d-flex" style="width: 50%;">
                                                    <div class="input-group"
                                                        style="border: 1px solid #ccc; background-color: #b0bec5;  height: 40 px;width:95px; ">
                                                        <span class="form-control"
                                                            style="background: none; border: none; color: #333; font-size: 12px;">
                                                            Cantidad
                                                        </span>
                                                    </div>
                                                </div>
                                                <input type="number" id="DCOM_Cantidad" name="DCOM_Cantidad"
                                                    class="form-control rounded-0" placeholder="Cantidad"
                                                    style="height: 40px; font-family: 'Arial', sans-serif; font-size: 12px; font-weight: 400; color: #555; background-color: #f9f9f9; border: 1px solid #ccc; padding-left: 10px; border-radius: 5px; transition: all 0.3s ease;">
                                            </div>
                                        </div>



                                        <p></p>
                                        <button id="saveBtn" class="btn btn-primary"><i class="fas fa-save"></i>Generar
                                            Compra</button>
                                        <button id="updateBtn" class="btn btn-info" style="display: none;"><i
                                                class="fas fa-save"></i>Actualizar</button>
                                        <button type="reset" id="btncancelar" class="btn btn-danger"> <i
                                                class="fas fa-ban"></i>Vaciar Compra </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="modal fade " id="myModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Crear Proveedor</h5>
                    </div>
                    <div class="modal-body">
        
                        <form method="POST" id="proveedor_form" action="{{ route('proveedor.store') }}">
                            <div class="modal-body panel-body" style="max-height: calc(90vh - 90px);">
                                <div class="form-group col-lg-12  col-md-12 col-sm-12 col-xs-12 input-group-sm">
                                    <label>TIPO DOCUMENTO</label>
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                TIPO DOCUMENTO
                                            </span>
                                        </div>
                                        <select class="form-control" onChange="Limitar()" id="idPROV_TipoDocumento"
                                            name="PROV_TipoDocumento"
                                            style=" border-bottom-right-radius:10px; border-top-right-radius: 10px;">
                                            <option value="DNI">
                                                DNI
                                            </option>
                                            <option value="RUC">
                                                RUC
                                            </option>
                                            <option value="CE">
                                                Carnet Extrangeria
                                            </option>
                                        </select>
                                    </div>
                                </div>
        
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Nº Doc
                                            </span>
                                        </div>
                                        <input class="form-control input-sm" maxlength="8" id="idPROV_NumDocumento"
                                            name="PROV_NumDocumento" required placeholder="Ingresa Numero de Documento"
                                            type="text">
                                        <span class="input-group-append btn btn-primary btn-sm" id="Buscar_Proveedor"
                                            style="display: block; border-bottom-right-radius:10px; border-top-right-radius: 10px;"
                                            onclick="buscarProveedor()"><i class="fas fa-search"></i></span>
                                        <span class="input-group-append btn btn-primary btn-sm hide" id="cargando"
                                            style="display: none; border-bottom-right-radius:10px; border-top-right-radius: 10px;"><img
                                                width="15px" src="{{ asset('images/gif/cargando1.gif') }}"></span>
                                    </div>
                                </div>
        
                                <div class="form-group col-md-12 input-group-sm">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Razon social
                                            </span>
                                        </div>
                                        <input class="form-control input-sm" id="idPROV_RazonSocial" name="PROV_RazonSocial"
                                            onkeyup="this.value=this.value.toUpperCase();" required placeholder="Ingresa Nombre / Razon Social"
                                            style=" border-bottom-right-radius:10px; border-top-right-radius: 10px;"
                                            type="text">
                                    </div>
                                </div>
                                <div class="form-group col-md-12 input-group-sm">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Dirección
                                            </span>
                                        </div>
                                        <input class="form-control input-sm" id="idPROV_Direccion" name="PROV_Direccion"
                                            onkeyup="this.value=this.value.toUpperCase();" placeholder="ingresa dirección"
                                            style=" border-bottom-right-radius:10px; border-top-right-radius: 10px;"
                                            type="text">
                                    </div>
                                </div>
                                <div class="form-group col-md-12 input-group-sm">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Descripción
                                            </span>
                                        </div>
                                        <input class="form-control input-sm" id="idPROV_Descripcion" name="PROV_Descripcion"
                                            onkeyup="this.value=this.value.toUpperCase();" placeholder="ingresa descripción"
                                            style=" border-bottom-right-radius:10px; border-top-right-radius: 10px;"
                                            type="text">
                                    </div>
                                </div>
                                <div class="form-group col-md-12 input-group-sm">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Celular
                                            </span>
                                        </div>
                                        <input class="form-control input-sm" id="idPROV_Celular" name="PROV_Celular"
                                            onkeyup="this.value=this.value.toUpperCase();" placeholder="ingresa celular"
                                            style=" border-bottom-right-radius:10px; border-top-right-radius: 10px;"
                                            type="number">
                                    </div>
                                </div>
                                <div class="form-group col-md-12 input-group-sm">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Correo
                                            </span>
                                        </div>
                                        <input class="form-control input-sm" id="idPROV_Correo" name="PROV_Correo"
                                            onkeyup="this.value=this.value.toUpperCase();" placeholder="ingresa descripción"
                                            style=" border-bottom-right-radius:10px; border-top-right-radius: 10px;"
                                            type="email">
                                    </div>
                                </div>
        
                            </div>
                        </form>
        
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="SaveProveedor" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </div>

        <head>
            <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
            <link href="{{ asset('plugins/select2/css/select2.min.css') }}" rel="stylesheet">
            <link href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}" rel="stylesheet">
            <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
        </head>


    @endsection
    @section('script')
        <script>
            var myModal
            $(document).ready(function() {

                $('.select2').select2()
                $('.select2bs4').select2({
                    theme: 'bootstrap4'
                })
                myModal = new bootstrap.Modal(document.getElementById('myModal'), {
                    keyboard: false
                })

            })

            function NuevoProveedor(){            
                myModal.show()
            }

            function mostrarformulario() {
                // Muestra el formulario debajo de la fila de proveedor
                var formulario = document.getElementById('formProveedorRow');
                formulario.style.display = 'block'; // Muestra el formulario
            }

            function cerrarFormulario() {
                // Oculta el formulario cuando el usuario hace clic en "Cerrar"
                var formulario = document.getElementById('formProveedorRow');
                formulario.style.display = 'none'; // Oculta el formulario
            }



            function limitar() {
                var cod = document.getElementById("ProvTDoc").value;

                if (cod == 'DNI') {
                    $("#ProvNDoc").val("");
                    $("#ProvNDoc").attr('maxlength', '8');
                } else if (cod == 'RUC') { // Cambié 'else' por 'else if'
                    $("#ProvNDoc").val("");
                    $("#ProvNDoc").attr('maxlength', '11');
                }
            }


            function BuscarCliente() {
                if ($('#ProvTDoc').val() == 'DNI') {
                    var cod = document.getElementById("ProvTDoc").value;
                    $numero = $("#ProvNDoc").val();
                    if ($numero.length < 8) {
                        Swal
                            .fire({
                                title: "Falta Números en el DNI",
                                icon: 'error',
                                confirmButtonColor: "#26BA9A",
                                confirmButtonText: "Ok"
                            })
                            .then(resultado => {
                                if (resultado.value) {
                                    $("#ProvNDoc").val("");
                                } else {}
                            });
                    } else {
                        $('#Buscar_Cliente').addClass('hide');

                        var numdni = $('#ProvNDoc').val();
                        var url = 'https://www.buqkly.com/api/consultadni/' + numdni + '?';
                        $.ajax({
                            type: 'GET',
                            url: url,
                            //data: { "_token": "{{ csrf_token() }}"},
                            // headers: {  'Access-Control-Allow-Origin': 'https://www.buqkly.com' },
                            success: function(dat) {

                                if (dat.success[1] == false) {
                                    $('#Buscar_Cliente').removeClass('hide');

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
                                                $("#ProvNDoc").val("");
                                            } else {}
                                        });
                                } else {
                                    $('#ProvRSocial').val(dat.success[0]);
                                    $('#Buscar_Cliente').removeClass('hide');
                                }
                            }
                        });
                    }
                } else {
                    var cod = document.getElementById("ProvTDoc").value;
                    $numero = $("#ProvNDoc").val();
                    if ($numero.length < 11) {
                        Swal
                            .fire({
                                title: "Falta Números en el RUC",
                                icon: 'error',
                                confirmButtonColor: "#26BA9A",
                                confirmButtonText: "Ok"
                            })
                            .then(resultado => {
                                if (resultado.value) {
                                    $("#ProvNDoc").val("");
                                } else {

                                }
                            });
                    } else {
                        $('#Buscar_Cliente').addClass('hide');
                        var numdni = $('#ProvNDoc').val();
                        var url = 'https://www.buqkly.com/api/consultaruc/' + numdni + '?';
                        $.ajax({
                            type: 'GET',
                            url: url,
                            //data: { "_token": "{{ csrf_token() }}"},
                            // headers: {  'Access-Control-Allow-Origin': 'https://www.buqkly.com' },
                            success: function(dat) {
                                //console.log(dat);
                                if (dat.success[1] == null) {
                                    $('#Buscar_Cliente').removeClass('hide');
                                    Swal
                                        .fire({
                                            title: "Ruc Inválido",
                                            icon: 'error',
                                            confirmButtonColor: "#26BA9A",
                                            width: '350px',
                                            heigth: '100px',
                                            confirmButtonText: "Ok"
                                        })
                                        .then(resultado => {
                                            if (resultado.value) {
                                                $("#ProvNDoc").val("");
                                            } else {}
                                        });
                                } else {
                                    $('#ProvRSocial').val(dat.success[1]);
                                    $('#ProvDir').val(dat.success[2]);
                                    $('#Buscar_Cliente').removeClass('hide');
                                }
                            }
                        });
                    }
                }
            }
        </script>
    @endsection
