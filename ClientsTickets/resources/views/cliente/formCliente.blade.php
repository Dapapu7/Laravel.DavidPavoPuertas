<h1>{{ $modo }} Cliente</h1>

@if(count($errors)>0)

    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach( $errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    
@endif

<div class="form-group">

    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" name="nombre" value="{{ isset($cliente->nombre)?$cliente->nombre:old('nombre') }}" id="nombre">

</div>

<div class="form-group">

    <label for="apellido">Apellido</label>
    <input type="text" class="form-control" name="apellido" value="{{ isset($cliente->apellido)?$cliente->apellido:old('apellido') }}" id="apellido">

</div>

<div class="form-group">

    <label for="numero_telefono">Teléfono</label>
    <input type="text" class="form-control" name="numero_telefono" value="{{ isset($cliente->numero_telefono)?$cliente->numero_telefono:old('numero_telefono') }}" id="numero_telefono">

</div>

<div class="form-group">

    <label for="email">Email</label>
    <input type="email" class="form-control" name="email" value="{{ isset($cliente->email)?$cliente->email:old('email') }}" id="email">

</div>

<div class="form-group">

    <label for="dni">DNI</label>
    <input type="text" class="form-control" name="dni" value="{{ isset($cliente->dni)?$cliente->dni:old('dni') }}" id="dni">

</div>

<div class="form-group">

    <label for="direccion">Dirección</label>
    <input type="text" class="form-control" name="direccion" value="{{ isset($cliente->direccion)?$cliente->direccion:old('direccion') }}" id="direccion">

</div>

<div class="form-group">

    <label for="foto"></label>  
    @if(isset($cliente->foto))
    <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$cliente->foto }}" width="100" alt="">
    @endif
    <input type="file" class="form-control" name="foto" value="" id="foto">

</div>

<input class="btn btn-success" type="submit" value="{{ $modo }} datos">


<a  class="btn btn-primary" href="{{ url('cliente') }}">Regresar</a>