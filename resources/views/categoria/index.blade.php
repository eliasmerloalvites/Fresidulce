@extends('layout.plantilla1')

@section('titulo','Categorias')

@section('contenido')
<div class="container">
    <div class="row ">
        <div class="col-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">CREAR CATEGORIAS</h5>
                    <p class="card-text"></p>
                    <form  method="POST" action="{{route('categoria.store')}}" >
                        @csrf
                            <div class="form-group row">
                                <div class="col-12">
                                    <label class="control-label">Nombre:</label>
                                    <input type="text" id="CAT_Nombre" name="CAT_Nombre"  placeholder="Nombre" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label class="control-label">Clase:</label>
                                    <select class="form-control select2 select2-info" id="CLA_Id" name="CLA_Id"
                                    data-dropdown-css-class="select2-info" onchange="verName()" style="width: 100%;">
                                    <option value="">Seleccionar ...</option>
                                    @foreach ($Clase as $itemClase)
                                        <option value="{{ $itemClase->CLA_Id }}"> {{ $itemClase->CLA_Nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <p></p>                           
                            <button class="btn btn-primary"><i class="fas fa-save"></i>Guardar</button>                           
                    </form>
                </div>
            </div>
        </div>
        <div class="col-7">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">LISTA DE CATEGORIAS</h5>
                  <p class="card-text">
                    
                    <table class="table" id="">
                        <thead style="background-color:#1C91EC;color: #fff;">
                        <tr>
                          <th scope="col">Id</th>
                          <th scope="col">Nombre</th>
                          <th scope="col">Clase</th>
                          <th scope="col">Opciones</th>
                        </tr>
                        </thead>
                       <tbody>
                        @foreach($Categoria as $itemCategoria)
                        <tr>
                            <td>{{$itemCategoria->CAT_Id}}</td>
                            <td>{{$itemCategoria->CAT_Nombre}}</td>
                            <td>{{$itemCategoria->CLA_Nombre}}</td>
                        </tr>
                        @endforeach
                       </tbody>
                    </table>
                
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection