@extends('layout.plantilla1')

@section('titulo', 'Categorias')

@section('contenido')
    <div class="container">
        <div class="row ">
            <div class="col-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">CREAR CATEGORIAS</h5>
                        <p class="card-text"></p>
                        <form method="POST" id="cat_form" action="{{ route('categoria.store') }}">
                            @csrf
                            <div class="form-group row">
                                <div class="col-12">
                                    <input type="text" id="permiso_id_edit" hidden>
                                    <label class="control-label">Nombre:</label>
                                    <input type="text" id="CAT_Nombre" name="CAT_Nombre" class="form-control "
                                        placeholder="Nombre" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label class="control-label">Clase:</label>
                                    <select class="form-control select2 select2-info" id="CLA_Id" name="CLA_Id"
                                        data-dropdown-css-class="select2-info" onchange="verName()" style="width: 100%;">
                                        <option value="">Seleccionar ...</option>
                                        @foreach ($clases as $itemClase)
                                            <option value="{{ $itemClase->CLA_Id }}"> {{ $itemClase->CLA_Nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <p></p>
                            <button id="saveCategoria" class="btn btn-primary"><i class="fas fa-save"></i>Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-7">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">LISTA DE CATEGORIAS</h5>
                        <p class="card-text">

                        <table class="table" id="lista_categorias">
                            <thead style="background-color:#1C91EC;color: #fff;">
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
        })
    </script>
@endsection
