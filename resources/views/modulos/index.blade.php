@extends('plantillas.plantilla')
@section('titulo')
Academia s.a.
@endsection
@section('cabecera')
Gestion de Modulos
@endsection
@section('contenido')
@if($text=Session::get('mensaje'))
<p class="alert alert-danger my-3">{{$text}}</p>
@endif
<a href="{{route('modulos.create')}}" class="btn btn-success mt-3 mb-3">Crear Modulo</a>
<form name="search" method="get" action="{{route('modulos.index')}}"
 class="form-inline float-right">

 <select name="alumno_id" class="form-control" onchange="this.form.submit()">
  <option value="%">Todos</option>
 @foreach ($alumnos as $al)
   @if ($al->id==$request->alumno_id)
     <option value="{{$al->id}}" selected>{{$al->nombre}}</option>

   @else

   <option value="{{$al->id}}">{{$al->nombre}}</option>
   @endif
 @endforeach

</select>
<input type="submit" class="btn btn-info ml-2" value="Buscar">
</form>
<div class="container">
    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Horas</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($modulos as $modulo)
            <tr> 
                <th scope="row"><a href="{{route('modulos.show',$modulo)}}" class="btn btn-info">Detalles</a></th>
                <td>{{$modulo->id}}</td>
                <td>{{$modulo->nombre}}</td>
                <td>{{$modulo->horas}}</td>
                <td>
                    <form action="{{route('modulos.destroy',$modulo)}}" class="form-inline" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Borrar" class="btn btn-danger" onclick="return confirm('¿Seguro que quieres borrar?')">
                        <a href="{{route('modulos.edit',$modulo)}}" class="btn btn-warning">Editar</a>
                    </form>
                </td>
            </tr>
          @endforeach
        </tbody>
      </table>
</div>
{{$modulos->appends(Request::except('page'))->links()}}
@endsection