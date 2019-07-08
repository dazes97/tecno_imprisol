@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <h2>Registrar Entrega</h2>
                <form method="post" action="{{route('deliveries.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="code">Codigo</label>
                        <input type="text" class="form-control" id="code" name="code">
                    </div>
                    <div class="form-group">
                        <label for="register_date">Fecha Registro</label>
                        <input type="date" class="form-control" id="register_date" name="register_date">
                    </div>
                    <div class="form-group">
                        <label for="delivery_date">Fecha Entrega</label>
                        <input type="date" class="form-control" id="delivery_date" name="delivery_date">
                    </div>
                    <div class="form-group">
                        <label for="destine">Destino</label>
                        <input type="text" class="form-control" id="destine" name="destine">
                    </div>
                    <div class="form-group">
                        <label for="sale_id">Orden</label>
                        <select class="form-control" id="sale_id" name="sale_id">
                            @foreach($sales as $row)
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