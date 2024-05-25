@extends('adminlte::page')

@section('title', 'Nueva Comisión')

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('content_header')
    <h1>Registrar Nueva Comisión</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.commissions.store']) !!}

            @include('admin.commissions.partials.form')

            {!! Form::submit('Crear', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#type").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>
@stop