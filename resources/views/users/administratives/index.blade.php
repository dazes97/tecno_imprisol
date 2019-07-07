@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <a href="{{route('administratives.create')}}">
            <button type="button" class="btn btn-primary">Registrar Administrativo</button>
        </a>
        <br>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre Completo</th>
                <th scope="col">Telefono</th>
                <th scope="col">Fecha de Ingreso</th>
                <th scope="col">Opciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($administratives as $administrative)
            <tr>
                <th>{{$administrative->id}}</th>
                <th>{{$administrative->name}}</th>
                <th>{{$administrative->phone}}</th>
                <th>{{$administrative->date_admission}}</th>
                <td>
                    <a href="{{route('administratives.edit',$administrative->id)}}"><button type="button" class="btn btn-warning">editar</button></a>
                    <form action="{{route('administratives.destroy',$administrative->id)}}" method="post">
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
