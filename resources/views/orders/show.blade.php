@extends('layouts.app')
@extends('layouts.sidebar')

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
                <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Categorías</a>
                </div>
            </li>
            </ol>
        </nav>

        <div class="px-4 mx-auto max-w-screen-2xl lg:px-12">
            <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="flex-1 flex items-center space-x-2">
                        <h3 class="text-2xl font-semibold text-blue-900">Mis Ordenes</h3>
                    </div>
                </div>

                <h1>Order Details</h1>
    <h2>Client: {{ $order->cliente->nombre }}</h2>
    <p>Email: {{ $order->cliente->email }}</p>
    <p>Phone: {{ $order->cliente->telefono }}</p>

    <h3>Order Items</h3>
    <ul>
        <li>Número de orden: PVG{{ str_pad($order->id, 7, '0', STR_PAD_LEFT) }}</li>
        @foreach ($order->items as $item)
            <li>
                {{ $item->product->nombre }} - {{ $item->quantity }} x ${{ $item->price }} = ${{ $item->quantity * $item->price }}
            </li>
        @endforeach
    </ul>

    <p>Subtotal: ${{ number_format($order->items->sum(function ($item) {
        return $item->price * $item->quantity;
    }), 2) }}</p>
    <p>IVA (15%): ${{ number_format($order->items->sum(function ($item) {
        return $item->price * $item->quantity;
    }) * 0.15, 2) }}</p>
    <p>Shipping Cost: ${{ number_format($order->shipping_cost, 2) }}</p>
    <h3>Total: ${{ number_format($order->total, 2) }}</h3>

    <form action="{{ route('orders.refund') }}" method="POST">
        @csrf
        <input type="hidden" name="order_id" value="{{ $order->id }}">
        <button type="submit" onclick="return confirm('Are you sure you want to refund this order?')">Refund Order</button>
    </form>

    <a href="{{ route('orders.index') }}">Back to Orders</a>
    <a href="{{ route('orders.downloadInvoice', ['order' => $order->id]) }}" class="btn btn-primary">Download PDF</a>



                
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    </div>
</div>

<!--Footer-->
@extends('layouts.footer')