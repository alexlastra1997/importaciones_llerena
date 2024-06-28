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
            
            <!-- ejemplo -->
            <section class="bg-white py-3 antialiased dark:bg-gray-900 ">
                <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Checkout</h2>
                    <form action="{{ route('cart.completeCheckout') }}" method="POST">
                    @csrf
                        <div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8">
                            <div class="mx-auto w-full flex-none lg:max-w-lg xl:max-w-xl">
                                <div class="space-y-6">
                                    <div class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 md:p-6">
                                        <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
                                        
                                            <div class="mx-auto max-w-3xl">
                                                <p class="text-xl font-semibold text-gray-900 dark:text-white">Productos seleccionados</p>
                                                <div class="mt-6 sm:mt-8">
                                                    <div class="relative overflow-x-auto border-b border-gray-200 dark:border-gray-800">
                                                        <table class="w-full text-left font-medium text-gray-900 dark:text-white md:table-fixed">
                                                            <tbody class="divide-y divide-gray-200 dark:divide-gray-800">
                                                            @foreach ($cartItems as $item)
                                                                <tr>
                                                                    <td class="whitespace-nowrap py-4 md:w-2/4">
                                                                    <div class="flex items-center gap-4">
                                                                        <a href="#" class="flex items-center aspect-square w-10 h-10 shrink-0">
                                                                            <img src="{{ asset('storage/' . $item->product->imagen) }}" alt="product image"  class="w-10 h-10 rounded-xl">
                                                                        </a>
                                                                        <a href="#" class="hover:underline"> {{ $item->product->nombre }}</a>
                                                                    </div>
                                                                    </td>

                                                                    <td class="p-4 text-base font-normal text-gray-900 dark:text-white">{{ $item->quantity }} x ${{ $item->price }}</td>

                                                                    <td class="p-4 text-right text-base font-bold text-gray-900 dark:text-white">${{ $item->quantity * number_format($item->price, 2) }}</td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mx-auto mt-6 max-w-4xl flex-1 space-y-6 lg:mt-0 lg:w-full">
                                
                                <div class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                                    <label for="cliente_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seleccionar Cliente</label>
                                    <select name="cliente_id" id="cliente_id"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected>Seleccionar cliente</option>
                                        @foreach ($clientes as $cliente)
                                            <option value="{{ $cliente->id }}" required>{{ $cliente->nombre }}</option>
                                        @endforeach
                                    </select>
                                    <label for="shipping_cost" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Costo de Envío:</label>
                                    <input name="shipping_cost" id="shipping_cost" step="0.01" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="Costo en dólares" required />

                                </div>

                                @php
                                    $subtotal = $cartItems->sum(function ($item) {
                                        return $item->price * $item->quantity;
                                    });
                                    $iva = $subtotal * 0.15;
                                @endphp

                                <div class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                                    <p class="text-xl font-semibold text-gray-900 dark:text-white">Resumen del pedido</p>

                                    <div class="space-y-4">
                                        <div class="space-y-2">
                                            <dl class="flex items-center justify-between gap-4">
                                                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Subtotal</dt>
                                                <dd class="text-base font-medium text-gray-900 dark:text-white">${{ number_format($subtotal, 2) }}</dd>
                                            </dl>

                                            <dl class="flex items-center justify-between gap-4">
                                                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">IVA (15%)</dt>
                                                <dd class="text-base font-medium text-green-600">${{ number_format($iva, 2) }}</dd>
                                            </dl>
                                        </div>

                                        <dl class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                                            <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                                            <dd class="text-base font-bold text-gray-900 dark:text-white">$<span id="total">{{ number_format($subtotal + $iva, 2) }}</span></dd>
                                        </dl>
                                    </div>

                                    <button type="submit" class="text-white w-full flex justify-center text-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Confirmar Venta
                                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                        </svg>
                                    </button>
                                </div>   
                            </div>
                        </div>
                    </form>
                </div>
            </section>
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