@extends('layouts.app')

@section('content')
<div class="container">
<!-- mostrando mensaje  -->
@if(Session::has('mensaje'))
<div class="alert alert-info alert-dismissible" role="alert">

{{ Session::get('mensaje') }}

<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>

</div>

@endif




<a href="{{ url('empleado/create/') }}" class="btn btn-success ">Registrar nuevo empleado</a>
<br>
<br>
<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Alias</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
    @foreach( $empleados as $empleado)
        <tr>
            <td>{{ $empleado->id }}</td>

            <td>
            <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$empleado->foto }}" width="100" alt="">
            </td>
            
            <td>{{ $empleado->alias }}</td>
            <td>{{ $empleado->Nombre }}</td>
            <td>{{ $empleado->ApellidoPaterno }}</td>
            <td>{{ $empleado->ApellidoMaterno }}</td>
            <td>{{ $empleado->Correo }}</td>
            <td>

            <a href="{{ url('/empleado/'.$empleado->id.'/edit') }}" class="btn btn-warning">
            Editar
            </a>
             |
<!-- Botton para eliminar  -->
            <form action="{{ url('empleado/'.$empleado->id) }}"class="d-inline" method="post">
            @csrf
            {{ method_field('DELETE') }}
            <input class="btn btn-danger" type="submit" onclick="return confirm('Deseas Borrar?')" value="Borrar">
            </form>
            </td>

        </tr>
    @endforeach
    </tbody>

</table>
{!! $empleados->links() !!}
</div>
@endsection