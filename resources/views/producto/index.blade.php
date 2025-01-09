@extends('layout.plantilla1')

@section('titulo','Productos')

@section('contenido')
<div class="container">
    <div class="row ">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">CREAR PRODUCTO</h5>
                    <p class="card-text"></p>
                    <form  id="PermisoForm" name="PermisoForm" action="" >
                        @csrf
                
                            <div class="form-group row">
                                <div class="col-12">
                                    <input type="text" id="permiso_id_edit" hidden>
                                    <label class="control-label">Nombre:</label>
                                    <input type="text" id="nombre" name="nombre" class="form-control input_user @error('nombre') is-invalid @enderror"  placeholder="Nombre" required>

                                </div>
                                <div class="col-12">
                                    <input type="text" id="permiso_id_edit" hidden>
                                    <label class="control-label">Descripción:</label>
                                    <input type="text" id="nombre" name="nombre" class="form-control input_user @error('nombre') is-invalid @enderror"  placeholder="Nombre" required>
                                   
                                </div>
                                <div class="col-12">
                                    <input type="text" id="permiso_id_edit" hidden>
                                    <label class="control-label">Precio de Compra:</label>
                                    <input type="text" id="nombre" name="nombre" class="form-control input_user @error('nombre') is-invalid @enderror"  placeholder="Nombre" required>
                                   
                                </div>
                                <div class="col-12">
                                    <input type="text" id="permiso_id_edit" hidden>
                                    <label class="control-label">Precio de Venta:</label>
                                    <input type="text" id="nombre" name="nombre" class="form-control input_user @error('nombre') is-invalid @enderror"  placeholder="Nombre" required>
                                   
                                </div>
                                <div class="col-12">
                                    <input type="text" id="permiso_id_edit" hidden>
                                    <label class="control-label">Marca:</label>
                                    <input type="text" id="nombre" name="nombre" class="form-control input_user @error('nombre') is-invalid @enderror"  placeholder="Nombre" required>
                                   
                                </div>
                                <div class="col-12">
                                    <input type="text" id="permiso_id_edit" hidden>
                                    <label class="control-label">Estado:</label>
                                    <input type="text" id="nombre" name="nombre" class="form-control input_user @error('nombre') is-invalid @enderror"  placeholder="Nombre" required>
                                   
                                </div>
                            </div>
                        
                            <p></p>
                            
                            
                            <button id="" class="btn btn-primary"><i class="fas fa-save"></i>Guardar</button>
                            
                           
                            <button id="" name="updateBtn" class="btn btn-info" disabled><i class="fas fa-save"></i>Actualizar</button>
                           
                            <button type="reset" id="" class="btn btn-danger"> <i class="fas fa-ban"></i>Cancelar </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">LISTA DE PRODUCTOS</h5>
                  <p class="card-text">
                    
                    <table class="table" id="">
                        <thead style="background-color:#1C91EC;color: #fff;">
                        <tr>
                          <th scope="col">Id</th>
                          <th scope="col">Nombre</th>
                          <th scope="col">Descripción</th>
                          <th scope="col">Precio de Compra</th>
                          <th scope="col">Precio de Venta</th>
                          <th scope="col">Marca</th>
                          <th scope="col">Estado</th>
                          <th scope="col">Link</th>
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