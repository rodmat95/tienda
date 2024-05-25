<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre del Producto']) !!}

    @error('name')
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
    {!! Form::label('category', 'Caregoria') !!}
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}

    @error('category_id')
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

<div class="row mb-2">
    <div class="col">
        <div class="image-wrapper">
            @isset ($product->image)
                <img id="picture" src="{{ Storage::url($product->image->url) }}">
            @else
                <img id="picture" src="https://www.donofriodelivery.com/assets/imagenes/productos/sinimagen.jpg">
            @endisset
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('file', 'Imagen') !!}
            {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}

            @error('file')
                <br>
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
</div>

<div class="form-group">
    {!! Form::label('description', 'Descripcion del Producto') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}

    @error('description')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('detail', 'Detalles del Producto') !!}
    {!! Form::textarea('detail', null, ['class' => 'form-control']) !!}

    @error('detail')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
