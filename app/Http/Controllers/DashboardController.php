<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
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


        // Obtener la fecha actual
        $now = Carbon::now();
        
        // Calcular los totales por mes para los últimos 4 meses
        $orders = DB::table('orders')
            ->select(DB::raw('SUM(total) as total'), DB::raw('MONTH(created_at) as month'))
            ->where('created_at', '>=', $now->subMonths(4))
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy('month', 'asc')
            ->get();

        // Preparar los datos para Chart.js
        $months = [];
        $totals = [];
        foreach ($orders as $order) {
            $months[] = Carbon::create()->month($order->month)->format('F');
            $totals[] = $order->total;
        }
        

        
        return view('dashboard', compact('productCount', 'clientCount', 'totalOrders', 'totalSales' ,'orderCount', 'product','months','totals'));
    }
}
