@extends('layouts.app')
@extends('layouts.sidebar')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

<div class="p-4 sm:ml-64">
    <div class="rounded-lg dark:border-gray-700 mt-14">

        <!-- paginacion dashboard-->
        <div class=" flex justify-center items-center mb-7 ">
            <ol class="items-center flex w-full max-w-2xl text-center text-sm font-medium text-gray-500 dark:text-gray-400 sm:text-base mt-4">
                <li class="after:border-1 flex items-center text-blue-800 after:mx-6 after:hidden after:h-1 after:w-full after:border-b after:border-gray-200 after:justify-center after:items-center dark:text-primary-500 dark:after:border-gray-700 sm:after:inline-block sm:after:content-[''] md:w-full xl:after:mx-10">
                    <span class="flex items-center after:mx-2 after:text-gray-200 after:content-['/'] dark:after:text-gray-500 sm:after:hidden">
                    <svg class="me-2 h-4 w-4 sm:h-5 sm:w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    Carrito
                    </span>
                </li>

                <li class="after:border-1 flex items-center text-blue-800 after:mx-6 after:hidden after:h-1 after:w-full after:border-b after:border-gray-200 after:justify-center after:items-center dark:text-primary-500 dark:after:border-gray-700 sm:after:inline-block sm:after:content-[''] md:w-full xl:after:mx-10">
                    <span class="flex items-center after:mx-2 after:text-gray-200 after:content-['/'] dark:after:text-gray-500 sm:after:hidden">
                    <svg class="me-2 h-4 w-4 sm:h-5 sm:w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    Checkout
                    </span>
                </li>

                <li class="flex shrink-0 items-center text-gray-400">
                    <svg class="me-2 h-4 w-4 sm:h-5 sm:w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    Confirmación de Venta
                </li>
            </ol>
        </div>
        
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