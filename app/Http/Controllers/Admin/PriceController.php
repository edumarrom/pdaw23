<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prices = Price::all();

        return view('admin.prices.index', compact('prices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.prices.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->attributes->set('value', 'amount');

        $request->validate([
            'name'  => 'required|string|max:255|unique:prices',
            'value' => 'required|numeric|min:0',
        ]);

        $price = Price::create($request->all());

        session()->flash('swal', $this->getSwalSuccess("Pecio '$price->name' creado satisfactoriamente"));

        return redirect()->route('admin.prices.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Price $price)
    {
        return view('admin.prices.edit', compact('price'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Price $price)
    {
        $request->validate([
            'name'  => 'required|string|max:255|unique:prices,name,' . $price->id,
            'value' => 'required|numeric|min:0',
        ]);

        $price->update($request->all());

        session()->flash('swal', $this->getSwalSuccess("Precio '$price->name' editado satisfactoriamente"));

        return redirect()->route('admin.prices.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Price $price)
    {
        $priceName = $price->name;

        if ($price->courses->count()) {
            session()->flash('swal', $this->getSwalError("No es posible eliminar el precio '$priceName' porque tiene cursos asociados"));

            return redirect()->route('admin.prices.index');
        }

        $price->delete();

        session()->flash('swal', $this->getSwalSuccess("Precio '$priceName' borrado satisfactoriamente"));

        return redirect()->route('admin.prices.index');
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
