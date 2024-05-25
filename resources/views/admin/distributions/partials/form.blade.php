<div class="form-group">
    {!! Form::label('product', 'Producto') !!}
    {!! Form::select('product_id', $products, null, ['class' => 'form-control', 'id' => 'product_id']) !!}

    @error('product_id')
        <small class="text-danger">{{ $message }}</small>   
    @enderror
</div>

<div class="form-group">
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Slug del Producto', 'readonly']) !!}

    @error('slug')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('price', 'Precio') !!}
    {!! Form::number('price', null, ['class' => 'form-control', 'placeholder' => 'Precio del Producto', 'step' => '0.01']) !!}

    @error('price')
        <small class="text-danger">{{ $message }}</small>   
    @enderror
</div>

<div class="form-group">
    {!! Form::label('stock', 'Existencias') !!}
    {!! Form::number('stock', null, ['class' => 'form-control', 'placeholder' => 'Existencias del Producto']) !!}

    @error('stock')
        <small class="text-danger">{{ $message }}</small>   
    @enderror
</div>

<div class="form-group">
    <p class="font-weight-bold">Estado</p>
    <label>
        {!! Form::radio('status', 1, true) !!}
        Inactivo
    </label>
    <label>
        {!! Form::radio('status', 2) !!}
        Activo
    </label>

    @error('status')
        <br>
        <small class="text-danger">{{ $message }}</small>   
    @enderror
</div>