@extends('layout.app')

@section('content')
    <div class="container-fluid">
        <a href="{{route('administratives.create')}}">
            <button type="button" class="btn btn-primary">Registrar Administrativo</button>
        </a>
        <br>
        <script type="javascript">
            $(document).ready(function() {
                $('#example1').DataTable();
            } );
        </script>
        <table id="example1" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th class="th-sm">Id</th>
                <th class="th-sm">Nombre Completo</th>
                <th class="th-sm">Telefono</th>
                <th class="th-sm">Fecha de Ingreso</th>
                <th class="th-sm">Opciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($administratives as $administrative)
            <tr>
                <td>{{$administrative->id}}</td>
                <td>{{$administrative->name}}</td>
                <td>{{$administrative->phone}}</td>
                <td>{{$administrative->date_admission}}</td>
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
        {{Auth()->user()->count(1)}}
        <p><strong>Cantidad de Visitas: {{Auth()->user()->getCount(1)}}</strong></p>
    </div>
@endsection
