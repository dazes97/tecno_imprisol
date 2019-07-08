@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <a href="{{route('clients.create')}}">
            <button type="button" class="btn btn-primary">Registrar Cliente</button>
        </a>
        <br>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre Completo</th>
                <th scope="col">Telefono</th>
                <th scope="col">Opciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($clients as $client)
            <tr>
                <th>{{$client->id}}</th>
                <th>{{$client->name}}</th>
                <th>{{$client->phone}}</th>
                <td>
                    <a href="{{route('clients.edit',$client->id)}}"><button type="button" class="btn btn-warning">editar</button></a>
                    <form action="{{route('clients.destroy',$client->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" class="btn btn-danger" value="eliminar">
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {{Auth()->user()->count(1)}}
        <p><strong>Cantidad de Visitas: {{Auth()->user()->getCount(1)}}</strong></p>

    </div>
@endsection
