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
                            <form method="POST" action="{{ route('clase.store') }}">
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
        })
    </script>
@endsection
