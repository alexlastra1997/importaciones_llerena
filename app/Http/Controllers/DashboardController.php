<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $totalOrders = Order::count();
        $totalSales = Order::sum('total');


        // Cuenta de órdenes
        $orderCount = Order::count();

        // Producto más vendido
        $mostSoldProduct = DB::table('cart_items')
            ->select('product_id', DB::raw('SUM(quantity) as total_quantity'))
            ->groupBy('product_id')
            ->orderBy('total_quantity', 'desc')
            ->first();

        $product = null;
        if ($mostSoldProduct) {
            $product = Product::find($mostSoldProduct->product_id);
        }
        return view('dashboard', compact('productCount', 'clientCount', 'totalOrders', 'totalSales' ,'orderCount', 'product'));
    }
}
