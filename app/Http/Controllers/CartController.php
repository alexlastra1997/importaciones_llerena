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
        $clientes = Cliente::all();
        return view('cart.index', compact('cartItems', 'clientes'));
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

        return redirect()->route('sales')->with('success', 'Product added to cart.');
    }

    public function destroy(CartItem $cartItem)
    {
        $cartItem->delete();
        return redirect()->route('cart.index')->with('success', 'Product removed from cart.');
    }

    public function checkout(Request $request)
    {
        $cartItems = CartItem::with('product')->whereNull('order_id')->get();
        $cliente = Cliente::find($request->cliente_id);
        return view('cart.checkout', compact('cartItems', 'cliente'));
    }

    public function completeCheckout(Request $request)
    {
        DB::transaction(function () use ($request) {
            $cartItems = CartItem::with('product')->whereNull('order_id')->get();
            $total = $cartItems->sum(function ($cartItem) {
                return $cartItem->price * $cartItem->quantity;
            });
    
            $order = Order::create([
                'cliente_id' => $request->cliente_id,
                'total' => $total
            ]);
    
            foreach ($cartItems as $cartItem) {
                $product = $cartItem->product;
                $product->stock -= $cartItem->quantity;
                $product->save();
    
                $cartItem->order_id = $order->id;
                $cartItem->save();
            }
        });
        $data=0;
        $pdf = Pdf::loadView('cart.pdf.factura');
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        },'factura.pdf');
        //return redirect()->route('products.index')->with('success', 'Purchase completed successfully.');
    }
}
