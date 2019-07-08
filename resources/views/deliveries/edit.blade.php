@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <h2>Actualizar Entrega</h2>
                <form method="post" action="{{route('deliveries.update', $delivery->id)}}">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="register_date">Fecha Registro</label>
                        <input type="date" class="form-control" id="register_date" name="register_date" value="{{$delivery->register_date}}" readOnly>
                    </div>
                    <div class="form-group">
                        <label for="delivery_date">Fecha Entrega</label>
                        <input type="date" class="form-control" id="delivery_date" name="delivery_date" value="{{$delivery->delivery_date}}">
                    </div>
                    <div class="form-group">
                        <label for="destine">Destino</label>
                        <input type="text" class="form-control" id="destine" name="destine" value="{{$delivery->destine}}">
                    </div>
                    <div class="form-group">
                        <label for="sale_id">Orden</label>
                        <select class="form-control" id="sale_id" name="sale_id" value="{{$delivery->sale_id}}" readOnly>
                            @foreach($sales as $row)
                                <option value="{{$row->id}}">{{$row->code}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="administrative_id">Administrativo</label>
                        <select class="form-control" id="administrative_id" name="administrative_id">
                            <option value="0">Realizar entrega</option>
                            @foreach($administratives as $row)
                                <option value="{{$row->id}}">{{$row->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Crear</button>
                </form>
            </div>
        </div>

    </div>
@endsection