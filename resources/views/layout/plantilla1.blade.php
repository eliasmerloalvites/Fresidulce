<!DOCTYPE html>
@extends('layout.app1')
@section('title', 'RRHH')
@section('content')

   <body class="sidebar-mini layout-navbar-fixed text-sm" style="height: auto; min-height: 100%;">
        <div class="wrapper">
            <nav class="main-header navbar navbar-expand navbar-dark">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="/rrhh" class="nav-link">Menu</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                            <i class="fas fa-file-contract"></i>
                            <span class="badge badge-danger navbar-badge" style="right: 0px;top: 0px"><label
                                    id="totalnotificaciones"
                                    style="padding: 0px; color:#fff;margin-bottom:0px;"></label></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="padrenotiContrato" style="height: calc(70vh - 100px); overflow-y:scroll;">
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                            <i class="fas fa-paste"></i>
                            <span class="badge badge-danger navbar-badge" style="right: 0px;top: 0px"><label
                                    id="totalnotificaciones2"
                                    style="padding: 0px; color:#fff;margin-bottom:0px;"></label></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="padrenotiActa" style="height: calc(70vh - 100px); overflow-y:scroll;">
                        </div>
                    </li> --}}

                    <li class="nav-item dropdown ">
                        <a id="navbarDropdown" onclick="CerrarSession()" class="nav-link dropdown-toggle" href="#"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <b> {{ Auth::user()->name }} </b> <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" id="idSession" style=" display: none;  "
                            aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Cerrar Session') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                        </div>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
                            <i class="fas fa-th-large"></i>
                        </a>
                    </li> --}}
                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar elevation-4 sidebar-light-black sidebar-dark-navy">
                <!-- Brand Logo -->
                <a href="/rrhh" class="brand-link navbar-light">
                   <img id="avatarImageHeader" class="brand-image img-circle elevation-3" alt="User Image">
                        <span class="brand-text font-weight-light">
                    <img src="{{ asset('dist/img/logo.png') }}" alt="AdminLTE Logo" style="height:30px"> </span>

                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img id="avatarImageMenu" class="img-circle elevation-2"
                                alt="User Image">

                        </div>
                        <div class="info">
                            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                        </div>
                    </div>

                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-compact"
                            data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-item has-treeview" id="idCabAsistencia">
                                <a href="#" class="nav-link" id="idAsistencia">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p>
                                        ASISTENCIA
                                    <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>

                                <ul class="nav nav-treeview">
                                    @can('rrhh.asistencias.create')
                                        <li class="nav-item">
                                            <a href="{{ route('rrhh.asistencias.index') }}" class="nav-link " id="idCabAsistenciaLista">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Lista</p>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                            <li class="nav-item has-treeview" id="idCabVentas">
                                <a href="#" class="nav-link" id="idVentas">
                                    <i class="nav-icon fas fa-cash-register"></i>
                                    <p>
                                    VENTAS
                                    <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>

                                <ul class="nav nav-treeview">
                                    @can('rrhh.venta.create')
                                        <li class="nav-item">
                                            <a href="{{ route('rrhh.venta.create') }}" class="nav-link " id="idCabVentaCrear">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Crear</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('rrhh.venta.index')
                                        <li class="nav-item">
                                            <a href="{{ route('rrhh.venta.index') }}" class="nav-link " id="idCabVentaLista">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Lista</p>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>

                            @can('rrhh.personal.index')
                            <li class="nav-item has-treeview" id="idCabGestion">
                                <a href="#" class="nav-link" id="idGestion">
                                    <i class="nav-icon fas fa-edit"></i>
                                    <p>
                                    GESTIÓN ADMINISTRATIVA
                                    <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('rrhh.personal.index')
                                    <li class="nav-item has-treeview">
                                        <a href="{{ route('rrhh.personal.create') }}" class="nav-link " id="idGesPersonalN">
                                            <i class="nav-icon far fa-circle"></i>
                                            <p>
                                                Personal Nuevo
                                            </p>
                                        </a>
                                    </li>
                                    @endcan
                                    @can('rrhh.personal.index')
                                        <li class="nav-item has-treeview">
                                            <a href="{{ route('rrhh.personal.index') }}" class="nav-link" id="idGesFicha">
                                                <i class="nav-icon far fa-circle"></i>
                                                <p>
                                                    Ficha Personal
                                                </p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('rrhh.personal.index')
                                    <li class="nav-item has-treeview" id="idCabGesActas" style="display: none">
                                        <a href="#" class="nav-link" id="idGesActas">
                                            <i class="nav-icon fas fa-circle"></i>
                                            <p>
                                                Actas de Bioseguridad
                                                <i class="right fas fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            @can('rrhh.actaspersonal.create')
                                                <li class="nav-item">
                                                    <a href="{{ route('rrhh.actaspersonal.create') }}" class="nav-link" id="idGesActasRegistrar">
                                                        <i class="far fa-circle nav-icon"></i>
                                                        <p>Registrar</p>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('rrhh.actaspersonal.index')
                                                <li class="nav-item">
                                                    <a href="{{ route('rrhh.actaspersonal.index') }}" class="nav-link" id="idGesActasLista">
                                                        <i class="far fa-circle nav-icon"></i>
                                                        <p>Lista</p>
                                                    </a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </li>
                                    @endcan
                                    @can('rrhh.contratopersonal.index')
                                    <li class="nav-item has-treeview" id="idCabGesPersonal">
                                        <a href="#" class="nav-link"  id="idGesPersonal">
                                            <i class="nav-icon fas fa-circle"></i>
                                            <p>
                                                Contrato
                                                <i class="right fas fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            @can('rrhh.contratopersonal.create')
                                                <li class="nav-item">
                                                    <a href="{{ route('rrhh.contratopersonal.create') }}" class="nav-link" id="idGesPersonalRegistrar">
                                                        <i class="far fa-circle nav-icon"></i>
                                                        <p>Registrar</p>
                                                    </a>
                                                </li>
                                            @endcan
                                            @can('rrhh.contratopersonal.index')
                                                <li class="nav-item">
                                                    <a href="{{ route('rrhh.contratopersonal.index') }}" class="nav-link" id="idGesPersonalLista">
                                                        <i class="far fa-circle nav-icon"></i>
                                                        <p>Lista</p>
                                                    </a>
                                                </li>
                                            @endcan
                                        </ul>
                                    </li>
                                    @endcan
                                    @can('rrhh.contratopersonal.index')
                                        <li class="nav-item has-treeview" style="display: none">
                                            <a href="{{ route('rrhh.personal.filtro') }}" class="nav-link" id="idGesFiltro">
                                                <i class="nav-icon far fa-circle"></i>
                                                <p>
                                                    Filtros
                                                </p>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                            @endcan

                            @can('rrhh.venta.create')
                                <li class="nav-item has-treeview"  id="idCabReporte1">
                                    <a href="#" class="nav-link" id="idReporte1">
                                        <i class="nav-icon fas fa-chart-bar"></i>
                                        <p>
                                            REPORTE
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>

                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ route('rrhh.reporte.ventas') }}" class="nav-link " id="idReporteVentas">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Ventas</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @endcan

                            @can('rrhh.puesto.index')
                                <li class="nav-item has-treeview" id="idCabAjuste">
                                    <a href="#" class="nav-link " id="idAjuste">
                                        <i class="nav-icon fas fa-sliders-h"></i>
                                        <p>
                                            AJUSTES
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @can('rrhh.tipolinea.index')
                                            <li class="nav-item">
                                                <a href="{{ route('rrhh.tipolinea.index') }}" class="nav-link " id="idAjuTipoLinea">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Tipo Línea</p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('rrhh.operador.index')
                                            <li class="nav-item">
                                                <a href="{{ route('rrhh.operador.index') }}" class="nav-link " id="idAjuOperador">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Operador</p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('rrhh.estadolinea.index')
                                            <li class="nav-item">
                                                <a href="{{ route('rrhh.estadolinea.index') }}" class="nav-link " id="idAjuEstadoLinea">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Estado Línea</p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('rrhh.producto.index')
                                            <li class="nav-item">
                                                <a href="{{ route('rrhh.producto.index') }}" class="nav-link " id="idAjuProducto">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Producto</p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('mantenimiento.cliente.index')
                                            <li class="nav-item">
                                                <a href="{{ route('mantenimiento.cliente.index') }}" class="nav-link" id="idAjuCliente">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Cliente</p>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            @endcan
                            
                            @can('users.index')
                                <li class="nav-item has-treeview {{ request()->is('usuario*') || request()->is('permiso*') || request()->is('rol*') ? 'menu-open' : '' }}" id="idCabSeguridad" >
                                    <a href="#" class="nav-link {{ request()->is('usuario*') || request()->is('permisos*') || request()->is('roles*') ? 'active' : '' }}" id="idSeguridad" >
                                        <i class="nav-icon fas fa-lock"></i>
                                        <p>
                                            SEGURIDAD
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @can('permiso.index')
                                            <li class="nav-item">
                                                <a href="{{ route('permiso.index') }}" class="nav-link {{ request()->is('permiso*') ? 'active' : '' }}" id="idSegPermiso">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Permiso</p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('role.index')
                                            <li class="nav-item">
                                                <a href="{{ route('role.index') }}" class="nav-link  {{ request()->is('rol*') ? 'active' : '' }}" id="idSegRoles">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Roles</p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('users.index')
                                            <li class="nav-item">
                                                <a href="{{ route('usuario.index') }}" class="nav-link {{request()->is('usuario*') ? 'active' : ''}}" id="idSegUsuario">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Usuario</p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('grupo.index')
                                            <li class="nav-item">
                                                <a href="{{ route('seguridad.grupo.index') }}" class="nav-link" id="idSegGrupo">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>Grupo</p>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            @endcan

                            <li class="nav-item has-treeview">
                                <a href="http://kamilmotors.com/" target="_blank" class="nav-link ">                                    
                                    <i class="nav-icon fas fa-link"></i>
                                    <p>
                                        Archivo
                                    </p>
                                </a>
                            </li>

                        </ul>
                    </nav>
                </div>
                <!-- /.sidebar -->
            </aside>

            <div class="content-wrapper">
                <section class="content" style="margin: 0px;padding:0px">
                    @yield('contenido')
                </section>
            </div>

            <aside class="control-sidebar control-sidebar-dark" style="overflow-y:scroll;">
            </aside>
        </div>
        <script src="/plugins/jquery/jquery.min.js"></script>
        <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/dist/js/demo.js"></script>

        {{-- <link rel="stylesheet" href="{{asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
        <script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script> --}}


        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
        <link href="{{asset('plugins/font-awesome/css/fontawesome-all.min.css')}}" rel="stylesheet">

        <script src="{{asset('js/jquery.js')}}"></script>
        <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>

        <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
        <link href="{{ asset('plugins/select2/css/select2.min.css') }}" rel="stylesheet">
        <link href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}" rel="stylesheet">
        <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>


        <script src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.js"></script>
        <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.2.1/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" language="javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
        <script type="text/javascript" language="javascript"src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
        <script type="text/javascript" language="javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
        <script type="text/javascript" language="javascript" src="//cdn.datatables.net/buttons/1.2.1/js/buttons.html5.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.2.1/css/buttons.dataTables.min.css">


        <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
        <link rel="stylesheet" href="{{asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
        <script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" href="{{ asset('ijaboCropTool/ijaboCropTool.min.css') }}">
        <script src="{{ asset('ijaboCropTool/ijaboCropTool.min.js') }}"></script>
        {{-- <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> --}}


        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />




        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/data.js"></script>
        <script src="https://code.highcharts.com/modules/drilldown.js"></script>
        <script src="https://code.highcharts.com/modules/series-label.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>

        <script src="{{asset('Highcharts/code/highcharts.js')}}"></script>
        <script src="{{asset('Highcharts/code/modules/pareto.js')}}"></script>
        <script src="{{asset('Highcharts/code/modules/data.js')}}"></script>
        <script src="{{asset('Highcharts/code/modules/drilldown.js')}}"></script>
        @stack('scripts')
        <script type="text/javascript">
            if (window.location.hash && window.location.hash == '#_=_') {
                window.location.hash = '';
            }


            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                Datos();
            });


            function Datos() {
                $.ajax({
                    url: "{{ route('personal.getimagen') }}",
                    type: "GET",
                }).done(function(data) {
                    $('#avatarImageHeader').attr('src', data.ruta);
                    $('#avatarImageMenu').attr('src', data.ruta);
                })
            }

        </script>


    </body>
@endsection
