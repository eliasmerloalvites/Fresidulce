@extends('layout.plantilla1')

@section('titulo', 'Registro Compra')

@section('contenido')

    <head>
        <link href="{{ asset('css/styleCompra.css') }}" rel="stylesheet">
    </head>
    <div class="">
        <div class="">
            <div class="card-body">
                <div style="">
                    <form method="POST" id="compra_form" action="{{ route('compra.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-5">
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
                                                        style="font-size: 12px;" class="form-control  " required>
                                                        <option value="" disabled selected>Seleccione tipo de
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
                                                    style="font-size: 12px; background-color:#bdc5cc;  "
                                                    name="COM_NumDocumento" placeholder="Número de documento" required>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0">
                                            <!-- Texto Tipo de Pago -->
                                            <div class="col-md-6 pl-0 pr-0">
                                                <div class="input-group">
                                                    <span class="input-group-text rounded-0"
                                                        style="font-size: 12px; background-color:#bdc5cc; width: 100%; text-align: left; padding-left: 10px; display: flex; align-items: center;">
                                                        Tipo pago
                                                    </span>
                                                </div>
                                            </div>

                                            <!-- Select Tipo de Pago con icono -->
                                            <div class="col-md-6 pl-0 pr-0">
                                                <div class="input-group">
                                                    <select id="COM_TipoPago" name="COM_TipoPago"
                                                        class="form-control rounded-0"
                                                        style="font-size: 12px; text-align: left; padding-left: 10px; height: 100%;"
                                                        required>
                                                        <option value="" disabled selected>Seleccione tipo de pago
                                                        </option>
                                                        <option value="Contado">Contado</option>
                                                        <option value="Credito">Crédito</option>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"
                                                            style="background-color: transparent; border: none;position: absolute; right: 10px; top: 50%; transform: translateY(-50%);">
                                                            <i class="fa fa-chevron-down" style="font-size: 16px;"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group row mb-0">
                                            <!-- Texto Método de Pago -->
                                            <div class="col-md-6 pl-0 pr-0">
                                                <div class="input-group">
                                                    <span class="input-group-text rounded-0"
                                                        style="font-size: 12px; background-color:#bdc5cc; width: 100%; text-align: left; padding-left: 10px; display: flex; align-items: center;">
                                                        Método de pago
                                                    </span>
                                                </div>
                                            </div>

                                            <!-- Select Método de Pago con icono -->
                                            <div class="col-md-6 pl-0 pr-0">
                                                <div class="input-group">
                                                    <select class="form-control select2 select2-info rounded-0"
                                                        id="MEP_Id" name="MEP_Id" data-dropdown-css-class="select2-info"
                                                        style="font-size: 12px; text-align: left; padding-left: 10px; height: 100%;"
                                                        required>
                                                        <option value="" disabled selected>Seleccione método de pago
                                                        </option>
                                                        @foreach ($metodo_pago as $itemMetodoP)
                                                            <option value="{{ $itemMetodoP->MEP_Id }}">
                                                                {{ $itemMetodoP->MEP_Pago }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"
                                                            style="background-color: transparent; border: none; position: absolute; right: 10px; top: 50%; transform: translateY(-50%);">
                                                            <i class="fa fa-chevron-down" style="font-size: 16px;"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <p></p>
                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 pl-0 pr-0">
                                                <div class="input-group">
                                                    <!-- Texto y Select -->
                                                    <span class="input-group-text rounded-0"
                                                        style="font-size: 12px; background-color:#bdc5cc; width: 100%; text-align: left; padding-left: 10px; display: flex; align-items: center;">
                                                        Proveedor
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 pl-0 pr-0">
                                                <div class="input-group input-group-select" style="position: relative;">
                                                    <!-- Select de proveedores -->
                                                    <select class="form-control" id="PROV_Id" name="PROV_Id"
                                                        style="font-size: 12px; text-align: left; padding-left: 10px; height: 100%; padding-right: 30px;">
                                                        <option value="" disabled selected>Seleccione proveedor
                                                        </option>
                                                        @foreach ($proveedor as $itemproveedor)
                                                            <option value="{{ $itemproveedor->PROV_Id }}">
                                                                {{ $itemproveedor->PROV_TipoDocumento }} -
                                                                {{ $itemproveedor->PROV_NumDocumento }} -
                                                                {{ $itemproveedor->PROV_RazonSocial }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <!-- Icono de desplegar -->
                                                    <i class="fa fa-chevron-down dropdown-icon"
                                                        style="position: absolute; right: 56px; top: 50%; transform: translateY(-50%); font-size: 16px; pointer-events: none;"></i>
                                                    <!-- Botón para nuevo proveedor -->
                                                    <button title="Nuevo Proveedor" type="button" id="btnNuevoProveedor"
                                                        class="btn btn-success btn-sm" onclick="mostrarformulario()"
                                                        style="border-bottom-right-radius: 10px; border: none;">
                                                        <i class="fa fa-plus"></i> <i class="fa fa-user"></i>
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-body panel-body"
                                            style="max-height: calc(60vh - 90px);padding-bottom: 0px;padding-top: 0px;">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12"
                                                id="idfrmProveedor"
                                                style="border-color: #02D399; margin-bottom: 20px; border-width: 3px; border-style: double; background: #F1F1F1;display: none;">
                                                <div class="row" style="padding-top : 1%">
                                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="input-group input-group-sm">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    Proveedor
                                                                </span>
                                                            </div>
                                                            <select class="form-control" id="PROV_TipoDocumento"
                                                                onChange="limitar()" name="PROV_TipoDocumento"
                                                                style=" border-bottom-right-radius:10px; border-top-right-radius: 10px;">
                                                                <option value="DNI">
                                                                    DNI
                                                                </option>
                                                                <option value="RUC">
                                                                    RUC
                                                                </option>
                                                                <option value="CE">
                                                                    Carnet Extranjeria
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
                                                            <input class="form-control input-sm" id="PROV_NumDocumento"
                                                                maxlength="8" name="PROV_NumDocumento"
                                                                placeholder="Ingresa Numero de Documento" type="text">
                                                            <span class="input-group-append btn btn-primary btn-sm"
                                                                id="Buscar_Cliente" onclick="BuscarCliente()"
                                                                style=" border-bottom-right-radius:10px; border-top-right-radius: 10px;"
                                                                title="Buscar Cliente" type="button">
                                                                <i class="fa fa-search">
                                                                </i>
                                                            </span>

                                                        </div>
                                                    </div>

                                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="input-group input-group-sm">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    Razon social
                                                                </span>
                                                            </div>
                                                            <input class="form-control input-sm" id="PROV_RazonSocial"
                                                                name="PROV_RazonSocial"
                                                                onkeyup="this.value=this.value.toUpperCase();"
                                                                placeholder="ingresa nombre"
                                                                style=" border-bottom-right-radius:10px; border-top-right-radius: 10px;"
                                                                type="text">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="input-group input-group-sm">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    Direccion
                                                                </span>
                                                            </div>
                                                            <input class="form-control input-sm" id="PROV_Direccion"
                                                                name="PROV_Direccion"
                                                                onkeyup="this.value=this.value.toUpperCase();"
                                                                placeholder="ingresa direccion"
                                                                style=" border-bottom-right-radius:10px; border-top-right-radius: 10px;"
                                                                type="text">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="input-group input-group-sm">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    Descripcion
                                                                </span>
                                                            </div>
                                                            <input class="form-control input-sm" id="PROV_Descripcion"
                                                                name="PROV_Descripcion"
                                                                onkeyup="this.value=this.value.toUpperCase();"
                                                                placeholder="ingresa direccion"
                                                                style=" border-bottom-right-radius:10px; border-top-right-radius: 10px;"
                                                                type="text">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="input-group input-group-sm">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    Telefono
                                                                </span>
                                                            </div>
                                                            <input class="form-control input-sm" id="PROV_Celular" maxlength="9"
                                                                name="PROV_Celular"
                                                                onkeyup="this.value=this.value.toUpperCase();"
                                                                placeholder="ingresa numero"
                                                                style=" border-bottom-right-radius:10px; border-top-right-radius: 10px;"
                                                                type="text">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="input-group input-group-sm">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    Email
                                                                </span>
                                                            </div>
                                                            <input class="form-control input-sm" id="PROV_Correo"
                                                                name="PROV_Correo"
                                                                onkeyup="this.value=this.value.toUpperCase();"
                                                                placeholder="ingrese email"
                                                                style=" border-bottom-right-radius:10px; border-top-right-radius: 10px;"
                                                                type="email">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-7">
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
                                                    <select id="ALM_Id" name="ALM_Id"
                                                        class="form-control rounded-0" required
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
                                                    class="form-control rounded-0"
                                                    placeholder="Precio Compra"
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
                                        <button id="saveBtn" class="btn btn-primary"><i
                                                class="fas fa-save"></i>Generar Compra</button>
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

    @endsection
    @section('script')
        <script>
            $(document).ready(function() {

            })

            $ACTPROV = "NO"

            function mostrarformulario() {
                if ($ACTPROV == "NO") {
                    $("#idfrmProveedor").show();
                    $ACTPROV = "SI"
                } else {
                    $("#idfrmProveedor").hide();
                    $ACTPROV = "NO"
                }
            }

            function limitar() {

                var cod = document.getElementById("ProvTDoc").value;

                if (cod == 'DNI') {
                    $("#ProvNDoc").val("");
                    $("#ProvNDoc").attr('maxlength', '8');
                } else(cod == 'RUC') {
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
