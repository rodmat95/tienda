<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre del Puesto']) !!}

    @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <p class="font-weight-bold">Permisos</p>
    @foreach ($permissions as $permission)
        <div>
            <label>
                {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                {{ $permission->description }}
            </label>
        </div>
    @endforeach
</div>
