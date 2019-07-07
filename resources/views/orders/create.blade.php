@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <h2>Registrar Producto</h2>
                <form method="post" action="{{route('products.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Codigo</label>
                        <input type="number" class="form-control" id="code" name="code" min="0" max="9999999" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Marca</label>
                        <input type="text" class="form-control" id="brand" name="brand" maxlength="25" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Modelo</label>
                        <input type="text" class="form-control" id="model" name="model" maxlength="25" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Precio de Compra</label>
                        <input type="number" class="form-control" id="purchase_price" name="purchase_price" min="0" max="99999999" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Precio de Venta</label>
                        <input type="number" class="form-control" id="sale_cost" name="sale_cost" min="0" max="99999999" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Categoria del producto</label>
                        <select class="form-control" id="category_id" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->description}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Crear</button>
                </form>
            </div>
        </div>

    </div>
@endsection