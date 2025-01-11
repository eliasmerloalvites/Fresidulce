@extends ('home')
@section ('contenido')
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

    .btntipo1 {
        font-size: 13px;
        color: #ffffff;
        background: #96BC1F;
        line-height: 14px;
        text-align: center;
        width: 130px;
        height: 50px;
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
        width: 130px;
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
        width: 130px;
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
        width: 130px;
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
        width: 130px;
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
        width: 130px;
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
        width: 130px;
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
        width: 130px;
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
        width: 130px;
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
        width: 130px;
        height: 50px;
    }

    .btntipo10:hover {
        color: #F4D22B;
        background-color: #ffffff
    }
</style>
<div class="contenedor-general">
    <div class="row panel-group">
        <div class="col-lg-6  col-md-12 col-sm-12 col-xs-12 ">
            <div class="row">

                <div class="col-lg-9  col-md-9 col-sm-9 col-xs-12 ">
                    <div class="table" style="height: calc(30vh - 10px)">
                        <table id="detallesCalculadora" class="table table-sm table-bordered table-condensed table-hover ; padding:0px;margin:0px">
                            <thead class="hide" style="background: #ade9ff;">
                            </thead>

                            <tr style="padding:0px;margin:0px">
                                <td style=" text-align: center; padding:0px;margin:0px; font-size: 30px; width: 15%;  font-weight: bold;  "><button class="btn-calculadora" style="width: 100%; padding:0px;margin:0px; height:50px;" title="1" type="button" id="idn1" onclick="Editar('1')">1</button></td>
                                <td style=" text-align: center; padding:0px;margin:0px;  font-size: 30px; width: 15%;  font-weight: bold; "><button class="btn-calculadora" style="width: 100%; padding:0px;margin:0px; height:50px; " title="2" type="button" id="idn2" onclick="Editar('2')">2</button></td>
                                <td style=" text-align: center; padding:0px;margin:0px;  font-size: 30px; width: 15%;  font-weight: bold; "><button class="btn-calculadora" style="width: 100%; padding:0px;margin:0px; height:50px; " title="3" type="button" id="idn3" onclick="Editar('3')">3</button></td>
                                <td style=" text-align: center; padding:0px;margin:0px;  font-size: 30px; width: 15%;  font-weight: bold; "><button class="btn-calculadora" style="width: 100%; padding:0px;margin:0px; height:50px; " title="Cantidad" type="button" id="idn4" onclick="Metodo('CANTIDAD')">Cant</button></td>


                            </tr>
                            <tr>
                                <td style=" text-align: center;padding:0px;margin:0px;  font-size: 30px; width: 15%;  font-weight: bold; "><button class="btn-calculadora" style="width: 100%; height:50px; " title="4" type="button" id="idn5" onclick="Editar('4')">4</button></td>
                                <td style=" text-align: center;padding:0px;margin:0px;  font-size: 30px; width: 15%;  font-weight: bold; "><button class="btn-calculadora" style="width: 100%; height:50px; " title="5" type="button" id="idn6" onclick="Editar('5')">5</button></td>
                                <td style=" text-align: center;padding:0px;margin:0px;  font-size: 30px; width: 15%;  font-weight: bold; "><button class="btn-calculadora" style="width: 100%; height:50px; " title="6" type="button" id="idn7" onclick="Editar('6')">6</button></td>
                                <td style=" text-align: center;padding:0px;margin:0px;  font-size: 30px; width: 15%;  font-weight: bold; "><button class="btn-calculadora" style="width: 100%; height:50px; " title="Descuento" type="button" id="idn8" onclick="Metodo('DESCUENTO')">Desc.</button></td>
                            </tr>
                            <tr>
                                <td style=" text-align: center;padding:0px;margin:0px;  font-size: 30px; width: 15%;  font-weight: bold; "><button class="btn-calculadora" style="width: 100%; height:50px; " title="7" type="button" id="idn9" onclick="Editar('7')">7</button></td>
                                <td style=" text-align: center;padding:0px;margin:0px;  font-size: 30px; width: 15%;  font-weight: bold; "><button class="btn-calculadora" style="width: 100%; height:50px; " title="8" type="button" id="idn10" onclick="Editar('8')">8</button></td>
                                <td style=" text-align: center;padding:0px;margin:0px;  font-size: 30px; width: 15%;  font-weight: bold; "><button class="btn-calculadora" style="width: 100%; height:50px; " title="9" type="button" id="idn11" onclick="Editar('9')">9</button></td>
                                <td style=" text-align: center;padding:0px;margin:0px;  font-size: 30px; width: 15%;  font-weight: bold; "><button class="btn-calculadora" style="width: 100%; height:50px; " title="Precio Venta" type="button" onclick="Metodo('PRECIO')" id="idn12">Prec.</button></td>
                            </tr>
                            <tr>
                                <td style=" text-align: center;padding:0px;margin:0px;  font-size: 30px; width: 15%;  font-weight: bold; "><button class="btn-calculadora" style="width: 100%; height:50px; " title="Eliminar Producto" type="button" id="idn13" onclick="eliminar()"><i class="fa fa-trash" style="color: #FF0000"></button></td>
                                <td style=" text-align: center;padding:0px;margin:0px;  font-size: 30px; width: 15%;  font-weight: bold; "><button class="btn-calculadora" style="width: 100%; height:50px; " title="0" type="button" id="idn14" onclick="Editar('0')">0</button></td>
                                <td style=" text-align: center;padding:0px;margin:0px;  font-size: 30px; width: 15%;  font-weight: bold; "><button class="btn-calculadora" style="width: 100%; height:50px; " title="." type="button" id="idn15" onclick="Editar('.')">.</button></td>
                                <td style=" text-align: center;padding:0px;margin:0px;  font-size: 30px; width: 15%;  font-weight: bold; "><button class="btn-calculadora" style="width: 100%; height:50px; " title="Eliminar" type="button" id="idn4" onclick="elimi('.')"><i class="fa fa-times"></button></td>

                            </tr>

                        </table>
                    </div>
                </div>
                <div class="col-lg-3  col-md-3 col-sm-3 col-xs-12 ">
                    <div class="table" style="height: calc(30vh - 10px);   overflow-y:scroll">
                        <table id="detallesClase" class="table  table-bordered table-condensed table-hover">
                            <thead class="hide" style="background: #ade9ff;">
                            </thead>
                            @foreach ($clase as $t => $val)
                            <tr>
                                <td style=" text-align: center;  font-size: 30px;"><button class="btn4" id="btnidc{{$t+1}}" onclick="Tabla_Categoria({{$t+1}});" style="text-align:center;" value="{{$val->CLA_Id}}" type="button">{{$val->CLA_Nombre}}</button></td>
                            </tr>
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-12  col-md-12 col-sm-12 col-xs-12 ">
                <table id="detallesCategoria" class="table  table-bordered table-condensed table-hover">
                    <thead class="hide" style="background: #ade9ff;">
                    </thead>
                    <tr>
                        @foreach ($categoria as $t => $val)
                        <td style=" text-align: center;"><button class="btn2" id="btnidt{{$t+1}}" onclick="Tabla_Producto({{$t+1}});" style="text-align:center;" value="{{$val->CAT_Id}}" type="button">{{$val->CAT_Nombre}}</button></td>
                        @endforeach
                    </tr>
                </table>
            </div>
            <div class="col-lg-12  col-md-12 col-sm-12 col-xs-12 ">
                <div class="table" style="height: calc(50vh - 90px);   overflow-y:scroll">
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


        <div class="col-lg-6  col-md-12 col-sm-12 col-xs-12 ">

            {!!Form::open(['route' => 'gestion.venta.store','id' => 'form1'])!!}
            {{Form::token()}}

            <input class="form-control" hidden id="VentaTipo" name="VentaTipo" value="VENTA" />
            <input class="form-control" hidden name="EMP_Codigo" value="{{ Auth::user()->id }}" />
            <div class="col-lg-12  col-md-12 col-sm-12 col-xs-12 " controls id="contenedor1">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 1px">
                    <div class="table-responsive" style="height: calc(45vh - 90px);  overflow-y:scroll;">
                        <table id="detallesVenta" class="table table-sm table-bordered table-condensed table-hover">
                            <thead style="background: #ade9ff;">
                                <th style="text-align: left;  width: 80%;">PRODUCTO</th>
                                <th style="text-align: left;  width: 5%;">PU</th>
                                <th style="text-align: left;  width: 5%;">CNT</th>
                                <th style="text-align: left;  width: 5%;">DSC</th>
                                <th style="text-align: left;  width: 5%;">IMPT</th>
                            </thead>
                        </table>
                    </div>
                    <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background-color: #DDD;">

                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8" style="text-align: center;font-weight: bold;">TOTAL</div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style="text-align: right;"><label id="total" name="total">S/ 0.00</label><input name="total_venta" type="hidden" id="total_venta"></div>
                        <!--<th hidden="true"><input type="hidden" name="totalVenta" id="totalVenta"></th>-->
                    </div>
                </div>
                <div class="table-responsive col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <table id="detallesInformacion" class="table table-sm table-bordered table-condensed table-hover hide">
                        <thead class="hide" style="background: #dddddd;">
                            <th style="text-align: left; font-size: 12px; width: 80%;font-weight: bold;"><label>PRODUCTO</label> </th>
                            <th style="text-align: left; font-size: 12px; width: 20%;font-weight: bold;"><label>STOCK</label> </th>
                        </thead>

                    </table>

                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="input-group">
                        <span class="form-control" style="background: #EDEDED; border-bottom-left-radius:10px; border-top-left-radius: 10px;">Tipo PAGO</span>
                        <select class="form-control " id="VEN_TipoPago" name="VEN_TipoPago">
                            <option value="1" selected>CONTADO</option>
                            <!--<option value="3" >TARJETA</option>-->
                            <!--<option value="2">CREDITO</option>-->
                        </select>
                        <span class="btn btn-primary btn-sm " data-dismiss="modal-dialog" style="border-bottom-right-radius:10px; border-top-right-radius: 10px;"><i class="fa fa-credit-card"></i></span>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10px">
                    <div class="input-group">
                        <span class="form-control" style="background: #EDEDED; border-bottom-left-radius:10px; border-top-left-radius: 10px;">CLIENTE</span>
                        <select class="form-control " id="CLI_Cod" name="CLI_Cod">

                        </select>
                        <span title="Nuevo Cliente" type="button" id="btnNuevoCliea" class="btn btn-primary btn-sm " onclick="mostrarformulario()" style=" border-bottom-right-radius:10px; border-top-right-radius: 10px;"><i class="fa fa-plus"></i> <i class="fa fa-user"></i></span>
                    </div>
                </div>

                <div class="modal-body panel-body" style="max-height: calc(60vh - 90px);padding-bottom: 0px;padding-top: 0px;">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 hide" id="idfrmCliente" style="border-color: #02D399; margin-bottom: 20px; border-width: 3px; border-style: double; background: #F1F1F1;">
                        <div class="row" style="padding-top : 1%">
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            Cliente
                                        </span>
                                    </div>
                                    <select class="form-control" id="CliTDoc" onChange="limitar()" name="CLI_TipoDocumento" style=" border-bottom-right-radius:10px; border-top-right-radius: 10px;">
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
                                    <input class="form-control input-sm" id="CliNDoc" maxlength="8" name="CLI_NumDocumento" placeholder="Ingresa Numero de Documento" type="text">
                                    <span class="input-group-append btn btn-primary btn-sm" id="Buscar_Cliente" onclick="BuscarCliente()" style=" border-bottom-right-radius:10px; border-top-right-radius: 10px;" title="Buscar Cliente" type="button">
                                        <i class="fa fa-search">
                                        </i>
                                    </span>
                                    <span class=" input-group-append btn btn-primary btn-sm hide" id="cargando" style=" border-bottom-right-radius:10px; border-top-right-radius: 10px;" title="Cargando" type="button">
                                        <i>
                                            <img src="{{ asset('imagenes/articulos/cargando1.gif') }}" width="15px">

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
                                    <input class="form-control input-sm" id="CliNom" name="CLI_Nombres" onkeyup="this.value=this.value.toUpperCase();" placeholder="ingresa nombre" style=" border-bottom-right-radius:10px; border-top-right-radius: 10px;" type="text">
                                </div>
                            </div>
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            Direccion
                                        </span>
                                    </div>
                                    <input class="form-control input-sm" id="CliDir" name="CLI_Direccion" onkeyup="this.value=this.value.toUpperCase();" placeholder="ingresa direccion" style=" border-bottom-right-radius:10px; border-top-right-radius: 10px;" type="text">
                                </div>
                            </div>
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="input-group input-group-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            Telefono
                                        </span>
                                    </div>
                                    <input class="form-control input-sm" maxlength="9" name="CLI_Telefono" onkeyup="this.value=this.value.toUpperCase();" placeholder="ingresa numero" style=" border-bottom-right-radius:10px; border-top-right-radius: 10px;" type="text">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 10px">
                    <div class="input-group">
                        <span type="button" id="btnPago" class="btn btn-primary btn-sm " onclick="PagoCalculadora()" style="border-bottom-left-radius:10px; border-top-left-radius: 10px; border-bottom-right-radius:10px; border-top-right-radius: 10px;"><i class="fa fa-plus"></i></span>
                        <span class="form-control" style="background: #EDEDED; border-bottom-left-radius:10px; border-top-left-radius: 10px;">PAGO</span>
                        <input type="text" class="form-control input-sm" readonly="true" value="0" name="VEN_Pagado" id="idPagado">
                        <span class="form-control" style="background: #EDEDED; ">VUELTO</span>
                        <input type="text" class="form-control input-sm" readonly="true" value="0" name="VEN_Vuelto" id="idVuelto" style="border-bottom-right-radius:10px; border-top-right-radius: 10px;">

                    </div>
                </div>
                {!!Form::close()!!}

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
                <div class=" row col-lg-8 col-md-8 col-sm-8 col-xs-12" style="margin-top: 10px">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <button title="Vaciar Carrito" onclick="vaciar()" target="_blank" type="button" class="btn btn-danger" style="border-radius: 10px;">VACIAR </button>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <button type="button" target="_blank" class="btn" onclick="aceptar();" style="background:#F39C12; color: #000; border-radius: 10px;">GENERAR </button>
                    </div>
                </div>

            </div>

        </div>

    </div>




