@extends('layouts.app')
@extends('layouts.sidebar')

<div class="p-4 sm:ml-64">
    <div class="rounded-lg dark:border-gray-700 mt-14">

        <!-- paginacion dashboard-->
        <nav class="flex mt-20 mx-5" aria-label="Breadcrumb">
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


        <!-- ejemplo template-->

        <section class="bg-white p-8 antialiased dark:bg-gray-900 ">
            <div class="mx-auto max-w-screen-2xl  bg-white shadow-xl dark:bg-gray-800 rounded-lg  ">
              <!-- productos-->
              <div class=" grid grid-cols-1 md:grid-cols-2 m-2 ">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-3 md:space-y-0 md:space-x-4 ">
                    <div class="flex-1 flex items-center space-x-2">
                        <h3 class="text-2xl font-semibold text-blue-900 px-4">Seleccionar un producto</h3>
                    </div>
                </div>
    
                <div class=" w-full px-4">
                    <form method="GET" action="{{ route('sales') }}">
                        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                            </div>
                            <input type="text" name="search" value="{{ request()->input('search') }}" placeholder="Search description..." class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                            <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buscar</button>
                        </div>
                    </form>
                </div>
              </div>
                
                
                <div class="px-4 grid grid-cols-1 gap-4 md:grid-cols-2  lg:grid-cols-3 xl:grid-cols-3  2xl:grid-cols-5">
                    @foreach($products as $product)
                    <form action="{{ route('cart.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                            <div class=" grid grid-cols-2 gap-3">
                                <div class="h-32 w-full ">
                                    <a href="#">
                                        <img src="{{ asset('storage/' . $product->imagen) }}" alt="product image"  class="mx-auto h-full">
                                    </a>
                                </div>
                                <div>
                                    <a href="#" class="text-lg font-bold leading-tight flex justify-between items-start text-gray-900 dark:text-white">{{ $product->nombre }}</a>
                                </div>
                            </div>
                                
                            <div class="pt-6">
                                <div class="mt-2 grid grid-cols-2  ">
                                    <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Código: {{ $product->codigo }}</p>
                                    <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock: {{ $product->stock }}</p>
                                </div>
                                <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoría: {{ $product->categoria }}</p>
                                
                                <hr class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700">
                                <ul class="mt-2 grid grid-cols-2 gap-4">
                                    
                                    <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cantidad:</label>
                                    <input type="number" name="quantity" id="quantity" min="1" max="{{ $product->stock }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0" required />

                                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Precio</label>
                                    <select name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected value="{{ $product->precio1 }}">{{ $product->precio1 }}</option>
                                        <option value="{{ $product->precio1 }}">{{ $product->precio1 }}</option>
                                        <option value="{{ $product->precio1 }}">{{ $product->precio1 }}</option>
                                        <option value="{{ $product->precio1 }}">{{ $product->precio1 }}</option>
                                    </select>
    
                                </ul>
                    
                                <div class="mt-4 flex items-center justify-between gap-4">                    
                                    <button type="submit" class="flex items-center justify-center w-full rounded-lg bg-blue-800 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4  focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                        <svg class="-ms-2 me-2 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                                        </svg>
                                        Añadir al carrito
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    @endforeach    
                </div>
            </div> 
          </section>
    </div>
</div>

<!--Footer-->
@extends('layouts.footer')