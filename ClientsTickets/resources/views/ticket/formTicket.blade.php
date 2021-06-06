<h1>{{ $modo }} Ticket</h1>

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

    <label for="tipo">Tipo</label>
    <input type="text" class="form-control" name="tipo" value="{{ isset($ticket->tipo)?$ticket->tipo:old('tipo') }}" id="tipo">

</div>

<div class="form-group">

    <label for="precio">Precio</label>
    <input type="text" class="form-control" name="precio" value="{{ isset($ticket->precio)?$ticket->precio:old('precio') }}" id="precio">

</div>

<div class="form-group">

    <label for="fecha">Fecha</label>
    <input type="date" class="form-control" name="fecha" value="{{ isset($ticket->fecha)?$ticket->fecha:old('fecha') }}" id="fecha">

</div>

<div class="form-group">

    <label for="cif">CIF</label>
    <input type="text" class="form-control" name="cif" value="{{ isset($ticket->cif)?$ticket->cif:old('cif') }}" id="cif">

</div>

<div class="form-group">

    <label for="clientes_id">Cliente</label>
    <input type="text" class="form-control" name="clientes_id" value="{{ isset($ticket->clientes_id)?$ticket->clientes_id:old('clientes_id') }}" id="clientes_id">

</div>



<input class="btn btn-success" type="submit" value="{{ $modo }} datos">

<a href="{{ url('ticket') }}" class="btn btn-primary">Regresar</a>