</div>

<script src="https://unpkg.com/sweetalert2@9.5.3/dist/sweetalert2.all.min.js"></script>


@push ('scripts')
<script>
    $(document).ready(function() {
        $('#CLI_Cod').select2();
        $('#btnNuevo').click(function() {
            habilitar();
        });


        window.addEventListener("keydown", function(e) {
            if (e.keyCode == 13) {
                toggleFullScreen();
            }
        }, false);

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
        $con = 0;
        $fin = 0;
        $ind = 1;
        var fila = "<tr>";
        <?php foreach ($categoria as $t => $val): ?>
            $cla = "<?php echo $val->CLA_Id; ?>";
            $idtipo = "<?php echo $val->CAT_Id; ?>";
            $cate = "<?php echo $val->CAT_Nombre; ?>";




            if (idcla == $cla) {

                /*fila += '<td style=" text-align: center;"><button class="btn'+$ind+'" id="btnidt'+$ind+'" onclick="Tabla_Producto('+$ind+');" value="'+$idtipo+'" style="text-align:center;" value="1" type="button">'+$cate+'</button></td>';*/
                fila += '<td style=" text-align: center;"><button class="btn2" id="btnidt' + $ind + '" onclick="Tabla_Producto(' + $ind + ');" value="' + $idtipo + '" style="text-align:center;" value="1" type="button">' + $cate + '</button></td>';

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
        producto = $("#btnidp" + ind + "").text();
        uMedida = datosArticulo[1];
        stock = datosArticulo[2];
        pVenta = datosArticulo[3];
        cantidad = 1;

        //var label=document.querySelector('#idpro');
        //label.textContent=producto;
        //$("#idpro").val(producto);
        //$("#idven").val(pVenta);
        //$("#idsto").val(stock);
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
                var fila = '<tr  id="fila' + i + '" onclick="posicionamiento(' + i + ');"><td><input readonly="true"   type="hidden" name="PRO_Id[]" value="' + ListPedido[i][0] + '"><label style="font-size: 11px;font-weight: bold; ">' + ListPedido[i][1] + '</label></td><td><input readonly="true" class="hide"  type="number"   name="DEV_PrecioUnitario[]" id="precioUnit' + i + '" value="' + ListPedido[i][2] + '" ><label id="precioUnitLabel' + i + '" style="font-size: 11px;">' + ListPedido[i][2] + '</label></td><td style="text-align: center;" ><input readonly="true" type="number" onkeyup="Valida2(' +
                    i + ');" name="DEV_Cantidad[]" class="hide" id="cantidad' + i + '"  value="' + ListPedido[i][3] + '"><label id="cantidadLabel' + i + '" style="font-size: 11px;">' + ListPedido[i][3] + '</label></td><td style="text-align: right;"><input readonly="true" class="hide" name="DEV_Descuento[]" onkeyup="Valida2(' + i + ');" id="descuento' + i + '"  value="' + ListPedido[i][5] + '"><label id="descuentoLabel' + i + '" style="font-size: 11px;">' + ListPedido[i][5] + '</label></td><td style="text-align: right;"><input disabled name="subTot' + i + '" class="hide" id="subTot' + i + '"  value="' + ListPedido[i][4] + '"><label id="subTotLabel' + i + '" style="font-size: 11px;">' + ListPedido[i][4] + '</label></td></tr>';
                $("#detallesVenta").append(fila);
                $POS = i;
            }



            $("#detallesInformacion tbody").remove();
            var filainfo = '<tr  ><td><label style="font-size: 11px;"  type="hidden" ">' + ListPedido[$POS][1] + '</label></td><td><label style="font-size: 11px;"  type="hidden">' + stock + '</label></td></tr>'
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

    function aceptar() {
        $('#VentaTipo').val('VENTA');
        var formulario = document.getElementById("form1");
        formulario.submit();
    }

    function PagoCalculadora() {
        $CALCULADORA = "SI"
        $NUME = 0
        $DECI = 0
        $ACTD = "NO"
    }


    function mostrarformulario() {
        if ($ACTCLI == "NO") {
            $("#idfrmCliente").removeClass('hide');
            $ACTCLI = "SI"
        } else {
            $("#idfrmCliente").addClass('hide');
            $ACTCLI = "NO"
        }
    }

    function BuscarCliente() {
        if ($('#CliTDoc').val() == 'DNI') {

            var cod = document.getElementById("CliTDoc").value;


            $numero = $("#CliNDoc").val();


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
                            $("#CliNDoc").val("");
                        } else {

                        }
                    });
            } else {
                $('#Buscar_Cliente').addClass('hide');
                $('#cargando').removeClass('hide');

                var numdni = $('#CliNDoc').val();
                var url = 'https://www.buqkly.com/api/consultadni/' + numdni + '?';

                $.ajax({
                    type: 'GET',
                    url: url,
                    //data: { "_token": "{{ csrf_token() }}"},
                    // headers: {  'Access-Control-Allow-Origin': 'https://www.buqkly.com' },
                    success: function(dat) {

                        if (dat.success[1] == false) {
                            $('#Buscar_Cliente').removeClass('hide');
                            $('#cargando').addClass('hide');

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
                                        $("#CliNDoc").val("");
                                    } else {

                                    }
                                });
                        } else {

                            $('#CliNom').val(dat.success[0]);


                            $('#Buscar_Cliente').removeClass('hide');
                            $('#cargando').addClass('hide');

                        }
                    }

                });



            }

        } else {

            var cod = document.getElementById("CliTDoc").value;


            $numero = $("#CliNDoc").val();


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
                            $("#CliNDoc").val("");
                        } else {

                        }
                    });
            } else {


                $('#Buscar_Cliente').addClass('hide');
                $('#cargando').removeClass('hide');

                var numdni = $('#CliNDoc').val();
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
                            $('#cargando').addClass('hide');
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
                                        $("#CliNDoc").val("");
                                    } else {

                                    }
                                });
                        } else {

                            $('#CliNom').val(dat.success[1]);
                            $('#CliDir').val(dat.success[2]);

                            $('#Buscar_Cliente').removeClass('hide');
                            $('#cargando').addClass('hide');

                        }
                    }

                });

            }
        }
    }

    function limitar() {

        var cod = document.getElementById("CliTDoc").value;

        if (cod == 'DNI') {
            $("#CliNDoc").val("");
            $("#CliNDoc").attr('maxlength', '8');
        } else {



            $("#CliNDoc").val("");
            $("#CliNDoc").attr('maxlength', '11');
        }

    }

    function posicionamiento(index) {
        $POS = index;
        $("#detallesInformacion tbody").remove();
        var filainfo = '<tr  ><td><label style="font-size: 11px;"  type="hidden" ">' + ListPedido[$POS][1] + '</label></td><td><label style="font-size: 11px;"  type="hidden">' + ListPedido[$POS][6] + '</label></td></tr>'
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
                document.querySelector('#descuentoLabel' + $POS).innerText = num;
            }

            var cantid = $('#cantidad' + $POS).val();
            var pvent = $('#precioUnit' + $POS).val();
            var descuento = $('#descuento' + $POS).val();


            if (cantid.length >= 0 && pvent >= 0.00 && descuento >= 0.00 && descuento.length > 0 && cantid.length > 0 && pvent.length > 0) {

                ListPedido[$POS][2] = pvent;
                ListPedido[$POS][3] = cantid;
                ListPedido[$POS][5] = descuento;

                subtot = (parseFloat(ListPedido[$POS][3] * ListPedido[$POS][2]) - parseFloat(ListPedido[$POS][5])).toFixed(1);

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
            total1 = (parseFloat(total1) + parseFloat(ListPedido[i][5])).toFixed(1);
        }
        $("#total").html("S/. " + total1);
        $("#total").val(total1);

    }
</script>
@endpush

@endsection