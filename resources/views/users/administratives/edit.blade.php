@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <h2>Editar Administrativo</h2>
        <form method="post" action="{{route('administratives.update',$administrative->id)}}">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$administrative->name}}" required>
            </div>
            <div class="form-group">
                <label for="telefono">Telefono</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{$administrative->phone}}" required>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha de Admision</label>
                <input type="date" class="form-control" id="date_admission" name="date_admission" value="{{$administrative->date_admission}}" required>
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
    </div>
@endsection
