@extends('adminlte::page')

@section('title', 'Panel Administrativo')

@section('css')
    <style>
        .image-wrapper img {
            width: 75%;
            height: 75%;
        }
    </style>
@stop

@section('content_header')
    <h1>Editar Proovedor</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($product, ['route' => ['admin.products.update', $product], 'autocomplete' => 'off', 'files' => true, 'method' => 'put']) !!}

            @include('admin.products.partials.form')

            {!! Form::submit('Actualizar', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });

        ClassicEditor
            .create(document.querySelector('#detail'))
            .catch(error => {
                console.error(error);
            });

        document.getElementById("file").addEventListener('change', cambiarImagen);

        function cambiarImagen(event) {
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };

            reader.readAsDataURL(file);
        }
    </script>
@stop
