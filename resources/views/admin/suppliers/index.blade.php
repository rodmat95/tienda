@extends('adminlte::page')

@section('title', 'Panel Administrativo')

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('content_header')
    <h1>Lista de Proveedores</h1>
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

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    {{-- <div class="card-header">
                        <h3 class="card-title">
                            Nuevo Proveedor
                            <a class="btn btn-success btn-sm" href="{{ route('admin.suppliers.create') }}">
                                <i class="fas fa-plus-circle"></i>
                            </a>
                        </h3>
                    </div> --}}
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="categories" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Estado</th>
                                    <th colspan="2">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($suppliers as $supplier)
                                    <tr>
                                        <td>{{ $supplier->id }}</td>
                                        <td>{{ $supplier->name }}</td>
                                        <td width="10px">
                                            @if ($supplier->status == 2)
                                                <span class="badge badge-primary">Activo</span>
                                            @else
                                                <span class="badge badge-secondary">Inactivo</span>
                                            @endif
                                        </td>
                                        <td width="10px">
                                            <div style="margin: 10px">
                                                <a class="btn btn-warning btn-sm"
                                                    href="{{ route('admin.suppliers.edit', $supplier) }}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </div>
                                        </td>
                                        <td width="10px">
                                            <div style="margin: 10px">
                                                @if ($supplier->status == 2)
                                                    <form action="{{ route('admin.suppliers.destroy', $supplier) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('¿Estás seguro de inhabilitar?')">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('admin.suppliers.destroy', $supplier) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-success btn-sm"
                                                            onclick="return confirm('¿Estás seguro de habilitar?')">
                                                            <i class="fas fa-check-circle"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Estado</th>
                                    <th colspan="2">Acciones</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
@stop

@section('js')
    <script>
        function initDataTable() {
            $('#suppliers').DataTable({
                "order": [
                    [3, "desc"]
                ],
                responsive: true,
                autoWidth: false
            });
        }

        $(document).ready(function() {
            initDataTable();
        });
    </script>
@stop
