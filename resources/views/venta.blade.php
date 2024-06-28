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

        <div id="alert-additional-content-1" class="p-4 mb-4 text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800" role="alert">
            <div class="flex items-center">
                    <svg class="flex-shrink-0 w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Info</span>
                    <h3 class="text-lg font-medium">Información: Módulo Ventas</h3>
            </div>
            <ul class="mt-1.5 list-disc list-inside mx-5">
                <li>Hacer una Venta: Realiza un venta real de tus productos y emite factura a tus clientes.</li>
                <li>Cotización: Simula una venta para birndar una cotización de precios a tus clientes.</li>
                <li>Historial de Ventas: Organiza y vizualiza tus ventas en tiempo real.</li>
            </ul>
        </div>

        <div class="mx-auto  max-w-screen-lg xl:max-w-screen-2xl px-4 lg:px-12">
            <!-- Start block -->
            <div class="mx-auto  max-w-screen-lg xl:max-w-screen-2xl px-8">
                <section class="mt-6 grid grid-cols-1 md:grid-cols-1 lg:grid-cols-3 gap-6">
                    
                    <article class="relative w-full h-64 bg-cover bg-center group rounded-lg overflow-hidden shadow-lg hover:shadow-2xl  transition duration-300 ease-in-out"
                        style="background-image: url('https://img.freepik.com/free-photo/beautiful-asian-woman-using-smartphone-buying-online-shopping_7861-797.jpg?t=st=1718682287~exp=1718685887~hmac=63aa64c33e6960066f676ba1114bfa3fa52442d917b72445b96167e55e3ad95a&w=1380');">
                        <div class="absolute inset-0 bg-black bg-opacity-50 group-hover:opacity-75 transition duration-300 ease-in-out"></div>
                        <div class="relative w-full h-full px-4 sm:px-6 lg:px-4 flex justify-center items-center">
                            <h3 class="text-center">
                                <a class="text-white text-2xl font-bold text-center" href="{{ route('sales') }}">
                                    <span class="absolute inset-0"></span>
                                    Hacer una Venta
                                </a>
                            </h3>
                        </div>
                    </article>
                    <article class="relative w-full h-64 bg-cover bg-center group rounded-lg overflow-hidden shadow-lg hover:shadow-2xl  transition duration-300 ease-in-out"
                        style="background-image: url('https://img.freepik.com/free-photo/closeup-shot-person-thinking-buying-selling-house_181624-24672.jpg?t=st=1718682405~exp=1718686005~hmac=8be9c64b297624779a535d2246a24b6d8b3d3e9fc9ea2e61dc0405405b11dca1&w=1380');">
                        <div class="absolute inset-0 bg-black bg-opacity-50 group-hover:opacity-75 transition duration-300 ease-in-out"></div>
                        <div class="relative w-full h-full px-4 sm:px-6 lg:px-4 flex justify-center items-center">
                            <h3 class="text-center">
                                <a class="text-white text-2xl font-bold text-center" href="#">
                                    <span class="absolute inset-0"></span>
                                    Cotización
                                </a>
                            </h3>
                        </div>
                    </article>
                    <article class="relative w-full h-64 bg-cover bg-center group rounded-lg overflow-hidden shadow-lg hover:shadow-2xl  transition duration-300 ease-in-out"
                        style="background-image: url('https://img.freepik.com/free-photo/woman-writing-planning-business-strategy_53876-16015.jpg?t=st=1718680747~exp=1718684347~hmac=868f5ffb0f263fee975d8b8e73560cb93c09b7443ad2928bb4dcfad0ab9c1f74&w=1380');">
                        <div class="absolute inset-0 bg-black bg-opacity-50 group-hover:opacity-75 transition duration-300 ease-in-out"></div>
                        <div class="relative w-full h-full px-4 sm:px-6 lg:px-4 flex justify-center items-center">
                            <h3 class="text-center">
                                <a class="text-white text-2xl font-bold text-center" href="{{ route('orders.index') }}">
                                    <span class="absolute inset-0"></span>
                                    Historial de Ventas
                                </a>
                            </h3>
                        </div>
                    </article>
                </section>   
            </div>
        </div> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    </div>
</div>

<!--Footer-->
@extends('layouts.footer')