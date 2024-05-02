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

      <div class="bg-blue-400 text-white rounded-xl shadow-xl  px-5 w-full lg:w-1full  justify-center items-center border-2 border-red  x-data="{welcomeMessageShow:true}" x-show="welcomeMessageShow" x-transition:enter="transition-all ease duration-500 transform" x-transition:enter-start="opacity-0 scale-110" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition-all ease duration-500 transform" x-transition:leave-end="opacity-0 scale-90">
         <div class="flex flex-wrap -mx-3 items-center">
               <div class="w-full sm:w-1/2 md:w-2/4 px-3 text-left">
                  <div class="p-3 xl:px-5 md:py-4">
                     <h3 class="text-2xl">Bienvenido Alex !</h3>
                     <h5 class="text-md mb-3">En que vamos a trabajar hoy?</h5>
                  </div>
               </div>
         </div>
      </div>

      <!-- cards -->
      <div class="p-4 w-full">
         <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-4 gap-4">
               <div class="flex flex-row bg-white shadow-lg rounded p-4">
                  <div class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-blue-100 text-blue-500">
                     <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                  </div>
                  <div class="flex flex-col flex-grow ml-4">
                     <div class="text-sm text-gray-500">Número de Clientes</div>
                     <div class="font-bold text-lg">1259</div>
                  </div>
               </div>

               <div class="flex flex-row bg-white shadow-lg rounded p-4">
                  <div class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-green-100 text-green-500">
                     <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                  </div>
                  <div class="flex flex-col flex-grow ml-4">
                     <div class="text-sm text-gray-500">Ventas</div>
                     <div class="font-bold text-lg">230</div>
                  </div>
               </div>

               <div class="flex flex-row bg-white shadow-lg rounded p-4">
                  <div class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-orange-100 text-orange-500">
                     <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                  </div>
                  <div class="flex flex-col flex-grow ml-4">
                     <div class="text-sm text-gray-500">Productos en Stock</div>
                     <div class="font-bold text-lg">190</div>
                  </div>
               </div>

               <div class="flex flex-row bg-white shadow-lg rounded p-4">
                  <div class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-red-100 text-red-500">
                     <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                  </div>
                  <div class="flex flex-col flex-grow ml-4">
                     <div class="text-sm text-gray-500">Ganancias</div>
                     <div class="font-bold text-lg">$ 32k</div>
                  </div>
               </div>
         </div>
      </div>
 
      <!-- End Third Row -->

      <div class="mx-auto grid grid-cols-1 gap-6 xl:grid-cols-2 m-4">
         <!-- chart ventas por mes-->
         <div class="bg-white rounded-2xl shadow-xl px-8 py-12 sm:px-12 lg:px-8">
            <h3 class="text-2xl font-semibold text-blue-900">Ventas por mes</h3>
            <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>
               <div class="w-400 h-400">
                  <canvas id="grafico" ></canvas>
               </div>
               
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
               
            <script>
               const ctx = document.getElementById('grafico');
               
               new Chart(ctx, {
                  type: 'doughnut',
                  data: {
                     labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                     datasets: [{
                     label: '# of Votes',
                     data: [12, 19, 3, 5, 2, 3],
                     borderWidth: 1
                     }]
                  },
                  options: {
                     scales: {
                     y: {
                        beginAtZero: true
                     }
                     }
                  }
               });
            </script>
         </div>
         <!-- Lista de productos mas vendidos-->
         <div class="bg-white rounded-2xl shadow-xl px-8 py-12 sm:px-12 lg:px-8">
            <h3 class="text-2xl font-semibold text-blue-900">Productos más comprados</h3>
            <div class="relative overflow-x-auto">
               <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                  <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                     <tr>
                           <th scope="col" class="px-6 py-3">
                              Product name
                           </th>
                           <th scope="col" class="px-6 py-3">
                              Color
                           </th>
                           <th scope="col" class="px-6 py-3">
                              Category
                           </th>
                           <th scope="col" class="px-6 py-3">
                              Price
                           </th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                           <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                              Apple MacBook Pro 17"
                           </th>
                           <td class="px-6 py-4">
                              Silver
                           </td>
                           <td class="px-6 py-4">
                              Laptop
                           </td>
                           <td class="px-6 py-4">
                              $2999
                           </td>
                     </tr>
                     <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                           Apple MacBook Pro 17"
                        </th>
                        <td class="px-6 py-4">
                           Silver
                        </td>
                        <td class="px-6 py-4">
                           Laptop
                        </td>
                        <td class="px-6 py-4">
                           $2999
                        </td>
                     </tr>
                     <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                           Apple MacBook Pro 17"
                        </th>
                        <td class="px-6 py-4">
                           Silver
                        </td>
                        <td class="px-6 py-4">
                           Laptop
                        </td>
                        <td class="px-6 py-4">
                           $2999
                        </td>
                     </tr>
                     <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                           Apple MacBook Pro 17"
                        </th>
                        <td class="px-6 py-4">
                           Silver
                        </td>
                        <td class="px-6 py-4">
                           Laptop
                        </td>
                        <td class="px-6 py-4">
                           $2999
                        </td>
                     </tr>
                     <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                           <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                              Microsoft Surface Pro
                           </th>
                           <td class="px-6 py-4">
                              White
                           </td>
                           <td class="px-6 py-4">
                              Laptop PC
                           </td>
                           <td class="px-6 py-4">
                              $1999
                           </td>
                     </tr>
                     <tr class="bg-white dark:bg-gray-800">
                           <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                              Magic Mouse 2
                           </th>
                           <td class="px-6 py-4">
                              Black
                           </td>
                           <td class="px-6 py-4">
                              Accessories
                           </td>
                           <td class="px-6 py-4">
                              $99
                           </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>

         <div class="bg-white rounded-2xl shadow-xl px-8 py-12 sm:px-12 lg:px-8">
            <h3 class="text-2xl font-semibold text-blue-900">Productos más comprados</h3>
            <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>
               <div>
                  <canvas id="myChart2"></canvas>
               </div>
               
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
               
            <script>
               const ctx = document.getElementById('myChart2');
               
               new Chart(ctx, {
                  type: 'doughnut',
                  data: {
                     labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                     datasets: [{
                     label: '# of Votes',
                     data: [12, 19, 3, 5, 2, 3],
                     borderWidth: 1
                     }]
                  },
                  options: {
                     scales: {
                     y: {
                        beginAtZero: true
                     }
                     }
                  }
               });
            </script>
         </div>

         <div class="bg-white rounded-2xl shadow-xl px-8 py-12 sm:px-12 lg:px-8">
            <div class="mb-12 space-y-4">
                  <h3 class="text-2xl font-semibold text-purple-900">UX Design</h3>
                  <p class="mb-6">Obcaecati, quam? Eligendi, nulla numquam natus laborum porro at cum, consectetur ullam tempora ipsa iste officia sed officiis! Incidunt ea animi officiis.</p>
                  <a href="#" class="block font-medium text-purple-600">Know more</a>
            </div>
            <img src="https://tailus.io/sources/blocks/end-image/preview/images/ux-design.svg" class="w-2/3 ml-auto " alt="illustration" loading="lazy" width="900" height="600">
         </div>
      </div>
       
   </div>
</div>

<!--Footer-->
@extends('layouts.footer')