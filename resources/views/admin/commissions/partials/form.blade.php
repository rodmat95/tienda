<div class="form-group">
    {!! Form::label('type', 'Tipo') !!}
    {!! Form::text('type', null, ['class' => 'form-control', 'placeholder' => 'Tipo de Comisión']) !!}

    @error('type')
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

<div class="form-group">
    {!! Form::label('rate', 'Tarifa') !!}
    {!! Form::number('rate', null, ['class' => 'form-control', 'placeholder' => 'Tarifa de la Comisión']) !!}

    @error('rate')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>