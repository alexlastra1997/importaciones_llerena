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
                
                <section class="bg-white py-8 antialiased dark:bg-gray-900">
                    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Número de Orden #PVG{{ str_pad($order->id, 7, '0', STR_PAD_LEFT) }}</h2>

                        <div class="mt-6 grid grid-cols-1 lg:grid-cols-2 gap-7">
                            <div class="w-full divide-y divide-gray-200 overflow-hidden rounded-lg border border-gray-200 dark:divide-gray-700 dark:border-gray-700 lg:max-w-xl xl:max-w-2xl">
                            @foreach ($order->items as $item)
                                <div class="space-y-4 p-6">
                                
                                    <div class="flex items-center justify-between gap-4">
                                        <a href="#" class="min-w-0 flex-1 font-medium text-gray-900  dark:text-white"> {{ $item->product->nombre }}  </a>

                                        <div class="flex items-center justify-end gap-4">
                                        <p class="text-base font-normal text-gray-900 dark:text-white">{{ $item->quantity }} x ${{ $item->price }}</p>

                                        <p class="text-xl font-bold leading-tight text-gray-900 dark:text-white">${{ $item->quantity * $item->price }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                                    

                                <div class="space-y-4 bg-gray-50 p-6 dark:bg-gray-800">
                                    <div class="space-y-2">
                                        <dl class="flex items-center justify-between gap-4">
                                        <dt class="font-normal text-gray-500 dark:text-gray-400">Subtotal</dt>
                                        <dd class="font-medium text-gray-900 dark:text-white">${{ number_format($order->items->sum(function ($item) {return $item->price * $item->quantity;}), 2) }}</dd>
                                        </dl>

                                        <dl class="flex items-center justify-between gap-4">
                                        <dt class="font-normal text-gray-500 dark:text-gray-400">IVA (15%)</dt>
                                        <dd class="text-base font-medium text-green-500">${{ number_format($order->items->sum(function ($item) {return $item->price * $item->quantity;}) * 0.15, 2) }}</dd>
                                        </dl>

                                        <dl class="flex items-center justify-between gap-4">
                                        <dt class="font-normal text-gray-500 dark:text-gray-400">Costo de Envío</dt>
                                        <dd class="font-medium text-gray-900 dark:text-white">${{ number_format($order->shipping_cost, 2) }}</dd>
                                        </dl>
                                    </div>

                                    <dl class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                                        <dt class="text-lg font-bold text-gray-900 dark:text-white">Total</dt>
                                        <dd class="text-lg font-bold text-gray-900 dark:text-white">${{ number_format($order->total, 2) }}</dd>
                                    </dl>
                                </div>
                            </div>

                            <div class="mt-6 grow sm:mt-8 lg:mt-0">
                                <div class="space-y-6 rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Detalles de la Orden</h3>

                                    <ol class="relative ms-3 border-s border-gray-200 dark:border-gray-700">
                                        <li class="mb-10 ms-6">
                                            <span class="absolute -start-3 flex h-6 w-6 items-center justify-center rounded-full bg-gray-100 ring-8 ring-white dark:bg-gray-700 dark:ring-gray-800">
                                                <svg class="h-6 w-6 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-width="2" d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                                </svg>

                                            </span>
                                            <h4 class="mb-0.5 text-base font-semibold text-gray-900 dark:text-white">Datos de cliente:</h4>
                                            <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Nombre:  {{ $order->cliente->nombre }} </p>
                                            <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Cédula o RUC:  {{ $order->cliente->documento_identificacion }} </p>
                                            <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Teléfono:  {{ $order->cliente->numero_telefono }} </p>
                                            <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Email:  {{ $order->cliente->correo }} </p>
                                        </li>

                                        <li class="mb-10 ms-6">
                                            <span class="absolute -start-3 flex h-6 w-6 items-center justify-center rounded-full bg-gray-100 ring-8 ring-white dark:bg-gray-700 dark:ring-gray-800">
                                                <svg class="h-6 w-6 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h6l2 4m-8-4v8m0-8V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v9h2m8 0H9m4 0h2m4 0h2v-4m0 0h-5m3.5 5.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm-10 0a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z"/>
                                                </svg>
                                            </span>
                                            <h4 class="mb-0.5 text-base font-semibold text-gray-900 dark:text-white">Dirección de Envío</h4>
                                            <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Ubicaión: {{ $order->cliente->direccion_vivienda }} </p>
                                        </li>

                                        <li class="mb-10 ms-6">
                                            <span class="absolute -start-3 flex h-6 w-6 items-center justify-center rounded-full bg-gray-100 ring-8 ring-white dark:bg-gray-700 dark:ring-gray-800">
                                                <svg class="h-6 w-6 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4 0h.01v.01H16V13Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z"/>
                                                </svg>

                                            </span>
                                            <h4 class="mb-0.5 text-base font-semibold text-gray-900 dark:text-white">Fecha Orden de Venta</h4>
                                            <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Fecha: {{ $order->created_at }} </p>
                                        </li>
                                    </ol>

                                    <div class="w-full grid sm:grid-cols-2  gap-4">
                                        <a href="{{ route('orders.downloadInvoice', ['order' => $order->id]) }}" class="w-full inline-flex justify-center rounded-lg  border border-blue-900 bg-blue-800 px-3 py-2 text-sm font-medium text-white hover:bg-gray-50 hover:text-blue-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 lg:w-auto">Factura</a>
                                        <a href="{{ route('orders.downloadInvoice2', ['order' => $order->id]) }}" class="w-full inline-flex justify-center rounded-lg  border border-blue-900 bg-blue-800 px-3 py-2 text-sm font-medium text-white hover:bg-gray-50 hover:text-blue-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 lg:w-auto">Nota de Venta</a>

                                    </div>
                                    
                                    <div class="w-full grid grid-cols-1 gap-4">
                                        <a href="{{ route('orders.index')}}" class="w-full inline-flex justify-center rounded-lg  border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 lg:w-auto">Volver a Ordenes</a>

                                        @role('admin')
                                            <form action="{{ route('orders.refund') }}" method="POST" class="w-full inline-flex justify-center rounded-lg  border border-red-700 bg-red-500 px-3 py-2 text-sm font-medium text-white hover:bg-gray-50 hover:text-red-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 lg:w-auto" >
                                                @csrf
                                                <input type="hidden" name="order_id" value="{{ $order->id }}">
                                                <button type="submit" onclick="return confirm('Está seguro/a que quiere hacer la devolución de ésta orden de venta?')">Cancelar Orden</button>
                                            </form>
                                        @endrole  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
   
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    </div>
</div>

<!--Footer-->
@extends('layouts.footer')