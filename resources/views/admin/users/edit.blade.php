@extends('adminlte::page')

@section('title', 'Panel Administrativo')

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('content_header')
    <h1>Gestionar Usuario</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">

            {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control', null, 'readonly']) !!}
            </div>

            <div class="form-group">
                <p class="font-weight-bold">Puestos</p>
                @foreach ($roles as $role)
                    <div>
                        <label>
                            {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                            {{ $role->name }}
                        </label>
                    </div>
                @endforeach
            </div>

            {!! Form::submit('Actualizar', ['class' => 'btn btn-success']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')
@stop