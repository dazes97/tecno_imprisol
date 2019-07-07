@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <a href="{{route('products.create')}}">
            <button type="button" class="btn btn-primary">Registrar Producto</button>
        </a>
        <a href="{{route('report.product')}}">
            <button type="button" class="btn btn-primary">Generar Reporte</button>
        </a>
        <br>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Codigo</th>
                <th scope="col">Marca</th>
                <th scope="col">Modelo</th>
                <th scope="col">Precio de Compra</th>
                <th scope="col">Precio de Venta</th>
                <th scope="col">Categoria</th>
                <th scope="col">Opciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
            <tr>
                <th>{{$product->id}}</th>
                <th>{{$product->code}}</th>
                <th>{{$product->brand}}</th>
                <th>{{$product->model}}</th>
                <th>{{$product->purchase_price}}</th>
                <th>{{$product->sale_cost}}</th>
                <th>{{$product->category->description}}</th>
                <td>
                    <a href="{{route('products.edit',$product->id)}}"><button type="button" class="btn btn-warning">editar</button></a>
                    <form action="{{route('products.destroy',$product->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" class="btn btn-danger" value="eliminar">
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection
