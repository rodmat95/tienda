@extends('adminlte::page')

@section('title', 'Editar Puesto')

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('content_header')
    <h1>Editar Puesto</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method' => 'put']) !!}

            @include('admin.roles.partials.form')

            {!! Form::submit('Actualizar', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')
@stop
