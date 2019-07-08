@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2>Registrar Compra</h2>
                <form method="post" action="{{route('purchases.store')}}">
                    @csrf
                    <div class="row col-12">
                        <div class="form-group col-3">
                            <label for="code">Codigo</label>
                            <input type="text" class="form-control" id="code" name="code">
                        </div>
                        <div class="form-group col-3">
                            <label for="date">Fecha Emision</label>
                            <input type="date" class="form-control" id="date" name="date">
                        </div>
                        <div class="form-group col-3">
                            <label for="total_cost">Costo total</label>
                            <input type="number" class="form-control" id="total_cost" name="total_cost">
                        </div>
                        <div class="form-group col-3">
                            <label for="provider_id">Proveedor</label>
                            <select class="form-control" id="provider_id" name="provider_id">
                                @foreach($providers as $row)
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>  
                    
                    <div class="row form-group col-lg-12">
                    @foreach($products as $row)
                        <div class="form-group col-3">
                            <label for="product_id">Producto</label>
                            <input type="hidden" class="form-control" id="product_id" name="product_id[]" value="{{$row->id}}">
                            <input type="text" class="form-control" id="product_name" name="product_name" value="{{$row->name}}" readonly>
                        </div>
                        <div class="form-group col-3">
                            <label for="description">Descripcion</label>
                            <input type="text" class="form-control" id="description" name="description[]">
                        </div>
                        <div class="form-group col-3">
                            <label for="quantity">Cantidad</label>
                            <input type="number" class="form-control" id="quantity" name="quantity[]">
                        </div>
                        <div class="form-group col-3">
                            <label for="cost">Costo</label>
                            <input type="number" class="form-control" id="cost" name="cost[]">
                        </div>
                    @endforeach
                    </div>
                    <button type="submit" class="btn btn-primary">Crear</button>
                </form>
            </div>
        </div>

    </div>
@endsection