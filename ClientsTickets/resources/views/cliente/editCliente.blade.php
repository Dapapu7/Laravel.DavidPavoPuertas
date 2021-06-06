@extends('layouts.app')

@section('content')
<div class="container pb-3" style="background-color: #C7C6C1;">

<form action="{{ url('/cliente/'.$cliente->idCliente) }}" method="post" enctype="multipart/form-data">
@csrf
{{method_field('PATCH')}}
    @include('cliente.formCliente',['modo'=>'Editar'])
</form>
</div>
@endsection