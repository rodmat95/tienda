<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Nueva Distribucion
                        <a class="btn btn-success btn-sm" href="{{ route('admin.distributions.create') }}">
                            <i class="fas fa-plus-circle"></i>
                        </a>
                    </h3>
                </div>
                <!-- /.card-header -->
                @if ($distributions->count())
                    <div class="card-body">
                        <input wire:model="search" class="form-control mb-3" placeholder="Buscar">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Estado</th>
                                    <th colspan="2">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($distributions as $distribution)
                                    <tr>
                                        <td>{{ $distribution->id }}</td>
                                        <td>{{ $distribution->product->name }}</td>
                                        <td width="10px">
                                            @if ($distribution->status == 2)
                                                <span class="badge badge-primary">Activo</span>
                                            @else
                                                <span class="badge badge-secondary">Inactivo</span>
                                            @endif
                                        </td>
                                        <td width="10px">
                                            <div style="margin: 10px">
                                                <a class="btn btn-warning btn-sm"
                                                    href="{{ route('admin.distributions.edit', $distribution) }}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </div>
                                        </td>
                                        <td width="10px">
                                            <div style="margin: 10px">
                                                @if ($distribution->status == 2)
                                                    <form action="{{ route('admin.distributions.destroy', $distribution) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('¿Estás seguro de inhabilitar?')">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('admin.distributions.destroy', $distribution) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-success btn-sm"
                                                            onclick="return confirm('¿Estás seguro de hbilitar?')">
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
                        {{ $distributions->links() }}
                    </div>
                @else
                    <div class="card-body">
                        <strong>No hay ningun registro</strong>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>