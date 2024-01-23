<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $levels = Level::all();
        return view('admin.levels.index', compact('levels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.levels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:levels',
        ]);

        $level = Level::create($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Hecho!',
            'text' => "Nivel '$level->name' creado satisfactoriamente.",
        ]);

        return redirect()->route('admin.levels.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Level $level)
    {
        return view('admin.levels.edit', compact('level'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Level $level)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:levels,name,' . $level->id,
        ]);

        $level->update($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Hecho!',
            'text' => "Nivel '$level->name' editado satisfactoriamente.",
        ]);

        return redirect()->route('admin.levels.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Level $level)
    {
        $levelName = $level->name;

        if ($level->courses->count()) {
            session()->flash('swal', [
                'icon' => 'error',
                'iconColor' => '#f43f5e',
                'title' => "D'oh!",
                'text' => "No es posible eliminar el nivel '$levelName' porque tiene cursos asociados.",
                'confirmButtonText' => 'Aceptar',
                'confirmButtonColor' => '#3b82f6',
            ]);

            return redirect()->route('admin.levels.index');
        }

        $level->delete();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Hecho!',
            'text' => "Nivel '$levelName' borrado satisfactoriamente.",
            'confirmButtonText' => 'Aceptar',
            'confirmButtonColor' => '#3b82f6',
        ]);

        return redirect()->route('admin.levels.index');
    }
}
