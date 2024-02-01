<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:user-read')->only('index');
        $this->middleware('can:user-create')->only('create', 'store');
        $this->middleware('can:user-update')->only('edit', 'update');
        $this->middleware('can:user-delete')->only('destroy');
    }

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
            /* 'password'  => 'required|string|min:8|confirmed', */
            'password'  => ['required', 'confirmed',
                Password::min(8)->letters()->numbers()->symbols(),
            ],
            'roles'   => 'nullable|array',
        ]);

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
            'password'  => ['nullable', 'confirmed',
                Password::min(8)->letters()->numbers()->symbols(),
            ],
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
