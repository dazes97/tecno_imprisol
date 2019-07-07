@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <h2>Editar Proveedor</h2>
        <form method="post" action="{{route('providers.update',$provider->id)}}">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="nombre">Codigo</label>
                <input type="number" class="form-control" id="code" name="code" value="{{$provider->code}}" min="1" max="9999999" required>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$provider->name}}" minlength="1" maxlength="50" required>
            </div>
            <div class="form-group">
                <label for="telefono">Telefono</label>
                <input type="number" class="form-control" id="phone" name="phone" value="{{$provider->phone}}" min="0" max="99999999" required>
            </div>
            <div class="form-group">
                <label for="fecha">Direccion</label>
                <input type="text" class="form-control" id="address" name="address" value="{{$provider->address}}" required>
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
    </div>
@endsection
