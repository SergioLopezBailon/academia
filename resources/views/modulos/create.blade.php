@extends('plantillas.plantilla')
@section('titulo')
Academia s.a.
@endsection
@section('cabecera')
Crear Modulo
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
    <form name="g" action="{{route('modulos.store')}}" method='POST'>
        @csrf
        <div class="form-row">
            <div class="col">
                <label for="nom" class="col-form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" placeholder="Nombre" id="nom" required>
            </div>
            <div class="col">
                <label for="ape" class="col-form-label">Horas</label>
                <input type="number" name="horas" class="form-control" placeholder="Horas" id="hora" required>
            </div>
        </div>
        <div class="form-row mt-3">
            <div class="col">
                <input type="submit" value="Crear" class="btn btn-success mr-3">
                <input type="reset" value="Limpiar" class="btn btn-warning mr-3">
            <a href="{{route('modulos.index')}}" class="btn btn-info">Volver</a>   
    </form>
@endsection