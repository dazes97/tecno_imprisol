@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <h2>Registrar Venta</h2>
                <form method="post" action="{{route('sales.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="code">Codigo</label>
                        <input type="text" class="form-control" id="code" name="code">
                    </div>
                    <div class="form-group">
                        <label for="date">Fecha Emision</label>
                        <input type="date" class="form-control" id="date" name="date">
                    </div>
                    <div class="form-group">
                        <label for="total_amount">Monto Total</label>
                        <input type="text" class="form-control" id="total_amount" name="total_amount">
                    </div>
                    <div class="form-group">
                        <label for="order_id">Pedido</label>
                        <select class="form-control" id="order_id" name="order_id">
                            @foreach($orders as $row)
                                <option value="{{$row->id}}">{{$row->code}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Crear</button>
                </form>
            </div>
        </div>

    </div>
@endsection