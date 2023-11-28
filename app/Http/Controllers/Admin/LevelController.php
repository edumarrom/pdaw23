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

        $category = Level::create($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Hecho!',
            'text' => 'Nivel creado satisfactoriamente.',
        ]);

        return redirect()->route('admin.levels.index');
            /* ->with('success', 'Nivel creado satisfactoriamente.'); */
    }

    /**
     * Display the specified resource.
     */
    public function show(Level $level)
    {
        return view('admin.levels.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Level $level)
    {
        return view('admin.levels.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Level $level)
    {
        return "Actualizar nivel {$level->id}";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Level $level)
    {
        $level->delete();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Hecho!',
            'text' => 'Nivel borrado satisfactoriamente.',
        ]);

        return redirect()->route('admin.levels.index');
    }
}
