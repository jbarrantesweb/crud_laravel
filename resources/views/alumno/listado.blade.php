@extends("alumno.layout")

@section("titulo")
    <h2>Listado de alumnos</h2>
@endsection

@section("opciones")
    <div class="col-12">
        <a href="{{route('alumno.create')}}" class="btn btn-success mb-2">Agregar</a>
        @endsection
        @isset($msj)
        @section("mensaje")
            <h2 class="alert-info">{{$msj}}</h2>
        @endsection
        @endisset
        @section("contenido")
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Dni</th>
                    <th>Direccion</th>
                    <th>Teléfono</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
                </thead>
                <tbody>
                @foreach($alumnos as $alumno)
                    <tr>
                        <td>{{$alumno->nombre}}</td>
                        <td>{{$alumno->dni}}</td>
                        <td>{{$alumno->direccion}}</td>
                        <td>{{$alumno->telefono}}</td>
                        <td>
                            <a class="btn btn-warning" href="{{route('alumno.edit',[$alumno])}}">
                                <i class="fa fa-edit"></i>
                                Modificar
                            </a>
                        </td>
                        <td>
                            <form action="{{route('alumno.destroy', [$alumno])}}" method="post">
                                @method("delete")
                                @csrf
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                    Borrar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
@endsection

