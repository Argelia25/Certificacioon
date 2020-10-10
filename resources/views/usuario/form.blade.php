<div class="form-group {{ $errors->has('Nombre') ? 'has-error' : ''}}">
    <label for="Nombre" class="control-label"><h5>{{ 'Nombre' }}</h5></label>
    <input class="form-control" name="Nombre" type="text" id="Nombre" value="{{ isset($usuario->Nombre) ? $usuario->Nombre : ''}}" >
    {!! $errors->first('Nombre', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Apellido') ? 'has-error' : ''}}">
    <label for="Apellido" class="control-label"><h5>{{ 'Apellido' }}</h5></label>
    <input class="form-control" name="Apellido" type="text" id="Apellido" value="{{ isset($usuario->Apellido) ? $usuario->Apellido : ''}}" >
    {!! $errors->first('Apellido', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Correo') ? 'has-error' : ''}}">
    <label for="Correo" class="control-label"><h5>{{ 'Correo' }}</h5></label>
    <input class="form-control" name="Correo" type="email" id="Correo" value="{{ isset($usuario->Correo) ? $usuario->Correo : ''}}" >
    {!! $errors->first('Correo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Telefono') ? 'has-error' : ''}}">
    <label for="Telefono" class="control-label"><h5>{{ 'Telefono' }}</h5></label>
    <input class="form-control" name="Telefono" type="text" id="Telefono" value="{{ isset($usuario->Telefono) ? $usuario->Telefono : ''}}" >
    {!! $errors->first('Telefono', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Observaciones') ? 'has-error' : ''}}">
    <label for="Observaciones" class="control-label"><h5>{{ 'Observaciones' }}</h5></label>
    <input class="form-control" name="Observaciones" type="text" id="Observaciones" value="{{ isset($usuario->Observaciones) ? $usuario->Observaciones : ''}}" >
    {!! $errors->first('Observaciones', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
<a class="btn btn-warning" href="{{ url('usuario') }}">Regresar</a>
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'Editar' ? 'Actualizar' : 'Crear' }}">
</div>
