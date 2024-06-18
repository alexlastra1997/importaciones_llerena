<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $productCount = Product::count();
        $clientCount = Cliente::count();
        return view('dashboard', compact('productCount'), compact('clientCount'));
    }
}
