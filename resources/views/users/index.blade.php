@extends('layout.plantilla1')

@section('titulo','Usuario')


@section('contenido')

<div class="container ">
    {{-- Mensaje de alerta --}}
    <div id="mensaje">
        @if (session('datos'))
            <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                {{session('datos')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">$times;</span>
                </button>
            </div>
        @endif
    </div>
    <div class="row ">
        <div class="col-5">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">CREAR USUARIO</h5>
              <p class="card-text"></p>
                <form id="UsuarioForm" name="UsuarioForm" action="{{--route('usuario.store')--}}" >
                @csrf
        
                    <div class="form-group row">
                        <div class="col-12">
                            <label class="control-label">Nombre:</label>
                            <input type="text" name="name" id="name" class="form-control input_user @error('name') is-invalid @enderror"  placeholder="Nombre" required>
                            @error('name') 
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="control-label">Email:</label>
                            <input type="email" name="email" id="email" class="form-control input_user @error('email') is-invalid @enderror"  placeholder="email" required>
                            @error('email') 
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="control-label">Contraseña:</label>
                            <input type="password" name="password" id="password" class="form-control input_pass @error('password') is-invalid @enderror"  placeholder="contraseña" required>
                            @error('password') 
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="control-label">Confirmar contraseña:</label>
                            <input type="password" name="confipassword" id="confipassword" class="form-control input_pass @error('confipassword') is-invalid @enderror" placeholder="contraseña" required>
                            @error('confipassword') 
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="form-group row">
                        <div class="input-icon">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <input class="form-control  @error('imagenusuario') is-invalid @enderror" type="file" name="imagenusuario" id="imagenusuario">
                            @error('imagenusuario')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        
                    </div> --}}
                    
                    @can('usuario.create')
                    <button  id="saveBtn" class="btn btn-primary"><i class="fas fa-save"></i>Guardar</button>
                    @endcan

                    <button type="reset" class="btn btn-danger"> <i class="fas fa-ban"></i>Cancelar </button>
                    
                </form>
            </div>
          </div>
        </div>
        <div class="col-7">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">LISTA DE USUARIOS</h5>
              <p class="card-text">
                
                <table class="table table-striped nowrap" id="table-users" name="table-users">
                <thead style="background-color:#FF5F67;color: #fff;">
                    <tr>
                      <th scope="col">N°</th>
                      <th scope="col">Nombre</th>
                      <th scope="col">Opciones</th>
                    </tr>
                  </thead>
                  {{-- <tbody>
                    @if(count($usuarios)<=0)
                        <tr>
                            <td colspan="3"><b>No hay registro</b></td>
                        </tr>
                    @else
                        @foreach ($usuarios as $usuario)
                        <tr>
                            <td>{{$usuario->id}} </td>
                            <td>{{$usuario->name}}</td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{$usuario->id}}">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </button>
                                
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{$usuario->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <p>id de usuario: {{$usuario->id}}</p>
                                        <p>Nombre de usuario: {{$usuario->name}}</p>
                                        <p>Email de usuario: {{$usuario->email}}</p>
                                        <p>Fecha de registro de usuario: {{$usuario->created_at}}</p>
                                        <p>Fecha de actualización de usuario: {{$usuario->updated_at}}</p>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                 <a href="{{route('usuario.edit',$usuario->id)}} " class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                  
                                <!-- Botón del primer modal -->
                                {{-- <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal3{{$usuario->id}}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                
                                <!-- Primer Modal -->
                                <div class="modal fade" id="exampleModal3{{$usuario->id}}" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
                                    <div class="modal-dialog modalperrito">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel3">Editar Usuario {{$usuario->id}}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <!-- Contenido del cuerpo del modal -->
                                        <p>Aquí puedes agregar el formulario de edición del usuario {{$usuario->id}}</p>
                                        <form action="{{route('usuario.update',$usuario->id)}}" method="post">
                                            @method('put')
                                            @csrf
                                    
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <label class="control-label">Nombre:</label>
                                                        <input type="text" name="name" class="form-control input_user @error('name') is-invalid @enderror" value="{{$usuario->name}}"  placeholder="Nombre" required>
                                                        @error('name') 
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{$message}}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-12">
                                                        <label class="control-label">Email:</label>
                                                        <input type="email" name="email" class="form-control input_user "  placeholder="email" value="{{$usuario->email}}" readonly required>
                                                        
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <!-- Botones de acción del modal -->
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                                  </div>
                                            </form>
                                    
                                        </div>
                                    </div>
                                    </div>
                                </div> --}}
                                {{--
                                <!--Boton del Segundo Modal-->
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal2{{$usuario->id}}">
                                    <i class="fas fa-trash"></i>
                                  </button>
                                  <!--Segundo  Modal -->
                                  <div class="modal fade" id="exampleModal2{{$usuario->id}}" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                                    <div class="modal-dialog modalperrito" >
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">{{$usuario->id}}</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                          <p>
                                            ¿Está seguro de eliminar al usuario: {{$usuario->name}}?
                                          </p>
                                          <p>Correo: {{$usuario->email}}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{route('usuario.destroy',$usuario->id)}}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger"><i class="fas fa-check-square"></i>SI</button>
                                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><i class="fas fa-times-circle"></i>No</button>
                                              </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody> --}}
                <tbody>

                </tbody>
                
            </table>
            {{--$usuarios->links()--}}
            </div>
          </div>
        </div>
        
      </div>
    
    <!-- Modal Ver detalles-->
    <div class="modal fade" id="modalVerDetalle" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <p class="col">id de usuario: </p>
                    <p id="ver_id" class="col"></p>
                </div>
                <div class="row">
                    <p class="col">Nombre de usuario:</p>
                    <p id="ver_nombre" class="col"></p>
                </div>
                <div class="row">
                    <p class="col">Email de usuario:</p>
                    <p id="ver_email" class="col"></p>
                </div>
                <div class="row">
                    <p class="col">Fecha de registro de usuario: </p>
                    <p id="ver_fecha_registro" class="col"></p>
                </div>
                <div class="row">
                    <p class="col">Fecha de actualización de usuario: </p>
                    <p id="ver_fecha_update" class="col"></p>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>
    
