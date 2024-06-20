<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
   
    
    public function index(Request $request)
    {
        $search = $request->input('search');

        $products = Product::query()
        ->when($search, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('descripcion', 'like', "%{$search}%")
                      ->orWhere('codigo', 'like', "%{$search}%");
            });
        })
        ->get();

        return view('products', compact('products', 'search'));
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
            'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'stock' => 'required|integer',
            'precio1' => 'required|numeric',
            'precio2' => 'required|numeric',
            'precio3' => 'required|numeric',
            'precio4' => 'required|numeric',
            'descripcion' => 'nullable',
        ]);
        
        if ($request->hasFile('imagen')) {
            $imagePath = $request->file('imagen')->store('products', 'public');
            $validatedData['imagen'] = $imagePath;
        }

        Product::create($validatedData);

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
            'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'stock' => 'required|integer',
            'precio1' => 'required|numeric',
            'precio2' => 'required|numeric',
            'precio3' => 'required|numeric',
            'precio4' => 'required|numeric',
            'descripcion' => 'nullable',
        ]);

        if ($request->hasFile('imagen')) {
            $imagePath = $request->file('imagen')->store('products', 'public');
            $validatedData['imagen'] = $imagePath;
        }

        $product->update($validatedData);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
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
