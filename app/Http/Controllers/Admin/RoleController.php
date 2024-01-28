<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    private $models = [
        'role',
        'user',
        'category',
        'level',
        'course',
        'price',
    ];

    public function __construct()
    {
        $this->middleware('can:role-read')->only('index');
        $this->middleware('can:role-create')->only('create', 'store');
        $this->middleware('can:role-update')->only('edit', 'update');
        $this->middleware('can:role-delete')->only('destroy');
    }

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
        $permissions = Permission::all()
            ->filter(function ($permission) {
                return in_array(explode('-', $permission->name)[0], $this->models);
            })
            ->groupBy(function ($permission) {
                return explode('-', $permission->name)[0];
            });

        $otherPermissions = Permission::all()
            ->reject(function ($permission) {
                return in_array(explode('-', $permission->name)[0], $this->models);
            });

        return view('admin.roles.create', compact('permissions', 'otherPermissions'));
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

        session()->flash('swal', $this->getSwalSuccess("Rol '$role->name' creado satisfactoriamente"));

        return redirect()->route('admin.roles.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all()
            ->filter(function ($permission) {
                return in_array(explode('-', $permission->name)[0], $this->models);
            })
            ->groupBy(function ($permission) {
                return explode('-', $permission->name)[0];
            });

        $otherPermissions = Permission::all()
            ->reject(function ($permission) {
                return in_array(explode('-', $permission->name)[0], $this->models);
            });

        return view('admin.roles.edit', compact('role', 'permissions', 'otherPermissions'));
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

        session()->flash('swal', $this->getSwalSuccess("Rol '$role->name' editado satisfactoriamente"));

        return redirect()->route('admin.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $roleName = $role->name;

        if ($role->users->count()) {
            session()->flash('swal', $this->getSwalError("No es posible eliminar el rol '$roleName' porque tiene usuarios asociados"));

            return redirect()->route('admin.roles.index');
        }

        $role->delete();

        session()->flash('swal', $this->getSwalSuccess("Rol '$roleName' borrado satisfactoriamente"));

        return redirect()->route('admin.roles.index');
    }

    private function getSwalSuccess($text = '')
    {
        return [
            'icon' => 'success',
            'title' => '¡Hecho!',
            'text' => $text,
            'confirmButtonText' => 'Aceptar',
            'confirmButtonColor' => '#3B82F6',
        ];
    }

    private function getSwalError($text = '')
    {
        return [
            'icon' => 'error',
            'iconColor' => '#f43f5e',
            'title' => "D'oh!",
            'text' => $text,
            'confirmButtonText' => 'Aceptar',
            'confirmButtonColor' => '#3B82F6',
        ];
    }
}
