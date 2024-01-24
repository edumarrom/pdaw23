<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:category-read')->only('index');
        $this->middleware('can:category-create')->only('create', 'store');
        $this->middleware('can:category-edit')->only('edit', 'update');
        $this->middleware('can:category-delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories',
        ]);

        $category = Category::create($request->all());

        session()->flash('swal', $this->getSwalSuccess("Categoría '$category->name' creada satisfactoriamente"));

        return redirect()->route('admin.categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
        ]);

        $category->update($request->all());

        session()->flash('swal', $this->getSwalSuccess("Nivel '$category->name' editada satisfactoriamente"));

        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $categoryName = $category->name;

        if ($category->courses->count()) {
            session()->flash('swal', $this->getSwalError("No es posible eliminar el nivel '$categoryName' porque tiene cursos asociados"));

            return redirect()->route('admin.categories.index');
        }

        $category->delete();

        session()->flash('swal', $this->getSwalSuccess("Nivel '$categoryName' borrada satisfactoriamente"));

        return redirect()->route('admin.categories.index');
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
