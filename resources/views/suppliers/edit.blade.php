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
            <form action="{{ route('suppliers.update', $supplier) }}"  method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="flex-1 flex items-center space-x-2 my-10">
                    <h3 class="text-2xl font-semibold text-blue-900">Crear Nuevo Proveedor</h3>
                </div>
                <div class="grid grid-cols-1 gap-6 mb-6 lg:grid-cols-2">
                    <!-- nombre empresa-->
                    <div>
                        <label 
                            for="empresa" 
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Nombre de la Empresa
                        </label>

                        <input  
                            type="text" name="empresa" id="empresa" value="{{ old('empresa', $supplier->empresa) }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                            placeholder="Nombre de la Empresa" required 
                        />
                    </div>
                    <!-- nombre contacto-->
                    <div>
                        <label 
                            for="nombre" 
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Nombre del Contacto
                        </label>

                        <input  
                            type="text" name="nombre" id="nombre" value="{{ old('nombre', $supplier->nombre) }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                            placeholder="Nombre del Contacto" required 
                        />
                    </div>
                    <!-- Correo-->
                    <div>
                        <label 
                            for="correo" 
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Correo Electrónico
                        </label>

                        <input  
                            type="email" name="correo" id="correo" value="{{ old('correo' ,$supplier->correo) }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                            placeholder="Nombre de la Categoría" required 
                        />
                    </div>
                    <!-- Teléfono-->
                    <div>
                        <label 
                            for="telefono" 
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Teléfono
                        </label>

                        <input  
                            type="tel" name="telefono" id="telefono" value="{{ old('telefono', $supplier->telefono) }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                            placeholder="Nombre de la Categoría" required 
                        />
                    </div>
                    <!-- Pais-->
                    <div>
                        <label 
                            for="pais" 
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            País
                        </label>

                        <input  
                            type="text" name="pais" id="pais" value="{{ old('pais', $supplier->pais) }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                            placeholder="Nombre de la Categoría" required 
                        />
                    </div> 
                    
                    <!-- Dirección-->
                    <div>
                        <label 
                            for="direccion" 
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Dirección
                        </label>

                        <input  
                            type="text" name="direccion" id="direccion" value="{{ old('direccion', $supplier->direccion) }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                            placeholder="Nombre de la Categoría" required 
                        />
                    </div>         
                </div>
                <button 
                    type="submit" 
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Actualizar Proveedor
                </button>
            </form>
        </div> 
       

        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    </div>
</div>
<!--Footer-->
@extends('layouts.footer')