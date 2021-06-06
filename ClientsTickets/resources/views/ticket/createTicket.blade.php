@extends('layouts.app')

@section('content')
<div class="container pb-3" style="background-color: #C7C6C1;">

<form action="{{ url('/ticket') }}" method="post">
@csrf
    @include('ticket.formTicket',['modo'=>'Crear'])
</form>
</div>
@endsection