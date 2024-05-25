<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre del Proveedor', 'readonly']) !!}

    @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Slug del Proveedor', 'readonly']) !!}

    @error('slug')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('commission_id', 'Tipo de Comision') !!}
    {!! Form::select('commission_id', $commissions, null, ['class' => 'form-control']) !!}

    @error('commission_id')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>