<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:level-read')->only('index');
        $this->middleware('can:level-create')->only('create', 'store');
        $this->middleware('can:level-edit')->only('edit', 'update', 'goals');
        $this->middleware('can:level-delete')->only('destroy');
    }
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

        session()->flash('swal', $this->getSwalSuccess("Nivel '$level->name' creado satisfactoriamente"));

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

        session()->flash('swal', $this->getSwalSuccess("Nivel '$level->name' editado satisfactoriamente"));

        return redirect()->route('admin.levels.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Level $level)
    {
        $levelName = $level->name;

        if ($level->courses->count()) {
            session()->flash('swal', $this->getSwalError("No es posible eliminar el nivel '$levelName' porque tiene cursos asociados"));

            return redirect()->route('admin.levels.index');
        }

        $level->delete();

        session()->flash('swal', $this->getSwalSuccess("Nivel '$levelName' borrado satisfactoriamente"));

        return redirect()->route('admin.levels.index');
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
