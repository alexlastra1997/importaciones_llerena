<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Cliente;
use App\Models\Order;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::with('product')->whereNull('order_id')->get();
        
        return view('cart.index', compact('cartItems'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric',
        ]);

        $product = Product::find($validatedData['product_id']);

        if ($product->stock < $validatedData['quantity']) {
            return redirect()->back()->with('error', 'Not enough stock available.');
        }

        CartItem::create($validatedData);

        return redirect()->route('sales')->with('success', 'Producto añadido al carrito con éxito');
    }

    public function destroy(CartItem $cartItem)
    {
        $cartItem->delete();
        return redirect()->route('cart.index')->with('success', 'Producto removido del carrito con exito.');
    }

    public function checkout()
    {
        $cartItems = CartItem::with('product')->whereNull('order_id')->get();
        $clientes = Cliente::all();
        return view('cart.checkout', compact('cartItems', 'clientes'));
    }

    public function completeCheckout(Request $request)
    {
        $validatedData = $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'shipping_cost' => 'required|numeric',
        ]);

        $cliente = Cliente::find($validatedData['cliente_id']);
        $shippingCost = $validatedData['shipping_cost'];

        $order = DB::transaction(function () use ($cliente, $shippingCost) {
            $cartItems = CartItem::with('product')->whereNull('order_id')->get();

            $subtotal = $cartItems->sum(function ($cartItem) {
                return $cartItem->price * $cartItem->quantity;
            });

            $iva = $subtotal * 0.15;
            $total = $subtotal + $iva + $shippingCost;

            $order = Order::create([
                'total' => $total,
                'cliente_id' => $cliente->id,
                'shipping_cost' => $shippingCost,
            ]);

            foreach ($cartItems as $cartItem) {
                $product = $cartItem->product;
                $product->stock -= $cartItem->quantity;
                $product->save();

                $cartItem->order_id = $order->id;
                $cartItem->save();
            }

            return $order;
        });

        return redirect()->route('cart.invoice', ['order' => $order->id]);
    }

    public function invoice(Order $order)
    {
        $order->load('items.product', 'cliente');
        return view('cart.invoice', compact('order'));
    }

    public function downloadInvoice(Order $order)
    {
        $order->load('items.product', 'cliente');

        $pdf = Pdf::loadView('cart.invoice-pdf', compact('order'));

        return $pdf->download('invoice.pdf');
    }
}