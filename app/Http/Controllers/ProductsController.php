<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index () {
        $categories = Category::all();
        return view('products', compact('categories'));
    }
}
