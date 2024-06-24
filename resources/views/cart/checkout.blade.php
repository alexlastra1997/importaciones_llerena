@extends('layouts.app')
@extends('layouts.sidebar')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

<div class="p-4 sm:ml-64">
    <div class="rounded-lg dark:border-gray-700 mt-14">

        <!-- paginacion dashboard-->
        <nav class="flex mt-20 mb-8 mx-5" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                <svg class="w-4 h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                </svg>
                Home
                </a>
            </li>
            <li>
                <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Dashboard</a>
                </div>
            </li>
            </ol>
        </nav>

        <div class="mx-auto max-w-screen-lg xl:max-w-screen-2xl px-4 lg:px-12">  
                
   

    <h1>Checkout</h1>
    <form action="{{ route('cart.completeCheckout') }}" method="POST">
        @csrf
        <div>
            <label for="cliente_id">Select Client:</label>
            <select name="cliente_id" id="cliente_id">
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="shipping_cost">Shipping Cost:</label>
            <input type="number" name="shipping_cost" id="shipping_cost" step="0.01" required>
        </div>
        <ul>
            @foreach ($cartItems as $item)
                <li>
                    {{ $item->product->nombre }} - {{ $item->quantity }} x ${{ $item->price }} = ${{ $item->quantity * $item->price }}
                </li>
            @endforeach
        </ul>
        @php
            $subtotal = $cartItems->sum(function ($item) {
                return $item->price * $item->quantity;
            });
            $iva = $subtotal * 0.15;
        @endphp
        <div>
            <p>Subtotal: ${{ number_format($subtotal, 2) }}</p>
            <p>IVA (15%): ${{ number_format($iva, 2) }}</p>
            <p>Total + Shipping: $<span id="total">{{ number_format($subtotal + $iva, 2) }}</span></p>
        </div>
        <button type="submit">Complete Purchase</button>
    </form>
    <script>
        document.getElementById('shipping_cost').addEventListener('input', function() {
            let subtotal = {{ $subtotal }};
            let iva = {{ $iva }};
            let shippingCost = parseFloat(this.value) || 0;
            let total = subtotal + iva + shippingCost;
            document.getElementById('total').innerText = total.toFixed(2);
        });
    </script>

        </div>    
    </div>
</div>

<!--Footer-->
@extends('layouts.footer')