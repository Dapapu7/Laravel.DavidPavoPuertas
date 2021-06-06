@extends('layouts.app')

@section('content')
<div class="container">



    @if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ Session::get('mensaje') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    


<a href="{{ url('cliente/create') }}" class="btn btn-success">Crear Cliente</a>
<a href="{{ url('ticket') }}" class="btn btn-success">Tickets</a>
<br>
<br>

<table class="table table-light" style="background-color: #C7C6C1;">

    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Teléfono</th>
            <th>Email</th>
            <th>DNI</th>
            <th>Dirección</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
    @foreach( $clientes as $cliente)
        <tr>
            <td>{{ $cliente->idCliente }}</td>
            <td>
                <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$cliente->foto }}" width="100" alt="">
            </td>
            <td>{{ $cliente->nombre }}</td>
            <td>{{ $cliente->apellido }}</td>
            <td>{{ $cliente->numero_telefono }}</td>
            <td>{{ $cliente->email }}</td>
            <td>{{ $cliente->dni }}</td>
            <td>{{ $cliente->direccion }}</td>
            <td>
            
                <a href="{{ url('/cliente/'.$cliente->idCliente.'/edit') }}" class="btn btn-warning">Editar</a>
            
                | 

                <form action="{{ url('/cliente/'.$cliente->idCliente) }}" class="d-inline" method="post">
                @csrf
                {{method_field('DELETE')}}
                    <input type="submit" class="btn btn-danger" onclick="return confirm('¿Quieres borrar este cliente?')" value="Borrar">
                </form>

            </td>
        </tr>
    @endforeach
    </tbody>

</table>
{!! $clientes->links() !!}
</div>
@endsection