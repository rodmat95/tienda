@extends('adminlte::page')

@section('title', 'Panel Administrativo')

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('content_header')
    <h1>Crear Distribucion</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.distributions.store', 'autocomplete' => 'off']) !!}

            {{-- {!! Form::hidden('supplier_id', $supplier->id) !!} --}}

            @include('admin.distributions.partials.form')

            {!! Form::submit('Crear', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            var supplierId = {{ $supplier->id ?? 0 }};

            $("#product_id").change(function() {
                var productName = $(this).find("option:selected").text();
                var slug = stringToSlug(productName) + '-' + supplierId;
                $("#slug").val(slug);
            });

            function stringToSlug(str) {
                str = str.replace(/^\s+|\s+$/g, '');
                str = str.toLowerCase();

                var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
                var to = "aaaaeeeeiiiioooouuuunc------";
                for (var i = 0, l = from.length; i < l; i++) {
                    str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
                }

                str = str.replace(/[^a-z0-9 -]/g, '')
                    .replace(/\s+/g, '-')
                    .replace(/-+/g, '-');

                return str;
            }
        });
    </script>
@stop
