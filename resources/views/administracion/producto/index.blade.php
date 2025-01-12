@extends('layout.plantilla1')

@section('titulo', 'Productos')

@section('contenido')
<head>
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link href="{{ asset('plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}" rel="stylesheet">
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
</head>
    <div class="container">
        <div class="row ">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">CREAR PRODUCTO</h5>
                        <p class="card-text"></p>
                        <form method="POST" id="product_form" action="{{route('producto.store')}}">
                            @csrf
                            <input type="text" id="producto_id_edit" hidden>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label class="control-label" style=" text-align: left; display: block;">Categoria:</label>
                                    <select class="form-control select2 select2-info" id="CAT_Id" name="CAT_Id"
                                        data-dropdown-css-class="select2-info"  style="width: 100%; ">
                                        <option value="">Seleccionar ...</option>
                                        @foreach ($categorias as $itemCategoria)
                                            <option value="{{ $itemCategoria->CAT_Id }}">
                                                {{ $itemCategoria->CAT_Nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label class="control-label"  style=" text-align: left; display: block;">Nombre:</label>
                                    <input type="text" id="PRO_Nombre" name="PRO_Nombre"
                                        class="form-control input_user "
                                        placeholder="Nombre" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label class="control-label"  style=" text-align: left; display: block;">Descripción:</label>
                                    <input type="text" id="PRO_Descripcion" name="PRO_Descripcion"
                                        class="form-control input_user "
                                        placeholder="Descripción" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label class="control-label"  style=" text-align: left; display: block;">Precio de Compra:</label>
                                    <input type="number" id="PRO_PrecioCompra" name="PRO_PrecioCompra"
                                        class="form-control input_user "
                                        placeholder="Precio de Compra" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label class="control-label"  style=" text-align: left; display: block;">Precio de Venta:</label>
                                    <input type="number" id="PRO_PrecioVenta" name="PRO_PrecioVenta"
                                        class="form-control input_user "
                                        placeholder="Precio de Venta" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label class="control-label"  style=" text-align: left; display: block;">Marca:</label>
                                    <input type="text" id="PRO_Marca" name="PRO_Marca"
                                        class="form-control input_user "
                                        placeholder="Marca" required>
                                </div>
                            </div>
                            <p></p>
                            <button id="productosave" class="btn btn-primary"><i class="fas fa-save"></i>Guardar</button>
                            <button id="updateBtn" class="btn btn-info" style="display: none;"><i
                                class="fas fa-save"></i>Actualizar</button>
                            <button type="reset" id="btncancelar" class="btn btn-danger"> <i
                                class="fas fa-ban"></i>Cancelar </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">LISTA DE PRODUCTOS</h5>
                        <p class="card-text">
                        <div class="table-responsive" style="background:#FFF;" >
                            <table class="table" id="lista_productos">
                                <thead style="background-color:#FF5F67;color: #fff;">
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Descripción</th>
                                        <th scope="col">Precio de Compra</th>
                                        <th scope="col">Precio de Venta</th>
                                        <th scope="col">Marca</th>
                                        <th scope="col">Categoria</th>
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
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            
            $('.select2').select2();

            $('.select2bs4').select2({
              theme: 'bootstrap4'
            })

            var table = $('#lista_productos').DataTable({
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
                ajax: "{{ route('producto.index') }}",
                columns: [{
                        data: 'PRO_Id',
                        name: 'PRO_Id'
                    },
                    {
                        data: 'PRO_Nombre',
                        name: 'PRO_Nombre'
                    },
                    {
                        data: 'PRO_Descripcion',
                        name: 'PRO_Descripcion'
                    },
                    {
                        data: 'PRO_PrecioCompra',
                        name: 'PRO_PrecioCompra'
                    },
                    {
                        data: 'PRO_PrecioVenta',
                        name: 'PRO_PrecioVenta'
                    }, 
                    {
                        data: 'PRO_Marca',
                        name: 'PRO_Marca'
                    },
                    {
                        data: 'CAT_Id',
                        name: 'CAT_Id'
                    },
                    {
                        data: null,
                        name: '',
                        'render': function(data, type, row) {
                            return @can('producto.edit')
                                data.action1 + ' ' +
                            @endcan
                            ''
                            @can('producto.destroy')
                                +data.action2
                            @endcan ;
                        }
                    }
                ]
            });

            $('#productosave').click(function(e) {
                e.preventDefault();
                nombre = $("#PRO_Nombre").val();
                descripcion = $("#PRO_Descripcion").val();
                precioCompra = $("#PRO_PrecioCompra").val();
                precioVenta = $("#PRO_PrecioVenta").val();
                marca = $("#PRO_Marca").val();
                catId = $("#CAT_Id").val();

                if (nombre == ''||descripcion == ''||precioCompra == ''||precioVenta == ''||marca == ''||catId == '') {
                    Toast.fire({
                        type: 'error',
                        title: 'Complete todos los campos por favor'
                    })
                    return false;
                }
                $.ajax({
                    data: $('#product_form').serialize(),
                    url: "{{ route('producto.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function(data) {
                        console.log('Success:', data);
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })
                        $("#CAT_Id").val('');
                        $('#CAT_Id').change();
                        $('#product_form').trigger("reset");
                        table.draw();
                    },
                    error: function(data) {
                        console.log('Error:', data);
                        Toast.fire({
                            type: 'error',
                            title: 'producto fallo al Registrarse.'
                        })
                    }
                });
            });

            $('body').on('click', '.editProducto', function() {
                var Producto_id_edit = $(this).data('id');
                $.get('{{ route('producto.edit', ':producto') }}'.replace(':producto', Producto_id_edit),
                    function(result) {
                        console.log(result);
                        $('#producto_id_edit').val(result.data.PRO_Id);
                        $('#PRO_Nombre').val(result.data.PRO_Nombre);
                        $('#PRO_Descripcion').val(result.data.PRO_Descripcion);
                        $('#PRO_PrecioCompra').val(result.data.PRO_PrecioCompra);
                        $('#PRO_PrecioVenta').val(result.data.PRO_PrecioVenta);
                        $('#PRO_Marca').val(result.data.PRO_Marca);
                        $('#CAT_Id').val(result.data.CAT_Id);
                        $('#CAT_Id').change();


                        // Mostrar botón Actualizar y ocultar botón Guardar
                        $("#productosave").hide();
                        $("#updateBtn").show();
                    })
            });

            $('#updateBtn').click(function(e) {
                e.preventDefault();
                Producto_id_update = $('#producto_id_edit').val();
                $.ajax({
                    data: $('#product_form').serialize(),
                    url: '{{ route('producto.update',  ':producto') }}'.replace(
                        ':producto', Producto_id_update),
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
                            title: 'Producto fallo al actualizarse.'
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
                $('#product_form').trigger("reset");
                $("#CAT_Id").val('');
                $('#CAT_Id').change();
                $("#productosave").show(); // Mostrar botón Guardar
                $("#updateBtn").hide();
            }

            $('body').on('click', '.deleteProducto', function() {

                var Producto_id_delete = $(this).data("id");
                $confirm = confirm("¿Estás seguro de que quieres eliminarlo?");
                if ($confirm == true) {
                    $.ajax({
                        type: "DELETE",

                        url: '{{ route('producto.destroy',':producto') }}'.replace(
                            ':producto', Producto_id_delete),
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
                                title: 'Producto fallo al Eliminarlo.',
                                icon: 'info'
                            })
                        }
                    });
                }else{
                    Toast.fire({
                        title: 'Acción cancelada',
                        text: 'El producto no ha sido eliminado.',
                        icon: 'info'
                    });
                 }
            });
        })
    </script>
@endsection
