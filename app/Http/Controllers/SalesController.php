<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SalesController extends Controller
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

        return view('sales.sales', compact('products', 'search'));
    }
    
}
