@extends('layout.plantilla1')

@section('titulo', 'Clases')

@section('contenido')
    <div class="container">
        <div class="row ">
            @can('clase.create')
                <div class="col-5">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">CREAR CLASE</h5>
                            <p class="card-text"></p>
                            <form method="POST" id="class_form" action="{{ route('clase.store') }}">
                                @csrf
                                <input type="text" id="clase_id_edit" hidden>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label class="control-label">Nombre:</label>
                                        <input type="text" id="CLA_Nombre" name="CLA_Nombre" class="form-control "
                                            placeholder="Nombre" required>
                                    </div>

                                </div>
                                <p></p>
                                <button id="saveBtn" class="btn btn-primary"><i class="fas fa-save"></i>Guardar</button>
                                <button id="updateBtn" class="btn btn-info" style="display: none;"><i
                                        class="fas fa-save"></i>Actualizar</button>
                                <button type="reset" id="btncancelar" class="btn btn-danger"> <i
                                        class="fas fa-ban"></i>Cancelar </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endcan

            @can('clase.index')
                <div class="col-7">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">LISTA DE CLASES</h5>
                            <p class="card-text">
                            <div class="table-responsive" style="background:#FFF;" >
                                <table class="table" id="tabla_clase">
                                    <thead style="background-color:#FF5F67;color: #fff;">
                                        <tr>
                                            <th scope="col">N°</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Opciones</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan
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

            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                icon: 'info'
            });

            var table = $('#tabla_clase').DataTable({
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
                ajax: "{{ route('clase.index') }}",
                columns: [{
                        data: 'CLA_Id',
                        name: 'CLA_Id'
                    },
                    {
                        data: 'CLA_Nombre',
                        name: 'CLA_Nombre'
                    },
                    {
                        data: null,
                        name: '',
                        'render': function(data, type, row) {
                            return @can('clase.edit')
                                    data.action1 + ' ' +
                                @endcan
                            ''
                            @can('clase.destroy')
                                +data.action2
                            @endcan ;
                        }
                    }
                ]
            });

            $('#saveBtn').click(function(e) {
                e.preventDefault();
                nombre = $("#CLA_Nombre").val();

                if (nombre == '') {
                    Toast.fire({
                        type: 'error',
                        title: 'Complete todos los campos por favor'
                    })
                    return false;
                }
                $.ajax({
                    data: $('#class_form').serialize(),
                    url: "{{ route('clase.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function(data) {
                        console.log('Success:', data);
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })
                        cancelarUpdate();
                        table.draw();
                    },
                    error: function(data) {
                        console.log('Error:', data);
                        Toast.fire({
                            type: 'error',
                            title: 'clase fallo al Registrarse.'
                        })
                    }
                });
            });

            $('body').on('click', '.editClase', function() {
                var Clase_id_edit = $(this).data('identificador');
                $.get('{{ route('clase.edit', ['clase' => ':clase']) }}'.replace(':clase', Clase_id_edit),
                    function(result) {
                        console.log(result);
                        $('#clase_id_edit').val(result.data.CLA_Id);
                        $('#CLA_Nombre').val(result.data.CLA_Nombre);


                        // Mostrar botón Actualizar y ocultar botón Guardar
                        $("#saveBtn").hide();
                        $("#updateBtn").show();
                    })
            });

            $('#updateBtn').click(function(e) {
                e.preventDefault();
                Clase_id_update = $('#clase_id_edit').val();
                $.ajax({
                    data: $('#class_form').serialize(),
                    url: '{{ route('clase.update', ['clase' => ':clase']) }}'.replace(
                        ':clase', Clase_id_update),
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
                            title: 'Clase fallo al actualizarse.'
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
                $('#class_form').trigger("reset");
                $("#clase_id_edit").val('');
                $("#saveBtn").show(); // Mostrar botón Guardar
                $("#updateBtn").hide();
            }

            $('body').on('click', '.deleteClase', function() {

                var Clase_id_delete = $(this).data("id");
                $confirm = confirm("¿Estás seguro de que quieres eliminarlo?");
                if ($confirm == true) {
                    $.ajax({
                        type: "DELETE",

                        url: '{{ route('clase.destroy', ['clase' => ':clase']) }}'.replace(
                            ':clase', Clase_id_delete),
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
                                title: 'Clase fallo al Eliminarlo.',
                                icon: 'info'
                            })
                        }
                    });
                }else{
                    Toast.fire({
                        title: 'Acción cancelada',
                        text: 'La clase no ha sido eliminada.',
                        icon: 'info'
                    });
                 }
            });
        });
    </script>
@endsection
