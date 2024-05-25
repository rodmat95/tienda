@extends('adminlte::page')

@section('title', 'Panel Administrativo')

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('content_header')
    <h1>Lista de Usuarios</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            <strong>{{ session('error') }}</strong>
        </div>
    @endif

    @livewire('admin.users-index')

@stop

@section('js')
    <script>
        console.log('Te conectaste a admin.index');
    </script>
@stop
