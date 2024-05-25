@extends('adminlte::page')

@section('title', 'Nueva Puesto')

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('content_header')
    <h1>Crear Nuevo Puesto</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.roles.store']) !!}

            @include('admin.roles.partials.form')

            {!! Form::submit('Crear', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')
@stop