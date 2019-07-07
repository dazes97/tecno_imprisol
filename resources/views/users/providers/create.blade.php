@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <h2>Registrar Proveedor</h2>
                <form method="post" action="{{route('providers.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="Codigo">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required maxlength="50">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Contraseña</label>
                        <input type="password" class="form-control" id="password" password="name" required maxlength="50">
                    </div>
                    <div class="form-group">
                        <label for="Codigo">Codigo</label>
                        <input type="number" class="form-control" id="code" name="code" min="0" max="999999999"  required>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" required minlength="1" maxlength="50">
                    </div>
                    <div class="form-group">
                        <label for="Telefono">Telefono</label>
                        <input type="number" class="form-control" id="phone" name="phone" min="0" max="99999999" required>
                    </div>
                    <div class="form-group">
                        <label for="Direccion">Direccion</label>
                        <input type="text" class="form-control" id="address" name="address" maxlength="50" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Crear</button>
                </form>
            </div>
        </div>

    </div>
@endsection