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


<a href="{{ url('ticket/create') }}" class="btn btn-success">Crear Ticket</a>
<a href="{{ url('cliente') }}" class="btn btn-success">Clientes</a>
<br>
<br>

<table class="table table-light" style="background-color: #C7C6C1;">

    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Tipo</th>
            <th>Precio</th>
            <th>Fecha</th>
            <th>CIF</th>
            <th>Cliente</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
    @foreach( $tickets as $ticket )
        <tr>
            <td>{{ $ticket->idTicket }}</td>
            <td>{{ $ticket->tipo }}</td>
            <td>{{ $ticket->precio }}€</td>
            <td>{{ $ticket->fecha }}</td>
            <td>{{ $ticket->cif }}</td>
            <td>{{ $ticket->clientes_id }}</td>
            <td>
            
                <a href="{{ url('/ticket/'.$ticket->idTicket.'/edit') }}" class="btn btn-warning">Editar</a>

                | 
            
                <form action="{{ url('/ticket/'.$ticket->idTicket) }}" class="d-inline" method="post">
                @csrf
                {{method_field('DELETE')}}
                    <input type="submit"  class="btn btn-danger"onclick="return confirm('¿Quieres borrar este ticket?')" value="Borrar">
                </form>
            
            </td>
        </tr>
    @endforeach
    </tbody>

</table>
{!! $tickets->links() !!}
</div>
@endsection