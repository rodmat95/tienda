<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    {{-- <h3 class="card-title">
                        Nuevo Usuario
                        <a class="btn btn-success btn-sm" href="{{ route('admin.users.create') }}">
                            <i class="fas fa-plus-circle"></i>
                        </a>
                    </h3> --}}
                    <input wire:model="search" class="form-control" placeholder="Buscar">
                </div>
                <!-- /.card-header -->
                @if ($users->count())
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td width="10px">
                                            <div style="margin: 10px">
                                                <a class="btn btn-warning btn-sm"
                                                    href="{{ route('admin.users.edit', $user) }}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Acciones</th>
                                </tr>
                            </tfoot>
                        </table>
                        {{ $users->links() }}
                    </div>
                    <div class="card-footer">
                        {{$users->links()}}
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