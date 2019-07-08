@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <h2>Registrar Entrega</h2>
                <form method="post" action="{{route('inventories.store')}}">
                    @csrf
                    <div class="row">
                        <div class="form-group col-4">
                            <label for="date">Fecha</label>
                            <input type="date" class="form-control" id="date" name="date">
                        </div>
                        <div class="form-group col-4">
                            <label for="description">Descripcion</label>
                            <input type="text" class="form-control" id="description" name="description">
                        </div>
                    </div>
                    
                    @foreach($products as $row)
                    <div class="row">
                        <div class="form-group col-4">
                            <label for="product_id">Producto</label>
                            <input type="hidden" class="form-control" id="product_id" name="product_id[]" value="{{$row->id}}">
                            <input type="text" class="form-control" id="product_name" name="product_name" value="{{$row->name}}" readonly>
                        </div>
                        <div class="form-group col-4">
                            <label for="previous_stock">Stock Anterior</label>
                            <input type="number" class="form-control" id="previous_stock" name="previous_stock[]" value="{{$row->stock}}" readonly>
                        </div>
                        <div class="form-group col-4">
                            <label for="new_stock">Stock Actual</label>
                            <input type="number" class="form-control" id="new_stock" name="new_stock[]">
                        </div>
                    </div>
                    @endforeach
                    <button type="submit" class="btn btn-primary">Crear</button>
                </form>
            </div>
        </div>

    </div>
@endsection