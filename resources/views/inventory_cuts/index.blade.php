@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <a href="{{route('inventories.create')}}">
            <button type="button" class="btn btn-primary">Registrar Corte de Inventario</button>
        </a>
        <!--<a href="{{route('report.product')}}">
            <button type="button" class="btn btn-primary">Generar Reporte</button>
        </a>-->
        <br>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Nro</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Fecha</th>
                <th scope="col">Administrativo</th>
                <th scope="col">Opciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($inventories as $key => $row)
            <tr>
                <th>{{$key + 1}}</th>
                <th>{{$row->description}}</th>
                <th>{{$row->date}}</th>
                <th>{{$row->administrative_id}}</th>
                <td>
                    <a href="{{ route('inventories.edit', $row->id) }}">
                        <button type="button" class="btn btn-warning">editar</button>
                    </a>
                    <form action="{{ route('inventories.destroy', $row->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" class="btn btn-danger" value="eliminar">
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {{Auth()->user()->count(4)}}
        <p><strong>Cantidad de Visitas: {{Auth()->user()->getCount(4)}}</strong></p>
    </div>
@endsection
