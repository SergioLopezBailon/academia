@extends('plantillas.plantilla')

@section('titulo')
    Alumnos
@endsection

@section('cabecera')
    Editar Alumnos
@endsection

@section('contenido')
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $miError)
            <li>{{$miError}}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card bg.secondary">
    <div class="card-header">Editar Alumno</div>
    <div class="card-body">
        <form name="g" action="{{route('alumnos.update',$alumno)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="col">
                <label for="nom" class="col-form-label">Nombre</label>
            <input type="text" class="form-control" value="{{$alumno->nombre}}" name="nombre" id="nom" required>
            </div>                <div class="col">
                <label for="ape" class="col-form-label">Apellidos</label>
                <input type="text" class="form-control" value="{{$alumno->apellidos}}" name="apellidos" id="ape" required>
            </div>
        </div>
        <div class="form-row mt-3">
            <div class="col">
                <label for="mail" class="col-form-label">E-Mail</label>
                <input type="mail" value="{{$alumno->mail}}" class="form-control" name="mail" id="mail" required>
            </div>
            <div class="col">
                <label for="foto" class="col-form-label">Imagen</label>
            <img src="{{asset($alumno->foto)}}" width="40vw" height="40vh" class='rounded-circle mr-3 float-right'>
                <input type="file" name="foto" class="form-control" accept="image/*">
            </div>
        </div>
        <div class="form-row mt-3">
            <div class="col">
                <input type="submit" value="Editar" class="btn btn-success mr-3">
                <input type="reset" value="Limpiar campos" class="btn btn-warning mr-3">
            <a href="{{route('alumnos.index')}}" class="btn btn-info">Volver</a>
            </div>
        </div>
        </form>
    </div>
</div>

@endsection