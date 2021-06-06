@extends('layouts.app')

@section('content')
<div class="container pb-3" style="background-color: #C7C6C1;">

<form action="{{ url('/ticket/'.$ticket->idTicket) }}" method="post">
@csrf
{{method_field('PATCH')}}
    @include('ticket.formTicket',['modo'=>'Editar'])
</form>
</div>
@endsection