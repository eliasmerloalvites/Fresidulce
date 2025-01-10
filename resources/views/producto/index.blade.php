@extends('layout.plantilla1')

@section('titulo', 'Productos')

@section('contenido')
    <div class="container">
        <div class="row ">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">CREAR PRODUCTO</h5>
                        <p class="card-text"></p>
                        <form method="POST" id="product_form" action="{{route('producto.store')}}">
                            @csrf
                            <div class="form-group row">
                                <div class="col-12">
                                    <input type="text" id="permiso_id_edit" hidden>
                                    <label class="control-label">Nombre:</label>
                                    <input type="text" id="PRO_Nombre" name="PRO_Nombre"
                                        class="form-control input_user "
                                        placeholder="Nombre" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <input type="text" id="permiso_id_edit" hidden>
                                    <label class="control-label">Descripción:</label>
                                    <input type="text" id="PRO_Descripcion" name="PRO_Descripcion"
                                        class="form-control input_user "
                                        placeholder="Descripción" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <input type="number" id="permiso_id_edit" hidden>
                                    <label class="control-label">Precio de Compra:</label>
                                    <input type="number" id="PRO_PrecioCompra" name="PRO_PrecioCompra"
                                        class="form-control input_user "
                                        placeholder="Precio de Compra" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <input type="number" id="permiso_id_edit" hidden>
                                    <label class="control-label">Precio de Venta:</label>
                                    <input type="number" id="PRO_PrecioVenta" name="PRO_PrecioVenta"
                                        class="form-control input_user "
                                        placeholder="Precio de Venta" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <input type="text" id="permiso_id_edit" hidden>
                                    <label class="control-label">Marca:</label>
                                    <input type="text" id="PRO_Marca" name="PRO_Marca"
                                        class="form-control input_user "
                                        placeholder="Marca" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label class="control-label">Categoria:</label>
                                    <select class="form-control select2 select2-info" id="CAT_Id" name="CAT_Id"
                                        data-dropdown-css-class="select2-info" onchange="verName()" style="width: 100%;">
                                        <option value="">Seleccionar ...</option>
                                        @foreach ($categorias as $itemCategoria)
                                            <option value="{{ $itemCategoria->CAT_Id }}">
                                                {{ $itemCategoria->CAT_Nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <p></p>
                            <button id="productosave" class="btn btn-primary"><i class="fas fa-save"></i>Guardar</button>
                            
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">LISTA DE PRODUCTOS</h5>
                        <p class="card-text">
                        <table class="table" id="lista_productos">
                            <thead style="background-color:#1C91EC;color: #fff;">
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
        })
    </script>
@endsection
