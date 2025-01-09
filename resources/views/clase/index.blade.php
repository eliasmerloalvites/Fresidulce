@extends('layout.plantilla1')

@section('titulo', 'Clases')

@section('contenido')
    <div class="container">
        <div class="row ">
            <div class="col-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">CREAR CLASE</h5>
                        <p class="card-text"></p>
                        <form method="POST" action="{{ route('clase.store') }}">
                            @csrf
                            <div class="form-group row">
                                <div class="col-12">
                                    <label class="control-label">Nombre:</label>
                                    <input type="text" id="CLA_Nombre" name="CLA_Nombre" placeholder="Nombre" required>
                                </div>
                            </div>
                            <p></p>
                            <button class="btn btn-primary"><i class="fas fa-save"></i>Guardar</button>
                            <a href="{{route('cancelarClase')}}"><button type="reset" id="" class="btn btn-danger"> <i class="fas fa-ban"></i>Cancelar
                            </button></a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-7">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">LISTA DE CLASES</h5>
                        <p class="card-text">
                        <table class="table" id="">
                            <thead style="background-color:#1C91EC;color: #fff;">
                                <tr>
                                    <th scope="col">N°</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($Clase as $itemClase)
                                <tr>
                                    <td>{{$itemClase->CLA_Id}}</td>
                                    <td>{{$itemClase->CLA_Nombre}}</td>
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
