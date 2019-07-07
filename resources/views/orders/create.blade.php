@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <h2>Registrar Orden</h2>
                <form method="post" action="{{route('orders.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Codigo</label>
                        <input type="text" class="form-control" id="code" name="code" maxlength="10" value="{{Auth()->user()->getStrRandom()}}" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Descripcion</label>
                        <input type="text" class="form-control" id="description" name="description" maxlength="50" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre"><strong>Productos</strong></label>
                        @foreach($products as $product)
                            <div class="form-check">
                                <input class="form-check-input" name="products[]" type="checkbox" value="{{$product->id}}">
                                <label class="form-check-label" for="defaultCheck1">
                                    {{"Nombre: ".$product->model}}
                                    <br>
                                    {{"Marca: ".$product->brand}}
                                    <br>
                                    {{"Precio: ".$product->sale_cost}}
                                </label>
                                <br>
                            </div>
                            <label for="nombre"><strong>Cantidad</strong></label>
                            <input type="number" class="form-control" id="quantity{{$product->id}}" name="quantity{{$product->id}}" min="1" max="50">
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-primary">Crear Orden</button>
                </form>
            </div>
        </div>

    </div>
@endsection