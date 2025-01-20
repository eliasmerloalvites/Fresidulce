@extends ('home')
@section('contenido')
    <style type="text/css">
        body {
            width: 100%;
            height: 100%;
            background-size: cover;
            background-attachment: fixed;
        }

        .subir {
            padding: 5px 10px 5px;
            width: 100%;
            border-bottom-left-radius: 11px;
            border-top-left-radius: 11px;
            text-align: center;
            background: #36CB78;
            color: #fff;
            border: 0px solid #fff;
        }

        .subir:hover {
            color: #fff;
            background: rgb(0, 122, 156);
        }

        .btn1 {
            font-size: 11px;
            color: #ffffff;
            background: #77BC1F;
            border-bottom-right-radius: 10px;
            border-top-right-radius: 10px;
            line-height: 15px;
            text-align: center;
            width: 100px;
            height: 50px;
            font-weight: bold;
        }

        .btn1:hover {
            color: #77BC1F;
            background-color: #ffffff
        }

        .btn2 {
            font-size: 11px;
            color: #ffffff;
            background: #ED6A00;
            border-bottom-right-radius: 10px;
            border-top-right-radius: 10px;
            line-height: 15px;
            text-align: center;
            width: 100px;
            height: 50px;
            font-weight: bold;
        }

        .btn2:hover {
            color: #ED6A00;
            background-color: #ffffff
        }

        .btn3 {
            font-size: 11px;
            color: #ffffff;
            background: #FF0000;
            border-bottom-right-radius: 10px;
            border-top-right-radius: 10px;
            line-height: 15px;
            text-align: center;
            width: 100px;
            height: 50px;
            font-weight: bold;
        }

        .btn3:hover {
            color: #FF0000;
            background-color: #ffffff
        }

        .btn4 {
            font-size: 11px;
            color: #ffffff;
            background: #EF295A;
            border-bottom-right-radius: 10px;
            border-top-right-radius: 10px;
            line-height: 15px;
            text-align: center;
            width: 100px;
            height: 50px;
            font-weight: bold;
        }

        .btn4:hover {
            color: #EF295A;
            background-color: #ffffff
        }

        .btn5 {
            font-size: 11px;
            color: #ffffff;
            background: #F8F801;
            border-bottom-right-radius: 10px;
            border-top-right-radius: 10px;
            line-height: 15px;
            text-align: center;
            width: 100px;
            height: 50px;
            font-weight: bold;
        }

        .btn5:hover {
            color: #F8F801;
            background-color: #ffffff
        }

        .btn6 {
            font-size: 11px;
            color: #ffffff;
            background: #22F819;
            border-bottom-right-radius: 10px;
            border-top-right-radius: 10px;
            line-height: 15px;
            text-align: center;
            width: 100px;
            height: 50px;
            font-weight: bold;
        }

        .btn6:hover {
            color: #22F819;
            background-color: #ffffff
        }

        .btn7 {
            font-size: 11px;
            color: #ffffff;
            background: #379CC7;
            border-bottom-right-radius: 10px;
            border-top-right-radius: 10px;
            line-height: 15px;
            text-align: center;
            width: 100px;
            height: 50px;
            font-weight: bold;
        }

        .btn7:hover {
            color: #379CC7;
            background-color: #ffffff
        }

        .btn8 {
            font-size: 11px;
            color: #ffffff;
            background: #01EEE5;
            border-bottom-right-radius: 10px;
            border-top-right-radius: 10px;
            line-height: 15px;
            text-align: center;
            width: 100px;
            height: 50px;
            font-weight: bold;
        }

        .btn8:hover {
            color: #01EEE5;
            background-color: #ffffff
        }

        .btn9 {
            font-size: 11px;
            color: #ffffff;
            background: #EE33B5;
            border-bottom-right-radius: 10px;
            border-top-right-radius: 10px;
            line-height: 15px;
            text-align: center;
            width: 100px;
            height: 50px;
            font-weight: bold;
        }

        .btn9:hover {
            color: #EE33B5;
            background-color: #ffffff
        }

        .btn10 {
            font-size: 11px;
            color: #ffffff;
            background: #F4D22B;
            border-bottom-right-radius: 10px;
            border-top-right-radius: 10px;
            line-height: 15px;
            text-align: center;
            width: 100px;
            height: 50px;
        }

        .btn10:hover {
            color: #F4D22B;
            background-color: #ffffff
        }

        .btnGenerar {
            font-size: 16px;
            font-weight: bold;
            padding: 10px;
            margin-top: 5px;
            /* Asegura el centrado horizontal del botón */
            color: #ffffff;
            background: #96BC1F;
            line-height: 20px;
            text-align: center;
            width: 100%;
            /* Mantiene el ancho fijo */
            height: 60px;
            /* Mantiene la altura fija */
            display: flex;
            /* Necesario para organizar el contenido interno */
            align-items: center;
            /* Centra verticalmente el contenido interno */
            justify-content: center;
            /* Centra horizontalmente el contenido interno */
            border: none;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .btnGenerar:hover {
            color: #ffffff;
            background-color: #809b2e
                /* color: #96BC1F;
                background-color: #ffffff */
        }

        .btnCliente {
            font-size: 14px;
            padding: 10px;
            margin-top: 5px;
            /* Asegura el centrado horizontal del botón */
            color: #050505;
            background: #f5f4f4;
            line-height: 20px;
            text-align: center;
            width: 100%;
            /* Mantiene el ancho fijo */
            height: 60px;
            /* Mantiene la altura fija */
            display: flex;
            /* Necesario para organizar el contenido interno */
            align-items: center;
            /* Centra verticalmente el contenido interno */
            justify-content: center;
            /* Centra horizontalmente el contenido interno */
            border: 1px solid rgb(129, 127, 127);
            border-radius: 5px;
            box-sizing: border-box;
        }

        .btnCliente:hover {
            color: #ffffff;
            background-color: #809b2e
                /* color: #96BC1F;
                background-color: #ffffff */
        }

        .btntipo1 {
            font-size: 13px;
            padding: 0;
            margin: 0 auto;
            /* Asegura el centrado horizontal del botón */
            color: #ffffff;
            background: #96BC1F;
            line-height: 14px;
            text-align: center;
            width: 220px;
            /* Mantiene el ancho fijo */
            height: 100px;
            /* Mantiene la altura fija */
            display: flex;
            /* Necesario para organizar el contenido interno */
            align-items: center;
            /* Centra verticalmente el contenido interno */
            justify-content: center;
            /* Centra horizontalmente el contenido interno */
            border: none;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .btntipo1:hover {
            color: #96BC1F;
            background-color: #ffffff
        }

        .btntipo2 {
            font-size: 10px;
            color: #ffffff;
            background: #ED9200;
            line-height: 11px;
            text-align: center;
            width: 150px;
            height: 50px;
        }

        .btntipo2:hover {
            color: #ED9200;
            background-color: #ffffff
        }

        .btntipo3 {
            font-size: 13px;
            color: #ffffff;
            background: #8F8F8F;
            line-height: 14px;
            text-align: center;
            width: 150px;
            height: 50px;
        }

        .btntipo3:hover {
            color: #8F8F8F;
            background-color: #ffffff
        }

        .btntipo4 {
            font-size: 10px;
            color: #ffffff;
            background: #EF295A;
            line-height: 11px;
            text-align: center;
            width: 150px;
            height: 50px;
        }

        .btntipo4:hover {
            color: #EF295A;
            background-color: #ffffff
        }

        .btntipo5 {
            font-size: 10px;
            color: #ffffff;
            background: #F8F801;
            line-height: 11px;
            text-align: center;
            width: 150px;
            height: 50px;
        }

        .btntipo5:hover {
            color: #F8F801;
            background-color: #ffffff
        }

        .btntipo6 {
            font-size: 10px;
            color: #ffffff;
            background: #22F819;
            line-height: 11px;
            text-align: center;
            width: 150px;
            height: 50px;
        }

        .btntipo6:hover {
            color: #22F819;
            background-color: #ffffff
        }

        .btntipo7 {
            font-size: 10px;
            color: #ffffff;
            background: #379CC7;
            line-height: 11px;
            text-align: center;
            width: 150px;
            height: 50px;
        }

        .btntipo7:hover {
            color: #379CC7;
            background-color: #ffffff
        }

        .btntipo8 {
            font-size: 10px;
            color: #ffffff;
            background: #01EEE5;
            line-height: 11px;
            text-align: center;
            width: 150px;
            height: 50px;
        }

        .btntipo8:hover {
            color: #01EEE5;
            background-color: #ffffff
        }

        .btntipo9 {
            font-size: 10px;
            color: #ffffff;
            background: #EE33B5;
            line-height: 11px;
            text-align: center;
            width: 150px;
            height: 50px;
        }

        .btntipo9:hover {
            color: #EE33B5;
            background-color: #ffffff
        }

        .btntipo10 {
            font-size: 10px;
            color: #ffffff;
            background: #F4D22B;
            line-height: 11px;
            text-align: center;
            width: 150px;
            height: 50px;
        }

        .btntipo10:hover {
            color: #F4D22B;
            background-color: #ffffff
        }

        /* Sombreado al pasar el mouse */
        #detallesVenta tr:hover {
            background-color: #f2f2f2;
            /* Color claro para el hover */
            cursor: pointer;
        }

        /* Estilo para la fila seleccionada */
        #detallesVenta tr.selected {
            background-color: #d9d9d9;
            /* Color más oscuro para la selección */
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .btn-select {
            background-color: #f0f0f0;
            margin-top: 5px;
            color: #333;
            width: 100%;
            padding: 5px 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 1000;
        }

        .dropdown-menu div {
            padding: 10px;
            cursor: pointer;
        }

        .dropdown-menu div:hover {
            background-color: #f0f0f0;
        }

        /* Mostrar menú al activar */
        .dropdown.open .dropdown-menu {
            display: block;
        }
    </style>
    <div class="contenedor-general">
        <div class="row panel-group">

            <div class="col-lg-5  col-md-12 col-sm-12 col-xs-12 ">

                {!! Form::open(['route' => 'gestion.venta.store', 'id' => 'venta_form']) !!}
                {{ Form::token() }}

                <input class="form-control" hidden id="VentaTipo" name="VentaTipo" value="LIBRE" />
                <input class="form-control" hidden name="USU_Id" value="{{ Auth::user()->id }}" />
                <div class="col-lg-12  col-md-12 col-sm-12 col-xs-12 " controls id="contenedor1">

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 1px">
                        <div class="table-responsive" style="height: calc(60vh - 90px);  overflow-y:scroll;">
                            <table id="detallesVenta" class=" table-sm table-condensed " style="width: 100%" >
                                <thead style="background: #f58489; color:white">
                                    <th style="text-align: left;  width: 80%;">Detalle</th>
                                    <th style="text-align: right;  width: 20%;">Importe</th>
                                </thead>
                            </table>
                        </div>
                        <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background-color: #DDD;">

                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8" style="text-align: center;font-weight: bold;">
                                TOTAL</div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="text-align: right;"><label
                                    id="total" name="total">S/ 0.00</label><input name="total_venta" hidden
                                    id="total_venta"></div>
                            <!--<th hidden="true"><input hidden name="totalVenta" id="totalVenta"></th>-->
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10px">
                            <div class="input-group">
                                <span type="button" id="btnPago" class="btn btn-primary btn-sm " hidden
                                    onclick="PagoCalculadora()"
                                    style="border-bottom-left-radius:10px; border-top-left-radius: 10px; border-bottom-right-radius:10px; border-top-right-radius: 10px;"><i
                                        class="fa fa-plus"></i></span>
                                <span class="form-control"
                                    style="background: #EDEDED; border-bottom-left-radius:10px; border-top-left-radius: 10px;">PAGO</span>
                                <input onclick="PagoCalculadora()" type="text" class="form-control input-sm"
                                    readonly="true" value="0" name="VEN_Pagado" id="idPagado">
                                <span class="form-control" style="background: #EDEDED; ">VUELTO</span>
                                <input type="text" class="form-control input-sm" readonly="true" value="0"
                                    name="VEN_Vuelto" id="idVuelto"
                                    style="border-bottom-right-radius:10px; border-top-right-radius: 10px;">

                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">

                        <div class="col-lg-5  col-md-5 col-sm-12 col-xs-12 ">
                            <div class="table-responsive col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <table id="detallesInformacion"
                                    class="table table-sm table-bordered table-condensed table-hover" hidden>
                                    <thead style="background: #dddddd;">
                                        <th style="text-align: left; font-size: 12px; width: 80%;font-weight: bold;">
                                            <label>PRODUCTO</label>
                                        </th>
                                        <th style="text-align: left; font-size: 12px; width: 20%;font-weight: bold;">
                                            <label>STOCK</label>
                                        </th>
                                    </thead>

                                </table>

                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="input-group" hidden>
                                    <span class="form-control"
                                        style="background: #EDEDED; border-bottom-left-radius:10px; border-top-left-radius: 10px;">TIPO
                                        PAGO</span>
                                    <select class="form-control " id="VEN_TipoPago" name="VEN_TipoPago">
                                        <option value="1" selected>CONTADO</option>
                                        <!--<option value="2">CREDITO</option>-->
                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10px">
                                <div class="dropdown" style="width: 100%">
                                    <input type="hidden" id="hiddenSelectedIdMetodoPago" name="selectedIdMetodoPago"
                                        value="1">
                                    <button type="button" class="btn-select"><b>Metodo Pago: </b><span id="selectedOption">
                                            EFECTIVO</span></button>
                                    <div class="dropdown-menu">
                                        @foreach ($metodo_pago as $mep)
                                            <div class="dropdown-item" data-id="{{ $mep->MEP_Id }}">{{ $mep->MEP_Pago }}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="dropdown" style="width: 100%" hidden>
                                    <input type="hidden" id="hiddenSelectedIdTipoComprobante"
                                        name="selectedIdTipoComprobante" value="NOTA VENTA">
                                    <button type="button" class="btn-select"><b>Comprobante: </b><span
                                            id="selectedOption">NOTA VENTA</span></button>
                                    <div class="dropdown-menu">
                                        <div class="dropdown-item" data-id="NOTA VENTA">NOTA VENTA</div>
                                        <div class="dropdown-item" data-id="BOLETA">BOLETA</div>
                                        <div class="dropdown-item" data-id="FACTURA">FACTURA</div>
                                    </div>
                                </div>
                                <input type="hidden" id="hiddenSelectedIdCliente" name="selectedIdCliente"
                                    value="1">
                                <button type="button" class="btn-select" onclick="showCliente()"><b>Cliente: </b><span
                                        id="selectedCliente"> SIN NOMBRE </span></button>
                                <button type="button" target="_blank" class="btnGenerar" onclick="aceptar();">GENERAR
                                    PAGO</button>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10px">
                                <input hidden name="_token" value="{{ csrf_token() }}">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" hidden>
                                    <button title="Vaciar Carrito" onclick="vaciar()" target="_blank" type="button"
                                        class="btn btn-danger" style="border-radius: 10px;">VACIAR </button>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-7  col-md-7 col-sm-12 col-xs-12 ">

                            <div class="table" style="height: calc(30vh - 10px)">
                                <table id="detallesCalculadora"
                                    class="table table-sm table-bordered table-condensed table-hover ; padding:0px;margin:0px">
                                    <thead hidden style="background: #ade9ff;">
                                    </thead>

                                    <tr style="padding:0px;margin:0px">
                                        <td
                                            style=" text-align: center; padding:0px;margin:0px; font-size: 30px; width: 15%;  font-weight: bold;  ">
                                            <button class="btn-calculadora"
                                                style="width: 100%; padding:0px;margin:0px; height:50px;" title="1"
                                                type="button" id="idn1" onclick="Editar('1')">1</button>
                                        </td>
                                        <td
                                            style=" text-align: center; padding:0px;margin:0px;  font-size: 30px; width: 15%;  font-weight: bold; ">
                                            <button class="btn-calculadora"
                                                style="width: 100%; padding:0px;margin:0px; height:50px; " title="2"
                                                type="button" id="idn2" onclick="Editar('2')">2</button>
                                        </td>
                                        <td
                                            style=" text-align: center; padding:0px;margin:0px;  font-size: 30px; width: 15%;  font-weight: bold; ">
                                            <button class="btn-calculadora"
                                                style="width: 100%; padding:0px;margin:0px; height:50px; " title="3"
                                                type="button" id="idn3" onclick="Editar('3')">3</button>
                                        </td>
                                        <td
                                            style=" text-align: center; padding:0px;margin:0px;  font-size: 30px; width: 15%;  font-weight: bold; ">
                                            <button class="btn-calculadora"
                                                style="width: 100%; padding:0px;margin:0px; height:50px; "
                                                title="Cantidad" type="button" id="idn4"
                                                onclick="Metodo('CANTIDAD')">Cant</button>
                                        </td>


                                    </tr>
                                    <tr>
                                        <td
                                            style=" text-align: center;padding:0px;margin:0px;  font-size: 30px; width: 15%;  font-weight: bold; ">
                                            <button class="btn-calculadora" style="width: 100%; height:50px; "
                                                title="4" type="button" id="idn5"
                                                onclick="Editar('4')">4</button>
                                        </td>
                                        <td
                                            style=" text-align: center;padding:0px;margin:0px;  font-size: 30px; width: 15%;  font-weight: bold; ">
                                            <button class="btn-calculadora" style="width: 100%; height:50px; "
                                                title="5" type="button" id="idn6"
                                                onclick="Editar('5')">5</button>
                                        </td>
                                        <td
                                            style=" text-align: center;padding:0px;margin:0px;  font-size: 30px; width: 15%;  font-weight: bold; ">
                                            <button class="btn-calculadora" style="width: 100%; height:50px; "
                                                title="6" type="button" id="idn7"
                                                onclick="Editar('6')">6</button>
                                        </td>
                                        <td
                                            style=" text-align: center;padding:0px;margin:0px;  font-size: 30px; width: 15%;  font-weight: bold; ">
                                            <button class="btn-calculadora" style="width: 100%; height:50px; "
                                                title="Descuento" type="button" id="idn8"
                                                onclick="Metodo('DESCUENTO')">Desc.</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td
                                            style=" text-align: center;padding:0px;margin:0px;  font-size: 30px; width: 15%;  font-weight: bold; ">
                                            <button class="btn-calculadora" style="width: 100%; height:50px; "
                                                title="7" type="button" id="idn9"
                                                onclick="Editar('7')">7</button>
                                        </td>
                                        <td
                                            style=" text-align: center;padding:0px;margin:0px;  font-size: 30px; width: 15%;  font-weight: bold; ">
                                            <button class="btn-calculadora" style="width: 100%; height:50px; "
                                                title="8" type="button" id="idn10"
                                                onclick="Editar('8')">8</button>
                                        </td>
                                        <td
                                            style=" text-align: center;padding:0px;margin:0px;  font-size: 30px; width: 15%;  font-weight: bold; ">
                                            <button class="btn-calculadora" style="width: 100%; height:50px; "
                                                title="9" type="button" id="idn11"
                                                onclick="Editar('9')">9</button>
                                        </td>
                                        <td
                                            style=" text-align: center;padding:0px;margin:0px;  font-size: 30px; width: 15%;  font-weight: bold; ">
                                            <button class="btn-calculadora" style="width: 100%; height:50px; "
                                                title="Precio Venta" type="button" onclick="Metodo('PRECIO')"
                                                id="idn12">Prec.</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td
                                            style=" text-align: center;padding:0px;margin:0px;  font-size: 30px; width: 15%;  font-weight: bold; ">
                                            <button class="btn-calculadora" style="width: 100%; height:50px; "
                                                title="Eliminar Producto" type="button" id="idn13"
                                                onclick="eliminar()"><i class="fa fa-trash"
                                                    style="color: #FF0000"></i></button>
                                        </td>
                                        <td
                                            style=" text-align: center;padding:0px;margin:0px;  font-size: 30px; width: 15%;  font-weight: bold; ">
                                            <button class="btn-calculadora" style="width: 100%; height:50px; "
                                                title="0" type="button" id="idn14"
                                                onclick="Editar('0')">0</button>
                                        </td>
                                        <td
                                            style=" text-align: center;padding:0px;margin:0px;  font-size: 30px; width: 15%;  font-weight: bold; ">
                                            <button class="btn-calculadora" style="width: 100%; height:50px; "
                                                title="." type="button" id="idn15"
                                                onclick="Editar('.')">.</button>
                                        </td>
                                        <td
                                            style=" text-align: center;padding:0px;margin:0px;  font-size: 30px; width: 15%;  font-weight: bold; ">
                                            <button class="btn-calculadora" style="width: 100%; height:50px; "
                                                title="Eliminar" type="button" id="idn4" onclick="elimi('.')"><i
                                                    class="fa fa-times"></i></button>
                                        </td>

                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>

                    {!! Form::close() !!}

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" style="margin-top: 10px">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped table-bordered table-condensed table-hover">
                                <thead>
                                    <th style="text-align: center; width: 5px;">TICKET</th>
                                    <th style="text-align: center; width: 5px;">OPCIONES</th>
                                </thead>

                            </table>
                        </div>
                    </div>


                </div>

            </div>

            <div class="col-lg-7  col-md-12 col-sm-12 col-xs-12 ">
                <div class="row">
                    <div class="col-lg-12  col-md-12 col-sm-12 col-xs-12 ">
                        <div class="row">
                            {{-- <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="margin-top: 1px">
                            <select class="form-control" id="idClase" style="width: 100%;" onchange="FiltrarCategoria()" >
                                @foreach ($clase as $t => $val)                            
                                    <option value="{{$val->CLA_Id}}" >{{$val->CLA_Nombre}}</option>
                                @endforeach
                            </select>
                        </div> --}}
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="margin-top: 1px; margin-left:10px">
                                <select id="idCategoria-icon" class="form-control" style="width: 100%;"
                                    onchange="Tabla_Producto2();">
                                    @foreach ($categoria as $t => $val)
                                        <option value="{{ $val->CAT_Id }}"
                                            data-img-src="/archivos/categoria/{{ $val->CAT_Imagen }}">
                                            {{ $val->CAT_Nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                    </div>
                    {{-- <div class="col-lg-3  col-md-3 col-sm-3 col-xs-12 ">
                    <div class="table" style="height: calc(28vh - 10px);   overflow-y:scroll">
                        <table id="detallesClase" class="table table-sm table-bordered table-condensed table-hover ; padding:0px;margin:0px">
                            <thead hidden style="background: #ade9ff;">
                            </thead>
                            @foreach ($clase as $t => $val)
                            <tr>
                                <td style=" text-align: center;  font-size: 30px;"><button class="btn4" id="btnidc{{$t+1}}" onclick="Tabla_Categoria({{$t+1}});" style="text-align:center;" value="{{$val->CLA_Id}}" type="button">{{$val->CLA_Nombre}}</button></td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div> --}}
                </div>
                <div class="col-lg-12  col-md-12 col-sm-12 col-xs-12 ">
                    {{-- <div class="table-responsive" style="background:#FFF;">
                    <table id="detallesCategoria" class="table  table-bordered table-condensed table-hover">
                        <thead hidden style="background: #ade9ff;">
                        </thead>
                        <tr>
                            @foreach ($categoria as $t => $val)
                            <td style=" text-align: center;"><button class="btn2" id="btnidt{{$t+1}}" onclick="Tabla_Producto({{$t+1}});" style="text-align:center;" value="{{$val->CAT_Id}}" type="button">{{$val->CAT_Nombre}}</button></td>
                            @endforeach
                        </tr>
                    </table>
                </div> --}}
                </div>
                <div class="col-lg-12  col-md-12 col-sm-12 col-xs-12 ">
                    <div class="table" style="height: calc(90vh - 90px); background: #c2c2c2;  overflow-y:scroll">
                        <table id="detalles" class="table table-bordered table-condensed table-hover">
                            <thead hidden style="background: #ade9ff;">
                                <th style="text-align: center; width: 33%;">1</th>
                                <th style="text-align: center; width: 33%;">2</th>
                                <th style="text-align: center; width: 34%;">3</th>
                            </thead>
                        </table>
                    </div>
                </div>

            </div>



        </div>




    </div>

    <div class="modal fade" id="modalSelectCliente" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11" style="margin-top: 10px">
                            <label class="control-label" style=" text-align: left; display: block;">Seleccionar
                                Cliente:</label>
                            <select class="form-control select2" onchange="onSelectCliente()" id="idCliente"
                                style="width: 100%">
                                @foreach ($clientes as $cli)
                                    <option value="{{ $cli->CLI_Id }}">({{ $cli->CLI_NumDocumento }})
                                        {{ $cli->CLI_Nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" style="margin-top: 38px">
                            <span title="Nuevo Cliente" type="button" id="btnNuevoCliea" class="btn btn-success"
                                onclick="mostrarformulario()"
                                style=" border-bottom-right-radius:10px; border-top-right-radius: 10px;"><i
                                    class="fa fa-plus"></i> <i class="fa fa-user"></i></span>
                        </div>
                    </div>

                    <div class="card mt-2" id="idfrmCliente" style="display: none;">
                        <div class="card-body">
                            <h5 class="card-title">CREAR CLIENTE</h5>
                            <p class="card-text"></p>
                            <form method="POST" id="cliente_form" action="{{ route('gestion.cliente.store') }}">
                                @csrf
                                <input type="text" id="cliente_id_edit" hidden>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Cliente
                                            </span>
                                        </div>
                                        <select class="form-control" onChange="Limitar()" id="idCLI_TipoDocumento"
                                            name="CLI_TipoDocumento"
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
                                        <input class="form-control input-sm" maxlength="8" id="idCLI_NumDocumento"
                                            name="CLI_NumDocumento" placeholder="Ingresa Numero de Documento"
                                            type="text">
                                        <span class="input-group-append btn btn-primary btn-sm" id="Buscar_Cliente"
                                            style="display: block; border-bottom-right-radius:10px; border-top-right-radius: 10px;"
                                            onclick="buscarCliente()"><i class="fas fa-search"></i></span>
                                        <span class="input-group-append btn btn-primary btn-sm hide" id="cargando"
                                            style="display: none; border-bottom-right-radius:10px; border-top-right-radius: 10px;"><img
                                                width="15px" src="{{ asset('images/gif/cargando1.gif') }}"></span>


                                    </div>
                                </div>

                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="input-group input-group-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Razon social
                                            </span>
                                        </div>
                                        <input class="form-control input-sm" id="idCLI_Nombre" name="CLI_Nombre"
                                            onkeyup="this.value=this.value.toUpperCase();" placeholder="ingresa nombre"
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
                                        <input class="form-control input-sm" id="idCLI_Direccion" name="CLI_Direccion"
                                            onkeyup="this.value=this.value.toUpperCase();" placeholder="ingresa direccion"
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
                                        <input class="form-control input-sm" maxlength="9" name="CLI_Telefono"
                                            onkeyup="this.value=this.value.toUpperCase();" placeholder="ingresa numero"
                                            style=" border-bottom-right-radius:10px; border-top-right-radius: 10px;"
                                            type="text">
                                    </div>
                                </div>
                                <p></p>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button id="saveBtn" class="btn btn-primary"><i class="fas fa-save"></i>Guardar</button>
                            <button id="updateBtn" class="btn btn-info" style="display: none;"><i
                                    class="fas fa-save"></i>Actualizar</button>
                            <button type="reset" id="btncancelar" class="btn btn-danger"> <i
                                    class="fas fa-ban"></i>Cancelar </button>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


    <script src="https://unpkg.com/sweetalert2@9.5.3/dist/sweetalert2.all.min.js"></script>

    <head>
        <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
        <link href="{{ asset('plugins/select2/css/select2.min.css') }}" rel="stylesheet">
        <link href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}" rel="stylesheet">
        <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    </head>

    @push('scripts')
        <script>
            $(document).ready(function() {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    icon: 'info'
                });

                $('.select2').select2()

                $('.select2bs4').select2({
                    theme: 'bootstrap4'
                })

                $('#btnNuevo').click(function() {
                    habilitar();
                });

                $('#idCategoria-icon').select2({
                    minimumResultsForSearch: Infinity,
                    templateResult: formatState,
                    templateSelection: formatState
                });

                document.querySelector(".btn-select").addEventListener("click", function() {
                    // Alternar la visibilidad del menú
                    this.parentNode.classList.toggle("open");
                });

                document.querySelectorAll(".dropdown-menu div").forEach(option => {
                    option.addEventListener("click", function() {
                        const selectedText = this.textContent.trim();
                        const selectedId = this.getAttribute("data-id");
                        document.getElementById("selectedOption").textContent = selectedText;
                        document.querySelector("#hiddenSelectedIdMetodoPago").value = selectedId;
                        this.closest(".dropdown").classList.remove("open");
                    });
                });

                // Cerrar el menú si se hace clic fuera
                document.addEventListener("click", function(event) {
                    const dropdown = document.querySelector(".dropdown");
                    if (!dropdown.contains(event.target)) {
                        dropdown.classList.remove("open");
                    }
                });


                Tabla_Producto2()

                function formatState(state) {
                    if (!state.id) {
                        return state.text;
                    }
                    const img = $(state.element).data('img-src');
                    return $(
                        `<span><img src="${img}" style="width: 30px; height: 30px; margin-right: 10px;" />${state.text}</span>`
                    );
                }

                window.addEventListener("keydown", function(e) {
                    if (e.keyCode == 13) {
                        toggleFullScreen();
                    }
                }, false);

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
                                vaciarCampos();
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


            });


            function toggleFullScreen() {
                if (!document.fullscreenElement) {
                    document.documentElement.requestFullscreen();
                } else {
                    if (document.exitFullscreen) {
                        document.exitFullscreen();
                    }
                }
            }


            function Tabla_Categoria(id) {
                var idcla = $('#btnidc' + id).val();

                $("#detallesCategoria tbody").remove();
                $("#detalles tbody").remove();
                $con = 0;
                $fin = 0;
                $ind = 1;
                var fila = "<tr>";
                <?php foreach ($categoria as $t => $val): ?>
                $cla = "<?php echo $val->CLA_Id; ?>";
                $idtipo = "<?php echo $val->CAT_Id; ?>";
                $cate = "<?php echo $val->CAT_Nombre; ?>";
                if (idcla == $cla) {
                    fila += '<td style=" text-align: center;"><button class="btn2" id="btnidt' + $ind +
                        '" onclick="Tabla_Producto(' + $ind + ');" value="' + $idtipo +
                        '" style="text-align:center;" value="1" type="button">' + $cate + '</button></td>';

                    $ind = $ind + 1;
                }
                <?php endforeach ?>
                fila += '</tr>';
                $("#detallesCategoria").append(fila);


            }


            //metodo para agregar pedidos de manera temporal
            $POS = 0
            $MET = 0
            $NUME = 0
            $DECI = 0
            $ACTD = "NO"
            $ACTCLI = "NO"
            $CALCULADORA = "NO"
            var ListPedido = [];
            var subtotal = 0; //importe
            var total = 0;
            var cont = 0;

            function agregar(ind) {
                datosArticulo = document.getElementById('btnidp' + ind + '').value.split('_');

                idProducto = datosArticulo[0];
                //alert(idProducto);
                producto = datosArticulo[1];
                stock = datosArticulo[2];
                pVenta = datosArticulo[3];
                cantidad = 1;
                $editar = 0
                for (var i = 0; i < ListPedido.length; i++) {
                    if (ListPedido[i][0] == idProducto) {
                        var can = ListPedido[i][3]
                        var sub = ListPedido[i][4]
                        subtotal = parseFloat(cantidad * pVenta);
                        total = parseFloat(total + subtotal);
                        $("#total").html("S/ " + total);
                        $("#idCPC_MontoTotal").val(total);
                        $("#idCPC_MontoFaltante").val(total);
                        ListPedido[i][3] = parseFloat(can) + parseFloat(cantidad)
                        ListPedido[i][4] = parseFloat(ListPedido[i][3] * ListPedido[i][2]).toFixed(1);
                        ListPedido[i][6] = stock;

                        $editar = 1
                    }

                }


                if (idProducto != "" && cantidad > 0 && pVenta > 0) {

                    if ($editar == 0) {
                        subtotal = parseFloat(cantidad * pVenta);
                        /*total = parseFloat(total+subtotal);
                        $("#total").html("S/ "+total.toFixed(1));
                        $("#idCPC_MontoTotal").val(total.toFixed(1));
                        $("#idCPC_MontoFaltante").val(total.toFixed(1));*/

                        var fila1 = [idProducto, producto, pVenta, cantidad, subtotal.toFixed(1), "0", stock];
                        ListPedido.push(fila1);
                    }

                    $("#detallesVenta tbody").remove();
                    for (var i = 0; i < ListPedido.length; i++) {
                        var fila = '<tr  id="fila' + i + '" onclick="posicionamiento(' + i +
                            ');"><td style="text-align: left; padding:0px 7px" >'+
                            '<div style="display: flex; flex-direction: column; align-items: flex-start; width: 100%;">'+
                                '<input readonly="true"   hidden name="PRO_Id[]" value="' +ListPedido[i][0] + '">'+
                                '<span style="font-weight: bold;">' + ListPedido[i][1] +'</span>'+
                                '<div style="display: flex; gap: 10px; align-items: center;">'+
                                '<input readonly="true" type="number" onkeyup="Valida2('+i+');" name="DEV_Cantidad[]" hidden id="cantidad'+i+'" value="'+ListPedido[i][3]+'">'+
                                '<label id="cantidadLabel' + i + '" style="font-size: 11px;display: inline;">' + ListPedido[i][3] + '</label><small style="color: gray;display: inline; "> Unit x S/ <label id="precioUnitLabel' + i +'" style="font-size: 11px;">' + ListPedido[i][2] +'</label></small> ';                            
                            fila += '<label id="descuentoLabel' + i + '" style="font-size: 11px;"></label> ';
                            fila += '<input readonly="true" hidden  type="number"   name="DEV_PrecioUnitario[]" id="precioUnit'+ i +'" value="' + ListPedido[i][2] + '" >'+
                                '<input readonly="true" hidden name="DEV_Descuento[]" onkeyup="Valida2('+i+ ');" id="descuento'+i+'"  value="' + ListPedido[i][5] + '">'+
                            '</div></div></td><td style="vertical-align: top; text-align: right;">'+
                            '<input disabled name="subTot' + i + '" hidden id="subTot' + i + '"  value="' + ListPedido[i][4] + '">'+
                            '<label id="subTotLabel' + i +
                            '" style="font-size: 13px; font-weight: bold;"> S/ ' + ListPedido[i][4] + '</label>'+
                            '</td></tr>';
                        $("#detallesVenta").append(fila);
                        $POS = i;
                    }

                    $("#detallesVenta").on("click", "tr", function() {
                        // Remueve la clase 'selected' de todas las filas
                        $("#detallesVenta tr").removeClass("selected");
                        // Añade la clase 'selected' a la fila clickeada
                        $(this).addClass("selected");
                    });



                    $("#detallesInformacion tbody").remove();
                    var filainfo = '<tr  ><td><label style="font-size: 11px;"  hidden ">' + ListPedido[$POS][1] +
                        '</label></td><td><label style="font-size: 11px;"  hidden>' + stock + '</label></td></tr>'
                    $("#detallesInformacion").append(filainfo);

                    //alert($POS)
                    total1 = 0;
                    for (var i = 0; i < ListPedido.length; i++) {
                        total1 = (parseFloat(total1) + parseFloat(ListPedido[i][4])).toFixed(1);
                        //alert(ListPedido[i][5]);

                    }
                    $("#total").html("S/. " + total1);
                    $("#total").val(total1);
                    limpiar_numeros();
                    ValidarVuelto();


                } else {
                    alert("Error, Revise los datos del Producto");
                }
            }

            function FiltrarCategoria() {
                $valor = $('#idClase').val();

            }

            function Tabla_Producto2() {
                var idTipo = $('#idCategoria-icon').val();
                $("#detalles tbody").remove();
                $con = 0;
                $fin = 0;
                $ind = 1;

                <?php foreach ($lotesuni as $lot): ?>
                $categoriaid = '<?php echo $lot->CATEGORIA; ?>';
                $Producto = '<?php echo $lot->PRO_Nombre; ?>';
                $Descripcion = '<?php echo $lot->PRO_Descripcion; ?>';
                $Imagen = '<?php echo $lot->PRO_Imagen; ?>';
                $idProducto = '<?php echo $lot->PRO_Id; ?>';
                $stock = '<?php echo $lot->PRO_Cantidad; ?>';
                $preventa = '<?php echo $lot->PRO_PrecioBaseVenta; ?>';

                if (idTipo == $categoriaid) {
                    $con = $con + 1;
                    if ($con == 1) {
                        var fila = "<tr>";
                        if ($stock > 0) {
                            fila += `
                                <td style="text-align: center; vertical-align: middle;">
                                    <button class="btntipo1" 
                                            id="btnidp${$ind}" 
                                            onclick="agregar(${$ind});" 
                                            value="${$idProducto}_${$Producto}_${$stock}_${$preventa}" 
                                            style="text-align: left; padding: 5px; display: flex; align-items: center; border: 1px solid #ccc; border-radius: 5px;" 
                                            type="button">
                                    <div style="display: flex; align-items: center; gap: 10px; width: 100%;">
                                        <img src="/archivos/producto/${$Imagen}" alt="Imagen" style="width: 80px; height: 80px; border-radius: 5px;">
                                        <div style="display: flex; flex-direction: column; align-items: flex-start;">
                                        <span style="font-weight: bold;">${$Producto}</span>
                                        <small style="color: gray; display: block; white-space: normal; overflow-wrap: break-word; word-wrap: break-word; width: 150px;">${$Descripcion}</small>
                                        <span style="font-weight: bold;">S/. ${$preventa}</span>
                                        </div>
                                    </div>
                                    </button>
                                </td>
                                `;
                        } else {
                            fila += '<td style=" text-align: center;"><button class="btntipo3" disabled id="btnidp' + $ind +
                                '" onclick="agregar(' + $ind + ');" value="' + $idProducto + '_' + $stock + '_' + $preventa +
                                '" style="text-align:center;" value="1" type="button">' + $Producto + '</button></td>';
                        }

                    } else if ($con == 2) {
                        if ($stock > 0) {
                            fila += `
                                <td style="text-align: center; vertical-align: middle;">
                                    <button class="btntipo1" 
                                            id="btnidp${$ind}" 
                                            onclick="agregar(${$ind});" 
                                            value="${$idProducto}_${$Producto}_${$stock}_${$preventa}" 
                                            style="text-align: left; padding: 5px; display: flex; align-items: center; border: 1px solid #ccc; border-radius: 5px;" 
                                            type="button">
                                    <div style="display: flex; align-items: center; gap: 10px; width: 100%;">
                                        <img src="/archivos/producto/${$Imagen}" alt="Imagen" style="width: 80px; height: 80px; border-radius: 5px;">
                                        <div style="display: flex; flex-direction: column; align-items: flex-start;">
                                        <span style="font-weight: bold;">${$Producto}</span>
                                        <small style="color: gray; display: block; white-space: normal; overflow-wrap: break-word; word-wrap: break-word; width: 150px;">${$Descripcion}</small>
                                        <span style="font-weight: bold;">S/. ${$preventa}</span>
                                        </div>
                                    </div>
                                    </button>
                                </td>
                                `;
                        } else {
                            fila += '<td style=" text-align: center;"><button class="btntipo3" disabled id="btnidp' + $ind +
                                '" onclick="agregar(' + $ind + ');" value="' + $idProducto + '_' + $stock + '_' + $preventa +
                                '" style="text-align:center;" value="1" type="button">' + $Producto + '</button></td>';
                        }

                    } else if ($con == 3) {
                        if ($stock > 0) {
                            fila += `
                                <td style="text-align: center; vertical-align: middle;">
                                    <button class="btntipo1" 
                                            id="btnidp${$ind}" 
                                            onclick="agregar(${$ind});" 
                                            value="${$idProducto}_${$Producto}_${$stock}_${$preventa}" 
                                            style="text-align: left; padding: 5px; display: flex; align-items: center; border: 1px solid #ccc; border-radius: 5px;" 
                                            type="button">
                                    <div style="display: flex; align-items: center; gap: 10px; width: 100%;">
                                        <img src="/archivos/producto/${$Imagen}" alt="Imagen" style="width: 80px; height: 80px; border-radius: 5px;">
                                        <div style="display: flex; flex-direction: column; align-items: flex-start;">
                                        <span style="font-weight: bold;">${$Producto}</span>
                                        <small style="color: gray; display: block; white-space: normal; overflow-wrap: break-word; word-wrap: break-word; width: 150px;">${$Descripcion}</small>
                                        <span style="font-weight: bold;">S/. ${$preventa}</span>
                                        </div>
                                    </div>
                                    </button>
                                </td>
                                `;
                        } else {
                            fila += '<td style=" text-align: center;"><button class="btntipo3" disabled id="btnidp' + $ind +
                                '" onclick="agregar(' + $ind + ');" value="' + $idProducto + '_' + $stock + '_' + $preventa +
                                '" style="text-align:center;" value="1" type="button">' + $Producto + '</button></td>';
                        }

                        fila += '</tr>';
                        $("#detalles").append(fila);
                        $con = 0;
                        $fin = $fin + 1;

                    }

                    $ind = $ind + 1;

                }
                <?php endforeach ?>

                if ($con == 1 || $con == 2) {
                    fila += '</tr>';
                    $("#detalles").append(fila);
                    $con = 0;
                    $fin = $fin + 1;
                }

            }

            function aceptar() {
                $('#VentaTipo').val('LIBRE');
                var formulario = document.getElementById("venta_form");
                $.ajax({
                    data: $('#venta_form').serialize(),
                    url: "{{ route('gestion.venta.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function(data) {
                        console.log('Success:', data);
                        Swal.fire({
                            icon: "success",
                            title: "Venta Generada",
                            text: "Se realizo el pago correctamente!",
                            confirmButtonText: "Aceptar",
                            footer: '<a title="TICKET" target="_blank"  href="/gestion/venta/' + data[0]
                                .ventagenerado.VEN_Id +
                                '/ticket" class="btn btn-danger btn-sm" style="margin-left: 5px;"><i class="fa fa fa-print"></i> ¿Desea imprimir documento?</a>',
                            allowOutsideClick: false, // Deshabilita clics fuera del alert
                            allowEscapeKey: false
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload();
                            } else if (result.isDenied) {
                                // Swal.fire("Changes are not saved", "", "info");
                            }
                        });
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
            }

            function PagoCalculadora() {
                $CALCULADORA = "SI"
                $NUME = 0
                $DECI = 0
                $ACTD = "NO"
            }


            function mostrarformulario() {
                if ($ACTCLI == "NO") {
                    $("#idfrmCliente").show();
                    $ACTCLI = "SI"
                } else {
                    $("#idfrmCliente").hide();
                    $ACTCLI = "NO"
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

            function onSelectCliente() {
                const selectedValue = $('#idCliente').val(); // Obtiene el ID del cliente
                const selectedLabel = $('#idCliente option:selected').text();

                document.getElementById("selectedCliente").textContent = selectedLabel;
                document.querySelector("#hiddenSelectedIdCliente").value = selectedValue;
                $('#modalSelectCliente').modal('hide');
            }

            function vaciarCampos() {
                $('#cliente_form').trigger("reset");
                $("#cliente_id_edit").val('');
                $('#modalSelectCliente').modal('hide');
                $("#saveBtn").show();
            }

            function showCliente() {
                $('#modalSelectCliente').modal('show');
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

            function posicionamiento(index) {
                $POS = index;
                $("#detallesInformacion tbody").remove();
                var filainfo = '<tr  ><td><label style="font-size: 11px;"  hidden ">' + ListPedido[$POS][1] +
                    '</label></td><td><label style="font-size: 11px;"  hidden>' + ListPedido[$POS][6] + '</label></td></tr>'
                $("#detallesInformacion").append(filainfo);


                limpiar_numeros();
            }

            function Metodo(text) {
                $MET = text;
                limpiar_numeros();
            }

            function limpiar_numeros() {
                $NUME = 0
                $DECI = 0
                $ACTD = "NO"
                $CALCULADORA = "NO"
            }

            function elimi() {
                if ($DECI > 0) {
                    $DECI = parseInt($DECI / 10)
                    Editar("ELIMINAR")
                } else {
                    $NUME = parseInt($NUME / 10)
                    $ACTD = "NO"
                    Editar("ELIMINAR")
                }


            }

            function Editar(num) {


                if (num == "." || $ACTD == "SI") {
                    if ($ACTD == "SI") {
                        if (num == "ELIMINAR") {
                            num = $NUME + "." + $DECI
                        } else {
                            $DECI = parseFloat($DECI * 10) + parseFloat(num)
                            num = $NUME + "." + $DECI
                        }


                    } else {
                        num = $NUME + ".0"
                    }


                    $ACTD = "SI"
                } else if (num == "ELIMINAR") {
                    num = $NUME
                } else {
                    $NUME = parseFloat($NUME * 10) + parseFloat(num)
                    num = $NUME
                }


                if ($CALCULADORA == "NO") {
                    //alert(num)
                    if ($MET == "CANTIDAD") {
                        $('#cantidad' + $POS).val(num);
                        document.querySelector('#cantidadLabel' + $POS).innerText = num;
                    } else if ($MET == "PRECIO") {
                        $('#precioUnit' + $POS).val(num);
                        document.querySelector('#precioUnitLabel' + $POS).innerText = num;
                    } else if ($MET == "DESCUENTO") {
                        $('#descuento' + $POS).val(num);
                        document.querySelector('#descuentoLabel' + $POS).innerText = " - Descuento S/ "+num;
                    }

                    var cantid = $('#cantidad' + $POS).val();
                    var pvent = $('#precioUnit' + $POS).val();
                    var descuento = $('#descuento' + $POS).val();


                    if (cantid.length >= 0 && pvent >= 0.00 && descuento >= 0.00 && descuento.length > 0 && cantid.length > 0 &&
                        pvent.length > 0) {

                        ListPedido[$POS][2] = pvent;
                        ListPedido[$POS][3] = cantid;
                        ListPedido[$POS][5] = descuento;

                        subtot = (parseFloat(ListPedido[$POS][3] * ListPedido[$POS][2]) - parseFloat(ListPedido[$POS][5]))
                            .toFixed(1);

                        //alert(descuento);
                        ListPedido[$POS][4] = subtot;
                        $('#subTot' + $POS).val(subtot);
                        document.querySelector('#subTotLabel' + $POS).innerText = subtot;



                    } else {
                        imp = (0).toFixed(1);
                    }

                    total1 = 0;
                    for (var i = 0; i < ListPedido.length; i++) {
                        total1 = (parseFloat(total1) + parseFloat(ListPedido[i][4])).toFixed(1);
                        $("#total").html("S/. " + total1);
                        $("#total").val(total1);

                    }
                    ValidarVuelto();
                } else {
                    $totalpagar = $("#total").val();
                    $("#idPagado").val(num);
                    $vuelto = (num - $totalpagar).toFixed(1)
                    $("#idVuelto").val($vuelto);

                }
            }

            function ValidarVuelto() {
                $totalpagar = $("#total").val();
                $pagado = $("#idPagado").val();
                if ($pagado.length > 0 && $pagado > 0) {
                    $vuelto = ($pagado - $totalpagar).toFixed(1)
                    $("#idVuelto").val($vuelto);
                }

            }

            function habilitar() {
                $('#familia').attr('disabled', false);
                $('#btnCancelar').attr('disabled', false);
                $('#btnAgregaImagen').attr('disabled', false);
            }

            function Deshabilitar() {
                $('#familia').attr('disabled', true);
                $('#btnCancelar').attr('disabled', true);
                $('#btnAgregaImagen').attr('disabled', true);
            }

            function vaciar() {
                for (var i = ListPedido.length - 1; i >= 0; i--) {
                    total = 0;
                    $("#total").html("S/. " + total);
                    $("#total").val(total);
                    $('#fila' + i).remove();
                    ListPedido.splice(i, 1);
                }
                $POS = 0
            }

            function eliminar() {
                $('#fila' + $POS).remove();
                ListPedido.splice($POS, 1);
                $POS = $POS - 1
                total1 = 0;
                for (var i = 0; i < ListPedido.length; i++) {
                    total1 = (parseFloat(total1) + parseFloat(ListPedido[i][4])).toFixed(1);
                }
                $("#total").html("S/. " + total1);
                $("#total").val(total1);
                $pagado = $("#idPagado").val();
                $vuelto = ($pagado - total1).toFixed(1)
                $("#idVuelto").val($vuelto);

            }
        </script>
    @endpush
@endsection
