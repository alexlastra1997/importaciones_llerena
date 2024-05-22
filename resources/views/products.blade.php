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
                <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Dashboard</a>
                </div>
            </li>
            </ol>
        </nav>

        <div class="mx-auto max-w-screen-2xl px-auto">
            <!-- Start block -->
            <div class="flex-1 flex items-center space-x-2 my-10 mx-5">
                <h3 class="text-2xl font-semibold text-blue-900">Mis Productos</h3>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-5 justify-center items-center">
                @foreach($categories as $category)
                    <div class="bg-blue-800 w-52 h-56 m-4 static rounded-lg ">
                        <div class="bg-white w-52 h-56 hover:-m-2 absolute rounded-lg shadow-lg hover:shadow-2xl transition-all duration-150 ease-out hover:ease-in border-2 border-gray-200 justify-center items-center ">
                            @if($category->image)
                            <a href="# " class="flex justify-center items-center">
                                <img class="rounded-t-lg mb-5 w-40 h-32 justify-center items-center" src="{{ asset('storage/' . $category->image) }}" alt="product image" />
                            </a>
                            @endif
                            <div class="px-5 pb-5">
                                <a href="#">
                                    <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white flex justify-center items-center">{{$category->name}}</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>     
        </div> 

 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    </div>
</div>

<!--Footer-->
@extends('layouts.footer')