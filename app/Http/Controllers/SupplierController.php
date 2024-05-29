<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return view('suppliers', compact('suppliers'));
    }

    public function create()
    {
        return view('suppliers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'empresa' => 'required',
            'nombre' => 'required',
            'correo' => 'required|email|unique:suppliers',
            'telefono' => 'required',
            'pais' => 'required',
            'direccion' => 'required',
        ]);

        Supplier::create($request->all());

        return redirect()->route('suppliers.index')
                        ->with('success', 'Proveedor creado con éxito.');
    }

    public function show(Supplier $supplier)
    {
        return view('suppliers.show', compact('supplier'));
    }

    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'empresa' => 'required',
            'nombre' => 'required',
            'correo' => 'required|email|unique:suppliers,correo,'.$supplier->id,
            'telefono' => 'required',
            'pais' => 'required',
            'direccion' => 'required',
        ]);

        $supplier->update($request->all());

        return redirect()->route('suppliers.index')
                        ->with('success', 'Proveedor actualizado con éxito.');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return redirect()->route('suppliers.index')
                        ->with('success', 'Proveedor eliminado con éxito.');
    }
}
