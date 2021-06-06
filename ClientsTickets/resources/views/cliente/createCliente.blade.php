@extends('layouts.app')

@section('content')
<div class="container pb-3"  style="background-color: #C7C6C1;">

<form action="{{ url('/cliente') }}" method="post" enctype="multipart/form-data">
@csrf
    @include('cliente.formCliente',['modo'=>'Crear'])
</form>
</div>
@endsection