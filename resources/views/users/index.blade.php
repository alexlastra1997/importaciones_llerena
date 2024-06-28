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

        <section class="bg-white dark:bg-gray-900">
            <div class=" px-4 mx-auto max-w-screen-xl text-center lg:px-6">
                <div class="mx-auto mb-8 max-w-screen-sm lg:mb-8">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Nuestro Equipo</h2>
                </div>
                <div class="w-full max-w-screen-xl px-4 mx-auto lg:px-12 mb-10">
                    <!-- Start coding here -->
                    <div class="relative overflow-hidden bg-white shadow-lg border-1 dark:bg-gray-800 sm:rounded-lg">
                      <div class="grid grid-cols-1 items-center justify-between p-4 space-y-3 sm:grid-cols-2 sm:space-y-0 sm:space-x-4">
                        <div>
                          <h5 class="mr-3 font-semibold dark:text-white">Mis Usuarios</h5>
                          <p class="text-gray-500 dark:text-gray-400">Maneja e ingresa a todos tus usuarios </p>
                        </div>
                        <button type="button"
                                class="flex  max-w-1/2 items-end justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-blue-800 hover:bg-blue-700 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-2 -ml-1" viewBox="0 0 20 20" fill="currentColor"
                               aria-hidden="true">
                            <path
                              d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"/>
                          </svg>
                          Añadir Usuarios
                        </button>
                      </div>
                    </div>
                </div> 

                
                    <div class="grid gap-8 lg:gap-16 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                        @foreach($users as $user)
                        <div class="text-center text-gray-500 dark:text-gray-400">
                            <div class="relative inline-flex items-center justify-center overflow-hidden ">
                                <svg class="w-16 h-16 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z" clip-rule="evenodd"/>
                                  </svg>
                             </div> 
                            <h3 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                <a href="#">{{ $user->name }}</a>
                            </h3>
                            <p>{{ $user->email }}</p>
                            <p>Puesto: {{ implode(', ', $user->roles()->pluck('name')->toArray()) }}</p>
                            

                            

                            <div class="flex items-center justify-center space-x-4">
                                <a href="{{ route('users.edit', $user->id) }}" class="py-2 px-3 flex items-center text-sm font-medium text-center text-white bg-blue-800 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                    </svg>
                                    Editar
                                </a>
                                <form action="{{ route('users.destroy', $user) }}" method="POST" class="my-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class=" py-2 px-3 space-x-4 flex items-center text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm text-center" onclick="return confirm('Estás seguro/a en eliminar este producto?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                
        </section> 
    </div>
</div>    

<!--Footer-->
@extends('layouts.footer')