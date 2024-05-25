<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre de la Categoría']) !!}

    @error('name')
        <small class="text-danger">{{ $message }}</small>   
    @enderror
</div>

<div class="form-group">
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Slug de la Categoría', 'readonly']) !!}

    @error('slug')
        <small class="text-danger">{{ $message }}</small>   
    @enderror
</div>