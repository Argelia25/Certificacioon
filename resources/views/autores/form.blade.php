<div class="form-group {{ $errors->has('Nombre') ? 'has-error' : ''}}">
    <label for="Nombre" class="control-label"><h5>{{ 'Nombre' }}</h5></label>
    <input class="form-control" name="Nombre" type="text" id="Nombre" value="{{ isset($autore->Nombre) ? $autore->Nombre : ''}}" >
    {!! $errors->first('Nombre', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Apellido') ? 'has-error' : ''}}">
    <label for="Apellido" class="control-label"><h5>{{ 'Apellido' }}</h5></label>
    <input class="form-control" name="Apellido" type="text" id="Apellido" value="{{ isset($autore->Apellido) ? $autore->Apellido : ''}}" >
    {!! $errors->first('Apellido', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
 <a class="btn btn-warning" href="{{ url('autores') }}">Regresar</a>
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'Editar' ? 'Actualizar' : 'Crear' }}">
</div>
