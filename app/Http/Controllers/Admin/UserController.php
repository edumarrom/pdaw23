<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password'  => 'nullable|string|min:8|confirmed',
            'permissions'   => 'nullable|array',
        ]);

        /* Crea el usuario, pero la contraseña debe ser encriptada con bcrypt */
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password'  => bcrypt($request->password),
        ]);

        $user->roles()->sync($request->roles);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Hecho!',
            'text' => "Usuario '$user->name' editado satisfactoriamente.",
            'confirmButtonColor' => '#3B82F6',
        ]);

        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password'  => 'nullable|string|min:8|confirmed',
            'permissions'   => 'nullable|array',
        ]);

        $user->update($request->only('name', 'email'));

        if ($request->password) {
            $user->update([
                'password' => bcrypt($request->password)
            ]);
        }

        $user->roles()->sync($request->roles);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Hecho!',
            'text' => "Usuario '$user->name' editado satisfactoriamente.",
            'confirmButtonColor' => '#3B82F6',
        ]);

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $userName = $user->name;
        $user->delete();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Hecho!',
            'text' => "Usuario '$userName' borrado satisfactoriamente.",
            'confirmButtonColor' => '#3B82F6',
        ]);

        return redirect()->route('admin.users.index');
    }
}
