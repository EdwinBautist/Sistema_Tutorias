@extends('layouts.main')

@section('title', 'Alumnos')

@section('content')
<div align="center" class="w-500">
    <h1>PROFESORES</h1>
    <br>
    <div class="mx-auto max-w-screen-xl px-4 lg:px-1">
        <div class="bg-white relative shadow-md sm:rounded-lg   ">

            <!-- Buscador y botón de agregar -->
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="w-full md:w-1/2">
                    <form class="flex items-center">
                        <label for="simple-search" class="sr-only">Buscar</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-blue-500" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" id="simple-search" 
                                   class="bg-blue-50 border
                                          border-black-300 
                                          text-black-900 
                                          text-sm 
                                          rounded-lg 
                                          block w-full pl-10 p-2" 
                                   placeholder="Buscar" required>
                        </div>
                    </form>
                </div>
                <button data-modal-target="default-modal" data-modal-toggle="default-modal" type="button"
                        class="flex items-center justify-center text-black hover:underline bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                    <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                    </svg>
                    Agregar Profesor
                </button>
            </div>

            <!-- Tabla -->
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-black-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-4 py-3">No. Empleado</th>
                            <th scope="col" class="px-4 py-3">Nombre</th>
                            <th scope="col" class="px-4 py-3">Apellido</th>
                            <th scope="col" class="px-4 py-3">Correo</th>
                            <th scope="col" class="px-4 py-3">Tutor</th>
                            <th scope="col" class="px-4 py-3"><span class="sr-only">Acciones</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($profesores as $profesor)
                        <!-- INICIO DEL FOREACH: repite solo este <tr> -->
                        <tr class="border-b dark:border-gray-700">
                            <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">{{$profesor->num_empleado}}</th>
                            <td class="px-4 py-3">{{$profesor->nombre}}</td>
                            <td class="px-4 py-3">{{$profesor->apell_paterno." ".$profesor->apell_materno}}</td>
                            <td class="px-4 py-3">{{$profesor->correo}}</td>
                            <td class="px-4 py-3">{{$profesor->tutor}}</td>
                            <td class="px-4 py-3 flex items-center justify-end space-x-3">
                                <a href="#" class="font-medium text-primary-600 hover:underline">Editar</a>
                                <a href="#" class="font-medium text-red-600 hover:underline">Eliminar</a>
                            </td>
                        </tr>
                        @endforeach
                        <!-- FIN DEL FOREACH -->
                    </tbody>
                </table>
            </div>

            <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4">
                {{ $profesores->links() }}
            </nav>

        </div>
    </div>

</div>
@endsection

<!-- Main modal -->
<div id="default-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-neutral-primary-soft border border-default rounded-base shadow-sm p-4 md:p-6">
            <!-- Modal header -->
            <div class="flex items-center justify-between border-b border-default pb-4 md:pb-5">
                <h3 class="text-lg font-medium text-heading">
                    AGREGAR PROFESOR
                </h3>
                <button type="button"
                    class="text-body bg-transparent hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 ms-auto inline-flex justify-center items-center"
                    data-modal-hide="default-modal">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18 17.94 6M18 18 6.06 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="space-y-8 md:space-y-6 py-4 md:py-6">
                
            </div>
            <!-- Modal footer -->
            <div class="flex items-center border-t border-default space-x-4 pt-4 md:pt-5">
                <button data-modal-hide="default-modal" type="button"
                    class="text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                    SUBIR</button>
                <button data-modal-hide="default-modal" type="button"
                    class="text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">CANCELAR</button>
            </div>
        </div>
    </div>
</div>

