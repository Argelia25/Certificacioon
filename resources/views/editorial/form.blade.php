<div class="form-group {{ $errors->has('Editorial') ? 'has-error' : ''}}">
    <label for="Editorial" class="control-label"><h5>{{ 'Editorial' }}</h5></label>
    <input class="form-control" name="Editorial" type="text" id="Editorial" value="{{ isset($editorial->Editorial) ? $editorial->Editorial : ''}}" >
    {!! $errors->first('Editorial', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
   <a class="btn btn-warning" href="{{ url('editorial') }}">Regresar</a>
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'Editar' ? 'Actualizar' : 'Crear' }}">
</div>
