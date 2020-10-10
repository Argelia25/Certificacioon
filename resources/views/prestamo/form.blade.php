<div class="form-group">
 
    <label for="Usuario" class="control-label"><h5>{{'Usuario'}}</h5></label>
      <select class="custom-select {{ $errors->has('Usuario')?'is-invalid':'' }}" name="Usuario" id="Usuario" required>
       <option selected value="{{ isset($prestamo->Usuario)?$prestamo->Usuario:''}}">Usuarios</option>
        
       
        @foreach ($usuarios as $usuario)
            <option value="{{ $usuario->id }}">{{ $usuario->Nombre }}{{ $usuario->Apellido }} </option>
        @endforeach

    </select>

    
    {!! $errors->first('Usuario','<div class="invalid-feedback">:message</div>') !!}
</div>


<div class="form-group">
    
    <label for="Libro" class="control-label"><h5>{{'Libro'}}</h5></label>
    <select class="custom-select {{ $errors->has('Libro')?'is-invalid':'' }}" name="Libro" id="LibroZ" required>
       <option selected value="{{ isset($prestamo->Libro)?$prestamo->Libro:''}}"><h5>Libros</h5></option>
        
        
        @foreach ($libros as $item )
           
            @if (($item->Disponibles)>0)
            <option value="{{ $item->id }}">{{ $item->Titulo }}</option>
            @endif

        @endforeach

    </select>

    
    {!! $errors->first('id','<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group {{ $errors->has('Fsalida') ? 'has-error' : ''}}">
    <label for="Fsalida" class="control-label"><h5>{{ 'Fecha de salida' }}</h5></label>
    <input class="form-control" name="Fsalida" type="date" id="Fsalida" value="{{ isset($prestamo->Fsalida) ? $prestamo->Fsalida : ''}}" >
    {!! $errors->first('Fsalida', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Fentrada') ? 'has-error' : ''}}">
    <label for="Fentrada" class="control-label"><h5>{{ 'Fecha de Regreso' }}</h5></label>
    <input class="form-control" name="Fentrada" type="date" id="Fentrada" value="{{ isset($prestamo->Fentrada) ? $prestamo->Fentrada : ''}}" >
    {!! $errors->first('Fentrada', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('Entregado') ? 'has-error' : ''}}">
    <label for="Entregado" class="control-label"><h5>{{ 'Entregado' }}</h5></label>
    <input class="form-control" name="Entregado" type="number" id="Entregado" value="{{ isset($prestamo->Entregado) ? $prestamo->Entregado : ''}}" >
    {!! $errors->first('Entregado', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
   
   <a class="btn btn-warning" href="{{ url('prestamo') }}">Regresar</a>
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'Editar' ? 'Actualizar' : 'Crear' }}">
</div>
