<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductSupplyController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.supply', compact('products'));
    }

    public function updateStock(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::find($validatedData['product_id']);
        $product->stock += $validatedData['quantity'];
        $product->save();

        return redirect()->route('products.supply')->with('success', 'Product stock updated successfully.');
    }
}
