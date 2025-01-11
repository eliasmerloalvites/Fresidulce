@extends('layout.plantilla1')

@section('titulo', 'Categorias')

@section('contenido')
<head>
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link href="{{ asset('plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}" rel="stylesheet">
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
</head>

    <div class="container">
        <div class="row ">
            <div class="col-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">CREAR CATEGORIAS</h5>
                        <p class="card-text"></p>
                        <form method="POST" id="cat_form" action="{{ route('categoria.store') }}">
                            @csrf
                            <input type="text" id="categoria_id_edit" hidden>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label class="control-label"  style=" text-align: left; display: block;">Clase:</label>
                                    <select class="form-control select2 select2-info" id="CLA_Id" name="CLA_Id"
                                        data-dropdown-css-class="select2-info" style="width: 100%;">
                                        <option value="">Seleccionar ...</option>
                                        @foreach ($clases as $itemClase)
                                            <option value="{{ $itemClase->CLA_Id }}"> {{ $itemClase->CLA_Nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label class="control-label"  style=" text-align: left; display: block;">Nombre:</label>
                                    <input type="text" id="CAT_Nombre" name="CAT_Nombre" class="form-control "
                                        placeholder="Nombre" required>
                                </div>
                            </div>
                            <p></p>
                            <button id="saveCategoria" class="btn btn-primary"><i class="fas fa-save"></i>Guardar</button>
                            <button id="updateBtn" class="btn btn-info" style="display: none;"><i
                                    class="fas fa-save"></i>Actualizar</button>
                            <button type="reset" id="btncancelar" class="btn btn-danger"> <i
                                    class="fas fa-ban"></i>Cancelar </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-7">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">LISTA DE CATEGORIAS</h5>
                        <p class="card-text">

                        <div class="table-responsive" style="background:#FFF;" >
                            <table class="table" id="lista_categorias">
                                <thead style="background-color:#FF5F67;color: #fff;">
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Clase</th>
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
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.select2').select2()

            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            var table = $('#lista_categorias').DataTable({
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
                ajax: "{{ route('categoria.index') }}",
                columns: [{
                        data: 'CAT_Id',
                        name: 'CAT_Id'
                    },
                    {
                        data: 'CAT_Nombre',
                        name: 'CAT_Nombre'
                    },
                    {
                        data: 'CLA_Nombre',
                        name: 'CLA_Nombre'
                    },
                    {
                        data: null,
                        name: '',
                        'render': function(data, type, row) {
                            return @can('categoria.edit')
                                    data.action1 + ' ' +
                                @endcan
                            ''
                            @can('categoria.destroy')
                                +data.action2
                            @endcan ;
                        }
                    }
                ]
            });

            $('#saveCategoria').click(function(e) {
                e.preventDefault();
                nombreCategoria = $("#CAT_Nombre").val();
                nombreClase = $("#CLA_Nombre").val();

                if (nombreCategoria == '' || nombreClase == '') {
                    Toast.fire({
                        type: 'error',
                        title: 'Complete todos los campos por favor'
                    })
                    return false;
                }
                $.ajax({
                    data: $('#cat_form').serialize(),
                    url: "{{ route('categoria.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function(data) {
                        console.log('Success:', data);
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })
                        $('#CLA_Id').val('');
                        $('#CLA_Id').change();
                        $('#cat_form').trigger("reset");
                        table.draw();
                    },
                    error: function(data) {
                        console.log('Error:', data);
                        Toast.fire({
                            type: 'error',
                            title: 'Categoria fallo al Registrarse.'
                        })
                    }
                });
            });

            $('body').on('click', '.editCategoria', function() {
                var Categoria_id_edit = $(this).data('id');
                $.get('{{ route('categoria.edit', ':categoria') }}'.replace(':categoria',
                    Categoria_id_edit),
                    function(result) {
                        console.log(result);
                        $('#categoria_id_edit').val(result.data.CAT_Id);
                        $('#CAT_Nombre').val(result.data.CAT_Nombre);
                        $('#CLA_Id').val(result.data.CLA_Id);
                        $('#CLA_Id').change();

                        // Mostrar botón Actualizar y ocultar botón Guardar
                        $("#saveCategoria").hide();
                        $("#updateBtn").show();
                    })
            });

            $('#updateBtn').click(function(e) {
                e.preventDefault();
                Categoria_id_update = $('#categoria_id_edit').val();
                $.ajax({
                    data: $('#cat_form').serialize(),
                    url: '{{ route('categoria.update', ':categoria') }}'.replace(':categoria',
                        Categoria_id_update),
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
                            title: 'Categoria fallo al actualizarse.'
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
                $('#cat_form').trigger("reset");
                $('#CLA_Id').val('');
                $('#CLA_Id').change();
                $("#categoria_id_edit").val('');
                $("#saveCategoria").show(); // Mostrar botón Guardar
                $("#updateBtn").hide();
            }

            $('body').on('click', '.deleteCategoria', function() {

                var Categoria_id_delete = $(this).data("id");
                $confirm = confirm("¿Estás seguro de que quieres eliminarlo?");
                if ($confirm == true) {
                    $.ajax({
                        type: "DELETE",

                        url: '{{ route('categoria.destroy',  ':categoria') }}'.replace(
                            ':categoria', Categoria_id_delete),
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
                                title: 'Categoria fallo al Eliminarlo.',
                                icon: 'info'
                            })
                        }
                    });
                } else {
                    Toast.fire({
                        title: 'Acción cancelada',
                        text: 'La categoria no ha sido eliminada.',
                        icon: 'info'
                    });
                }
            });
        })
    </script>
@endsection