</div>
@endsection

@section('script')
<script>
    //para cerrar el mensaje
    setTimeout(function () {
        //selecciono el id mensaje y lo remuevo en 2000 segundos
        document.querySelector('#mensaje').remove();
        
    }, 2000);
</script>
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
            timer: 3000
        });
        var table = $('#table-users').DataTable({
            responsive: true, // Habilitar la opción responsive
            autoWidth: false,
            searchDelay : 2000,
            processing: true,
            serverSide: true,
            "language": {
            "lengthMenu": "Mostrar _MENU_ registros por página",
            "zeroRecords": "Nada encontrado - disculpa",
            "info": "Mostrando la página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar:",
            "paginate":{
                "next" : "Siguiente",
                "previous" : "Anterior"
            }
            },

            order: [
                [0, "asc"]
            ],
            ajax: "{{ route('usuario.index') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: null,
                    name: 'name',
                    'render': function(data, type, row) {
                        return @can('users.show') data.action3 +' '+ @endcan ''
                            @can('users.edit') + data.action1 +' '+ @endcan ''
                            @can('users.destroy') +data.action2 @endcan;
                    }
                }
            ]
        });


        $('#saveBtn').click(function(e) {
            e.preventDefault();
            name = $("#name").val();
            email = $("#email").val();
            contra = $("#password").val();
            confirmacontra = $("#confipassword").val();
            if (name == '' || email == ''  || contra=='' || confirmacontra=='') {
                Toast.fire({
                        type: 'error',
                        title: 'Complete todos los campos por favor'
                    })
                return false;
            }
            $.ajax({
                data: $('#UsuarioForm').serialize(),
                url: "{{ route('usuario.store') }}",
                type: "POST",
                dataType: 'json',
                success: function(data) {
                    console.log('Success:', data);
                    Toast.fire({
                        type: 'success',
                        title: data.success
                    })
                    $('#UsuarioForm').trigger("reset");
                    table.draw();
                },
                error: function(data) {
                    console.log('Error:', data);
                    Toast.fire({
                        type: 'error',
                        title: 'Usuario fallo al Registrarse.'
                    })
                }
            });
        });
        $('body').on('click', '.editUsuario', function() {
            var Usuario_id = $(this).data('id');
            window.location.href = "/usuario/"+Usuario_id+"/edit";
        });

        
        $('body').on('click', '.deleteUsuario', function() {

            var Usuario_id_delete = $(this).data("id");
            $confirm = confirm("¿Estás seguro de que quieres eliminarlo?");
            if ($confirm == true) {
                $.ajax({
                    type: "DELETE",
                    
                    url: '{{ route('usuario.destroy', ['usuario' => ':usuario']) }}'.replace(':usuario', Usuario_id_delete),
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        table.draw();
                        Toast.fire({
                            type: 'success',
                            title: String(data.success)
                        });

                    },
                    error: function(data) {
                        console.log('Error:', data);
                        Toast.fire({
                            type: 'error',
                            title: 'Usuario fallo al Eliminarlo.'
                        })
                    }
                });
            }
        });

        $('body').on('click', '.eyeUsuario', function() {
            var Usuario_id_ver = $(this).data('id');
            $('#modalVerDetalle').modal('show');
            $.get('{{ route('usuario.show', ['usuario' => ':usuario']) }}'.replace(':usuario', Usuario_id_ver),
                function(data) {
                    console.log(data);
                    $('#ver_id').text(data.data.id);
                    $('#ver_nombre').text(data.data.name);
                    $('#ver_email').text(data.data.email);
                    $('#ver_fecha_registro').text(moment(data.data.created_at).format('YYYY-MM-DD HH:mm:ss'));
                    $('#ver_fecha_update').text(moment(data.data.updated_at).format('YYYY-MM-DD HH:mm:ss'));

                })
           
        });
        
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

@endsection
