@extends('layout.plantilla1')

@section('titulo', 'Registro Compra')

@section('contenido')

    <head>
        <link href="{{ asset('css/styleCompra.css') }}" rel="stylesheet">
    </head>
    <div class="container">
        <form method="POST" id="compra_form" action="{{ route('compra.store') }}">
            @csrf
            <div class="row">
                <div class="col-5">
                    <div class="card">
                        <div class="card-body">
                            
                            <p class="card-text"></p>
                            {{-- <input type="text" id="proveedor_id_edit" hidden> --}}
                            <div class="form-group row ">
                                <h5 class="card-title text-center" style="background-color: #28a745; color: white; padding: 10px;">
                                    Datos generales de la compra
                                </h5>
                                <p></p>
                                <div class="col-md-6 pr-0">
                                    <div class="input-group input-group-select">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-file-alt" style="font-size: 16px; color: #6c757d;"></i>
                                            </span>
                                        </div>
                                        <select id="COM_TipoDocumento" name="COM_TipoDocumento" style="font-size: 14px;"
                                            class="form-control  " required>
                                            <option value="" disabled selected >Seleccione Tipo Documento </option>
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
                                        style="font-size: 14px; background-color:#bdc5cc;  " name="COM_NumDocumento"
                                        placeholder="Número de documento" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <!-- Texto Tipo de Pago -->
                                <div class="col-md-6 pl-0 pr-0">
                                    <div class="input-group">
                                        <span class="input-group-text rounded-0" style="font-size: 14px; background-color:#bdc5cc; width: 100%; text-align: left; padding-left: 10px; display: flex; align-items: center;">
                                            Tipo pago
                                        </span>
                                    </div>
                                </div>
                            
                                <!-- Select Tipo de Pago con icono -->
                                <div class="col-md-6 pl-0 pr-0">
                                    <div class="input-group">
                                        <select id="COM_TipoPago" name="COM_TipoPago" class="form-control rounded-0" style="font-size: 14px; text-align: left; padding-left: 10px; height: 100%;" required>
                                            <option value="Contado">Contado</option>
                                            <option value="Credito">Crédito</option>
                                        </select>
                                        <div class="input-group-append">
                                            <span class="input-group-text" style="background-color: transparent; border: none;position: absolute; right: 10px; top: 50%; transform: translateY(-50%);">
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
                                        <span class="input-group-text rounded-0" style="font-size: 14px; background-color:#bdc5cc; width: 100%; text-align: left; padding-left: 10px; display: flex; align-items: center;">
                                            Método de pago
                                        </span>
                                    </div>
                                </div>
                            
                                <!-- Select Método de Pago con icono -->
                                <div class="col-md-6 pl-0 pr-0">
                                    <div class="input-group">
                                        <select class="form-control select2 select2-info rounded-0" id="MEP_Id" name="MEP_Id"
                                            data-dropdown-css-class="select2-info" style="font-size: 14px; text-align: left; padding-left: 10px; height: 100%;" required>
                                         
                                            @foreach ($metodo_pago as $itemMetodoP)
                                                <option value="{{ $itemMetodoP->MEP_Id }}"> {{ $itemMetodoP->MEP_Pago }} </option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append">
                                            <span class="input-group-text" style="background-color: transparent; border: none; position: absolute; right: 10px; top: 50%; transform: translateY(-50%);">
                                                <i class="fa fa-chevron-down" style="font-size: 16px;"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label class="control-label"
                                        style=" text-align: left; display: block;">Proveedor:</label>
                                    <input type="text" id="PROV_Id" name="PROV_Id" class="form-control "
                                        placeholder="Proveedor">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-7">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Información del producto</h5>
                            <p class="card-text"></p>

                            {{-- <input type="text" id="proveedor_id_edit" hidden> --}}
                            <div class="form-group row">
                                <div class="col-12">
                                    <label class="control-label"
                                        style=" text-align: left; display: block;">Producto:</label>
                                    <select class="form-control select2 select2-info" id="PRO_Id" name="PRO_Id"
                                        data-dropdown-css-class="select2-info" style="width: 100%;">
                                        <option value="">Seleccione Producto</option>
                                        @foreach ($producto as $itemProducto)
                                            <option value="{{ $itemProducto->PRO_Id }}">
                                                {{ $itemProducto->PRO_Nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label class="control-label" style=" text-align: left; display: block;">Almacen:</label>
                                    <select class="form-control select2 select2-info" id="PRO_Id" name="PRO_Id"
                                        data-dropdown-css-class="select2-info" style="width: 100%;">
                                        <option value="">Seleccione Almacen</option>
                                        @foreach ($almacen as $itemAlmacen)
                                            <option value="{{ $itemAlmacen->ALM_Id }}">
                                                {{ $itemAlmacen->ALM_Nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label class="control-label" style=" text-align: left; display: block;">Código
                                        de compra:</label>
                                    <input type="number" class="form-control sm" id="COM_Id" name="COM_Id"
                                        placeholder="Ingrese Nº Compra" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label class="control-label" style=" text-align: left; display: block;">Precio
                                        de compra:</label>
                                    <input type="text" id="DCOM_PrecioCompra" name="DCOM_PrecioCompra"
                                        class="form-control " placeholder="Precio de compra">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label class="control-label" style=" text-align: left; display: block;">Precio
                                        de venta:</label>
                                    <input type="text" id="DCOM_PrecioVenta" name="DCOM_PrecioVenta"
                                        class="form-control " placeholder="Precio de venta">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label class="control-label"
                                        style=" text-align: left; display: block;">Cantidad:</label>
                                    <input type="text" id="DCOM_Cantidad" name="DCOM_Cantidad" class="form-control "
                                        placeholder="Cantidad">
                                </div>
                            </div>
                            <p></p>
                            <button id="saveBtn" class="btn btn-primary"><i class="fas fa-save"></i>Guardar</button>
                            <button id="updateBtn" class="btn btn-info" style="display: none;"><i
                                    class="fas fa-save"></i>Actualizar</button>
                            <button type="reset" id="btncancelar" class="btn btn-danger"> <i
                                    class="fas fa-ban"></i>Cancelar </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
