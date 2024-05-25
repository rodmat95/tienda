<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();

        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();

        return view('admin.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
        ], [
            'name.required' => 'El nombre del puesto es obligatorio.',
            'name.unique' => 'Ya existe un puesto con este nombre.',
        ]);

        $role = Role::create($request->all());
        $role->permissions()->sync($request->permissions);

        return redirect()->route('admin.roles.edit', $role)->with('info', 'Puesto creado exitosamente');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();

        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
        ], [
            'name.required' => 'El nombre del puesto es obligatorio.',
            'name.unique' => 'Ya existe un puesto con este nombre.',
        ]);

        $role->update($request->all());
        $role->permissions()->sync($request->permissions);

        return redirect()->route('admin.roles.edit', $role)->with('info', 'Puesto actualizado exitosamente');
    }

    public function destroy(Role $role)
    {
        $usersWithRole = $role->users;

        if ($usersWithRole->isNotEmpty()) {
            return redirect()->back()->with('error', 'No se puede inhabilitar el puesto porque está asignado a uno o más usuarios.');
        }

        $newStatus = $role->status == 1 ? 2 : 1;
        $role->update(['status' => $newStatus]);

        return redirect()->back()->with('info', 'Estado cambiado exitosamente.');
    }
}