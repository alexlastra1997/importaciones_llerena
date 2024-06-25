<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        // Aquí puedes listar todas las órdenes
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        // Mostrar los detalles de una orden específica
        return view('orders.show', compact('order'));
    }

    public function refund(Request $request)
    {
        $orderId = $request->input('order_id');
        $order = Order::find($orderId);

        if (!$order) {
            return redirect()->back()->with('error', 'Order not found.');
        }

        DB::transaction(function () use ($order) {
            foreach ($order->items as $item) {
                $product = $item->product;
                $product->stock += $item->quantity; // Devolver el stock
                $product->save();
            }

            // Restar el total del pedido de las ventas totales (puedes ajustar esto según tu lógica)
            $order->delete(); // Opcional: eliminar la orden después de la devolución
        });

        return redirect()->back()->with('success', 'Order refunded successfully.');
        
    }
}
