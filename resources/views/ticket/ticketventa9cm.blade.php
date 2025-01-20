<!DOCTYPE html>
<html>

<head>
    <meta charset="gb18030">

    <link rel="stylesheet" href="{{ asset('css/imprimirBoleto9cm.css') }}">
    <script type="text/javascript">
        function imprimir() {
            //window.open()
            window.print();
            //window.close();

            //window.location.href = "{{ url('ventas/venta/create1') }}";
        }
    </script>

<body onload="imprimir();">
    <div class="ticket" id="ticket">
        <!--<img src="../../src/image/logo.png" alt="Logotipo">-->
        <br>
        <div class="center">
            <h3 style="margin: 0; font-size: 22px">{{ $datosalmacen->ALM_Nombre }}</h3>
            <h3 style="margin: 0; font-size: 14px">RUC : {{ $datosalmacen->ALM_Ruc }}</h3>
            <h6 style="margin: 0; font-size: 14px">{{ $datosalmacen->ALM_Direccion }}</h6>
            <h6 style="margin: 0; font-size: 14px">LA LIBERTAD - PACASMAYO - PACASMAYO</h6>
            <h6 style="margin: 0; font-size: 14px">CEL. {{ $datosalmacen->ALM_Celular }} </h6>
            <h6 style="margin: 0; font-size: 14px">Fecha de Emision: {{ $ventae->fechaVenta }} Hora:
                {{ $ventae->fechaVentaT }}</h6>
        </div>
        <?php
        if ($ventae->tipoDoc == 'BOL') {
            echo '<div class="etiq4">BOLETA DE VENTA ELECTRONICA</div><br>';
        }
        if ($ventae->tipoDoc == 'FAC') {
            echo '<div class="etiq4">FACTURA DE VENTA ELECTRONICA</div><br>';
        }
        ?>
        <div class="etiq4">SERIE:{{ $UbiDoc }} CORRELATIVO: {{ $NumDoc }}</div>
        <!-- <div class="etiq">{{ $ventae->fechaVenta }}</div>-->

        <div class="lineas">------------------------------------------------------------------------</div>
        <span class="etiq">Razon Social</span> : <span>{{ $ventae->cliente }}</span>
        <?php 
      if($ventae->tipoDoc == "BOL"){ ?>
        <br> <span class="etiq">DNI</span> : <span>{{ $ventae->clienteNumero }}</span>
        <br><span class="etiq">Direccion</span> : <span>{{ $ventae->clienteDireccion }}</span>;
        <?php      }
    ?>
        <?php 
      if($ventae->tipoDoc == "FAC"){ ?>
        <br><span class="etiq">RUC</span> : <span>{{ $ventae->clienteNumero }}</span>
        <br><span class="etiq">Direccion</span> : <span>{{ $ventae->clienteDireccion }}</span>;
        <?php      }
    ?>

        <?php 
      if($ventae->tipoDoc == "PRO"){ ?>
        <br><span class="etiq">Direccion</span> : <span>{{ $ventae->clienteDireccion }}</span>;
        <?php      }
    ?>

        <!--    <br><span class="etiq">Documento</span> : <span>{{ $ventae->clienteNumero }}</span>
      <br><span class="etiq">Dirección</span> : <span>{{ $ventae->clienteDireccion }}</span>
      <br><span class="etiq">Vendedor</span>  : <span>{{ $ventae->empleado }}</span>-->
        <?php
        if ($ventae->tipopago == '1') {
            echo '<br><span class="etiq">COND.PAGO</span> : <span>CONTADO</span></p>';
        }
        if ($ventae->tipopago == '2') {
            echo '<br><span class="etiq">COND.PAGO</span> : <span>CREDITO</span></p>';
        }
        ?>

        <table>
            <thead>
                <tr>
                    <th>DESCRIPCION.</th>
                    <th>CANT</th>
                    <th>P. UNIT</th>
                    <th>TOTAL</th>
                </tr>
            </thead>
            <tbody>
                <?php
            foreach ($detallese as $de) { ?>
                <tr>
                    <td>{{ $de->categoria }} - {{ $de->articulo }}</td>
                    <td style="text-align:center">{{ $de->cantidad }}</td>
                    <td style="text-align:center">{{ number_format($de->precio_venta, 1) }}</td>
                    <td style="text-align:center">{{ number_format($de->subtotal, 1) }}</td>
                </tr>
                <?php    } ?>





            </tbody>
        </table>
        <div class="lineas">-------------------------------------------------------------------------</div>
        <div class="montos">

            <?php 
              if($ventae->tipoDoc == "PRO"){ ?>

            <?php      } else{ ?>

            <span class="etiq2">DESCUENTO</span><span class="puntos">: S/</span><span
                class="moneda">{{ $ventae->total_descuento }}</span>
            <br><span class="etiq2">OP.GRAVADA</span><span class="puntos">: S/</span><span
                class="moneda">{{ number_format($Subtotal, 2) }}</span>
            <br><span class="etiq2">OP.EXONERADA</span><span class="puntos">: S/</span><span
                class="moneda">{{ number_format($montogravado, 2) }}</span>
            <br><span class="etiq2">I.G.V. 18%</span><span class="puntos">: S/</span><span
                class="moneda">{{ number_format($igv, 2) }} </span>
            <br>
            <div class="lineas">-----------------------------------------------------------------------</div>
            <?php } 
         
         ?>
            <!--<br><span class="etiq2">  IMPORTE TOTAL</span><span class="puntos">: S/</span><span class="moneda">{{ number_format($ventae->total_venta - $ventae->total_descuento, 1) }}</span>-->
        </div>
        <br><span class="etiq2">TOTAL</span><span class="puntos">: S/</span><span
            class="moneda">{{ number_format($ventae->total_venta - $ventae->total_descuento, 2) }}</span>
        <br>

        <center>


            <?php 
    if($calificarventa->VEN_TipoPago == "2"){?>
            <div class="recuadro" style="width: 9.0cm; padding: 5px; margin-top:5px">
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th style="width:70px;"></th>
                        </tr>
                    </thead>
                    <tBody>
                        <tr>
                            <td>DIAS DE ESPERA</td>
                            <td style="text-align:center">{{ $datosdecuenta->CPC_Frecuencia }}</td>
                        </tr>
                        <tr>
                            <td>FECHA DE ENTREGA</td>
                            <td style="text-align:center">{{ $datosdecuenta->FECHAEMISION }}</td>
                        </tr>
                        <tr>
                            <td>A CUENTA</td>
                            <td style="text-align:center">{{ $datosdecuenta->CPC_MontoAbonado }}</td>
                        </tr>
                        <tr>
                            <td>SALDO</td>
                            <td style="text-align:center">{{ $datosdecuenta->CPC_MontoFaltante }}</td>
                        </tr>
                        <tr>
                            <td>FECHA DE PAGO</td>
                            <td style="text-align:center">{{ $datosdecuenta->CPC_FechaVencimiento }}</td>
                        </tr>
                        <tr>
                            <td>OBSERVACIONES</td>
                            <td style="text-align:center">{{ $datosdecuenta->CPC_Descripcion }}</td>
                        </tr>
                    </tBody>
                </table>
            </div>
            <?php     } ?>


        </center>
        <div class="center" style="margin-bottom: 250px;">
            <br>
            <?php 
      if($ventae->tipoDoc == "BOL"){?>
            Representacion impresa de la Boleta de Venta Electronica.
            <?php  } 
      if($ventae->tipoDoc == "FAC"){?>
            Representacion impresa de la Factura de Venta Electronica.
            <?php   }
    ?>


            <br>Podra ser consultada en
            https://ww1.sunat.gob.pe/ol-ti-itconsultaunificadalibre/consultaUnificadaLibre/consulta
            <br>CAJERO : {{ $ventae->EMP_Codigo }}
            <br>Fecha de Emision:{{ $ventae->fechaVenta }} Hora: {{ $ventae->fechaVentaT }}
            <br>GRACIAS POR SU COMPRA
        </div>

    </div>
    <label>.</label>
    <script src="./impresora.js"></script>
</body>

</html>
