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

        $startDate = Carbon::now()->subMonths(4)->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();

        $orders = DB::table('orders')
            ->select(
                DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'),
                DB::raw('SUM(total) as total_sum'),
                DB::raw('COUNT(*) as total_count')
            )
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $months = [];
        $totals = [];
        $counts = [];

        foreach ($orders as $order) {
            $months[] = $order->month;
            $totals[] = $order->total_sum;
            $counts[] = $order->total_count;
        }
        

        
        return view('dashboard', compact('productCount', 'clientCount', 'totalOrders', 'totalSales' ,'orderCount', 'product','months','totals', 'counts'));
    }
}
