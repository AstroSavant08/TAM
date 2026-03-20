@extends('layout')
@section('title','Edición Usuario')
@section('content')
    <h3 class="mt-4 mb-3">Editar Usuario</h3>
    <form id="form" action="{{route('usuarios.update',$datos->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="name" class="form-control" placeholder="name " 
                value="{{ old('name', $datos->name) }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="genero" class="form-control" placeholder="Genero" 
                value="{{ old('genero', $datos->genero) }}">
                @error('genero')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <input type="date" name="fecha_nacimiento" class="form-control" placeholder="Fecha de nacimiento" 
                value="{{ old('fecha_nacimiento', $datos->fecha_nacimiento) }}">
                @error('fecha_nacimiento')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="" class="form-control" placeholder="" 
                value="{{ old('password', $datos->password) }}">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="email" class="form-control" placeholder="Email" 
                value="{{ old('email', $datos->email) }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="ciudad" class="form-control" placeholder="Ciudad" 
                value="{{ old('ciudad', $datos->ciudad) }}">
                @error('ciudad')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="direccion" class="form-control" placeholder="Direccion" 
                value="{{ old('direccion', $datos->direccion) }}">
                @error('direccion')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="telefono" class="form-control" placeholder="Telefono" 
                value="{{ old('telefono', $datos->telefono) }}">
                @error('telefono')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="estado" class="form-control" placeholder="Estado" 
                value="{{ old('estado', $datos->estado) }}">
                @error('estado')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="rol" class="form-control" placeholder="admin o particular" 
                value="{{ old('rol', $datos->rol) }}">
                @error('rol')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <br>
        <button class="btn btn-success">Guardar</button>
        <a href="{{ url('usuarios') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@stop()
<!-- @section('js')
    <script src="{{ url('js/jquery.validate.min.js') }}"></script>
    <script src="{{ url('js/localization/messages_es.min.js') }}"></script>

    <script>
        $("#form").validate({
            rules: {
                name: {
                    required: true,
                    maxlength: 100
                },
                tipo: {
                    required: true,
                    maxlength: 50
                },
                serial: {
                    required: true,
                    maxlength: 11,
                    max: 2147483647
                },
                pas: {
                    required: true,
                    maxlength: 100
                }
            }
        });
    </script>
@stop() -->