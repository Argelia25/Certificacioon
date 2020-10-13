<div class="form-group {{ $errors->has('Categoria') ? 'has-error' : ''}}">
    <label for="Categoria" class="control-label"><h5>{{ 'Categoria' }}</h5></label>
    <input class="form-control" name="Categoria" type="text" id="Categoria" value="{{ isset($ctegoria->Categoria) ? $ctegoria->Categoria : ''}}" >
    {!! $errors->first('Categoria', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
   < zcvsVVVVVVVVVVVa class="btn btn-warning" href="{{ url('ctegorias') }}">Regresar</a>
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'Editar' ? 'Actualizar' : 'Crear' }}">
</div>
