<div class="form-group {{ $errors->has('Titulo') ? 'has-error' : ''}}">
    <label for="Titulo" class="control-label"><h5>{{ 'Titulo' }}</h5></label>
    <input class="form-control" name="Titulo" type="text" id="Titulo" value="{{ isset($libro->Titulo) ? $libro->Titulo : ''}}" >
    {!! $errors->first('Titulo', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">

    <label for="Autor_id" class="control-label"><h5>{{'Autor'}}</h5></label>
    <select class="custom-select {{ $errors->has('Autor_id')?'is-invalid':'' }}" name="Autor_id" id="Autor_id" required>
        <option selected value="{{ isset($libro->Autor_id)?$libro->Autor_id:''}}">Autores</option>
        
        @foreach ($autores as $autor)
            <option value="{{ $autor->id }}">{{ $autor->Nombre}}</option>
        @endforeach

    </select>
    
    {!! $errors->first('Autor','<div class="invalid-feedback">:message</div>') !!}
</div>
sdfsf

<div class="form-group">

    <label for="Categoria_id" class="control-label"><h5>{{'Categoria'}}</h5></label>
    <select class="custom-select {{ $errors->has('Categoria_id')?'is-invalid':'' }}" name="Categoria_id" id="Categoria_id" required>
        <option selected value="{{ isset($libro->Categoria_id)?$libro->Categoria_id:''}}">Categoria</option>
        
        @foreach ($ctegorias as $cat)
            <option value="{{ $cat->id }}">{{ $cat->Categoria}}</option>
        @endforeach

    </select>
    
    {!! $errors->first('categoria','<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">

    <label for="Editorial_id" class="control-label"><h5>{{'Editorial'}}</h5></label>
    <select class="custom-select {{ $errors->has('Editorial_id')?'is-invalid':'' }}" name="Editorial_id" id="Editorial_id" required>
        <option selected value="{{ isset($libro->Editorial_id)?$libro->Editorial_id:''}}">Editoriales</option>
        
        @foreach ($editoriales as $edit)
            <option value="{{ $edit->id }}">{{ $edit->Editorial}}</option>
        @endforeach

    </select>
    
    {!! $errors->first('Editorial','<div class="invalid-feedback">:message</div>') !!}
</div>


<div class="form-group {{ $errors->has('paginas') ? 'has-error' : ''}}">
    <label for="paginas" class="control-label"><h5>{{ 'Paginas' }}</h5></label>
    <input class="form-control" name="paginas" type="number" id="paginas" value="{{ isset($libro->paginas) ? $libro->paginas : ''}}" >
    {!! $errors->first('paginas', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Disponibles') ? 'has-error' : ''}}">
    <label for="Disponibles" class="control-label"><h5>{{ 'Disponibles' }}</h5></label>
    <input class="form-control" name="Disponibles" type="number" id="Disponibles" value="{{ isset($libro->Disponibles) ? $libro->Disponibles : ''}}" >
    {!! $errors->first('Disponibles', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Idioma') ? 'has-error' : ''}}">
    <label for="Idioma" class="control-label"><h5>{{ 'Idioma' }}</h5></label>
    <input class="form-control" name="Idioma" type="text" id="Idioma" value="{{ isset($libro->Idioma) ? $libro->Idioma : ''}}" >
    {!! $errors->first('Idioma', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Foto') ? 'has-error' : ''}}">
    <label for="Foto" class="control-label"><h5>{{ 'Foto' }}</h5></label>
    <input class="form-control" name="Foto" type="file" id="Foto" value="{{ isset($libro->Foto) ? $libro->Foto : ''}}" >
    {!! $errors->first('Foto', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'Guardar' ? 'Actualizar' : 'Guardar' }}">
<a class="btn btn-warning" href="{{ url('libros') }}">Regresar</a>
    
</div>
