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
                                <div class="form-group row">
                                    <div class="col-12">
                                        <input type="text" id="permiso_id_edit" hidden>
                                        <label class="control-label">Nombre:</label>
                                        <input type="text" id="CLA_Nombre" name="CLA_Nombre" class="form-control "
                                            placeholder="Nombre" required>
                                    </div>

                                </div>
                                <p></p>
                                <button id="saveBtn" class="btn btn-primary"><i class="fas fa-save"></i>Guardar</button>
                                <a href="{{ route('cancelarClase') }}"><button type="reset" id=""
                                        class="btn btn-danger"> <i class="fas fa-ban"></i>Cancelar
                                    </button></a>
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
                            <table class="table" id="tabla_clase">
                                <thead style="background-color:#1C91EC;color: #fff;">
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
            @endcan
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
                        $('#class_form').trigger("reset");
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

        })
    </script>
@endsection
