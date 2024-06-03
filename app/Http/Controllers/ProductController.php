<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    
    public function index()
    {
        $products = Product::all();
        return view('products', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'codigo' => 'required|unique:products',
            'nombre' => 'required',
            'categoria' => 'required',
            'imagen' => 'nullable|image',
            'stock' => 'required|integer',
            'precio1' => 'required|numeric',
            'precio2' => 'required|numeric',
            'precio3' => 'required|numeric',
            'precio4' => 'required|numeric',
            'descripcion' => 'nullable',
        ]);

        
        $product = new Product($request->all());

        if ($request->hasFile('imagen')) {
            $product->imagen = $request->file('imagen')->store('images', 'public');
        }

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'codigo' => 'required|unique:products,codigo,' . $product->id,
            'nombre' => 'required',
            'categoria' => 'required',
            'imagen' => 'nullable|image',
            'stock' => 'required|integer',
            'precio1' => 'required|numeric',
            'precio2' => 'required|numeric',
            'precio3' => 'required|numeric',
            'precio4' => 'required|numeric',
            'descripcion' => 'nullable',
        ]);

        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('public/images');
            $validatedData['imagen'] = basename($path);
        }

        $product->update($validatedData);
        return redirect()->route('products.index')->with('success', 'Producto actualizado exitosamente.');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();
        return redirect()->route('products.index')->with('success', 'Producto eliminado exitosamente.');
    }
}
