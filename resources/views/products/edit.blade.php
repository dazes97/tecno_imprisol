@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <h2>Editar Producto</h2>
        <form method="post" action="{{route('products.update',$product->id)}}">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="nombre">Codigo</label>
                <input type="number" class="form-control" id="code" name="code" value="{{$product->code}}">
            </div>
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$product->code}}">
            </div>
            <div class="form-group">
                <label for="nombre">Marca</label>
                <input type="text" class="form-control" id="brand" name="brand" value="{{$product->brand}}">
            </div>
            <div class="form-group">
                <label for="nombre">Modelo</label>
                <input type="text" class="form-control" id="model" name="model" value="{{$product->model}}">
            </div>
            <div class="form-group">
                <label for="telefono">Precio de Compra</label>
                <input type="number" class="form-control" id="purchase_price" name="purchase_price" value="{{$product->purchase_price}}">
            </div>
            <div class="form-group">
                <label for="telefono">Precio de Venta</label>
                <input type="number" class="form-control" id="sale_cost" name="sale_cost" value="{{$product->sale_cost}}">
            </div>
            <div class="form-group">
                        <label for="stock">Stock</label>
                        <input type="number" class="form-control" id="stock" name="stock">
                    </div>
            <div class="form-group">
                <label for="telefono">Categoria del producto</label>
                <select class="form-control" id="category_id" name="category_id">
                    <option  selected value="{{$product->category->id}}">{{$product->category->description}}</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->description}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
    </div>
@endsection
