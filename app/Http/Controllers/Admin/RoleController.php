<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles',
        ]);

        $role = Role::create($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Hecho!',
            'text' => "Rol '$role->name' creado satisfactoriamente.",
        ]);

        return redirect()->route('admin.roles.index', $role);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('admin.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $role->id,
        ]);

        $role->update($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Hecho!',
            'text' => "Rol '$role->name' editado satisfactoriamente.",
        ]);

        return redirect()->route('admin.roles.index', $role);
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
        ]);

        return redirect()->route('admin.roles.index');
    }
}
