<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $permissions = Permission::all();

        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles',
            'permissions'   => 'nullable|array',
        ]);

        $role = Role::create($request->all());
        $role->permissions()->attach($request->permissions);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Hecho!',
            'text' => "Rol '$role->name' creado satisfactoriamente.",
            'confirmButtonColor' => '#3B82F6',
        ]);

        return redirect()->route('admin.roles.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        /* $permissions = $role->permissions->pluck('id')->toArray();
        dd(in_array(1, $permissions)); */

        $permissions = Permission::all();

        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $role->id,
            'permissions'   => 'nullable|array',
        ]);

        $role->update($request->all());
        $role->permissions()->sync($request->permissions);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Hecho!',
            'text' => "Rol '$role->name' editado satisfactoriamente.",
            'confirmButtonColor' => '#3B82F6',
        ]);

        return redirect()->route('admin.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $roleName = $role->name;
        $role->delete();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Hecho!',
            'text' => "Rol '$roleName' borrado satisfactoriamente.",
            'confirmButtonColor' => '#3B82F6',
        ]);

        return redirect()->route('admin.roles.index');
    }
}
