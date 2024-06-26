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
                
                <h1>Users</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Roles</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ implode(', ', $user->roles()->pluck('name')->toArray()) }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
                
            </div>
        </section> 
    </div>
</div>    

<!--Footer-->
@extends('layouts.footer')