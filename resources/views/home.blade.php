@extends('layout.plantilla1')

@section('titulo','Inicio')


@section('contenido')

<body class="sidebar-mini layout-navbar-fixed sidebar-collapse text-sm" style="height: 100%;">
        <div class="row" style="padding: 4%">
            @can('gestion.venta.create')
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="small-box bg-teal">
                        <div class="inner">
                            <h4>LISTA VENTA</h4>
                            <span>Visualizas la ventas realizadas y filtra por fechas</span>
                        </div>
                        <div class="icon">
                            <i class="fas fa-list"></i>
                        </div>
                        <a href="/gestion/venta" class="small-box-footer">
                            Más Información, Click Aqui <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            @endcan
            @can('gestion.venta.create')
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h4>GENERAR VENTA</h4>
                            <span>Genera las ventas de manera rapida y dinamica</span>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <a href="/gestion/venta/create" class="small-box-footer">
                            Más Información, Click Aqui <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            @endcan
            @can('gestion.venta.create')
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="small-box bg-info ">
                        <div class="inner">
                            <h4>LISTA COMPRA</h4>
                            <span>Visualizas la compras realizadas y filtra por fechas</span>
                        </div>
                        <div class="icon">
                            <i class="fas fa-list"></i>
                        </div>
                        <a href="/compra" class="small-box-footer">
                            Más Información, Click Aqui <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            @endcan
            @can('gestion.venta.create')
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h4>GENERAR COMPRA</h4>
                            <span>Genera las compras de manera rapida y dinamica</span>
                        </div>
                        <div class="icon">
                            <i class="fas fa-cart-arrow-down"></i>
                        </div>
                        <a href="/compra/create" class="small-box-footer">
                            Más Información, Click Aqui <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            @endcan
            @can('gestion.venta.create')
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="small-box bg-danger ">
                        <div class="inner">
                            <h4>PRODUCTOS</h4>
                            <span>Visualiza y crea tus producto</span>
                        </div>
                        <div class="icon">
                            <i class="fas  fa-shapes"></i>
                        </div>
                        <a href="/compra" class="small-box-footer">
                            Más Información, Click Aqui <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            @endcan
        </div>
</body>
@endsection
@section('script')
<script>
    
</script>
@endsection