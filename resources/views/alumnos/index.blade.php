@extends('layouts.main')

@section('title', 'Alumnos')

@section('content')
    <div align="center" class="w-500">
        <h1>ALUMNOS</h1>
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
                                    <svg aria-hidden="true" class="w-5 h-5 text-blue-500" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" id="simple-search"
                                    class="bg-blue-50 border
                                          border-black-300 
                                          text-black-900 
                                          text-sm 
                                          rounded-lg 
                                          block w-full pl-10 p-2 "
                                    placeholder="Buscar por nombre, matrícula o correo">
                            </div>
                        </form>
                    </div>

                    <div class="flex space-x-2">
                        <button data-modal-target="default-modal" data-modal-toggle="default-modal" type="button"
                            id="btn-open-individual"
                            class="flex items-center justify-center text-black hover:underline bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Agregar Alumno
                        </button>

                        <button data-modal-target="default-modal" data-modal-toggle="default-modal" type="button"
                            id="btn-open-excel"
                            class="flex items-center justify-left text-black hover:underline bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Subir Excel
                        </button>
                    </div>
                </div>

                <!-- Tabla -->
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-black-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th scope="col" class="px-4 py-3">Matricula</th>
                                <th scope="col" class="px-4 py-3">Nombre</th>
                                <th scope="col" class="px-4 py-3">Apellido</th>
                                <th scope="col" class="px-4 py-3">Correo</th>
                                <th scope="col" class="px-4 py-3">Semestre</th>
                                <th scope="col" class="px-4 py-3">Carrera</th>
                                <th scope="col" class="px-4 py-3">Estatus</th>
                                <th scope="col" class="px-4 py-3"><span class="sr-only">Acciones</span></th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                            @fragment('tabla-alumnos')
                                @forelse($alumnos as $alumno)
                                    <tr class="border-b dark:border-gray-700" id="alumno-{{ $alumno->matricula }}">
                                        <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $alumno->matricula }}</th>
                                        <td class="px-4 py-3">{{ $alumno->nombre }}</td>
                                        <td class="px-4 py-3">{{ $alumno->apell_paterno . ' ' . $alumno->apell_materno }}</td>
                                        <td class="px-4 py-3">{{ $alumno->correo }}</td>
                                        <td class="px-4 py-3">{{ $alumno->semestre }}</td>
                                        <td class="px-4 py-3">{{ $alumno->carrera }}</td>
                                        <td class="px-4 py-3">{{ $alumno->estatus }}</td>
                                        <td class="px-4 py-3 flex items-center justify-end space-x-3">
                                            <button type="button" data-id="{{ $alumno->matricula }}"
                                                class="btn-editar-alumno font-medium text-primary-600 hover:underline">Editar</button>
                                            <button type="button" data-id="{{ $alumno->matricula }}"
                                                class="btn-eliminar font-medium text-red-600 hover:underline">Eliminar</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center py-4 text-gray-500">
                                            No se encontraron alumnos registrados.
                                        </td>
                                    </tr>
                                @endforelse
                            @endfragment

                        </tbody>
                    </table>
                </div>

                <nav
                    class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4">
                    {{ $alumnos->links() }}
                </nav>
            </div>
        </div>
    </div>
@endsection

<div id="modal-individual" class="fixed inset-0 z-50 hidden bg-gray-900/50 backdrop-blur-sm flex justify-center items-center p-4">
    <div class="relative bg-white rounded-lg shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto p-6">
        <div class="flex items-center justify-between border-b pb-3 mb-4">
            <h3 class="text-lg font-bold text-gray-900">REGISTRAR ALUMNO</h3>
            <button type="button" class="btn-close-modal text-gray-400 hover:text-gray-900" data-modal="modal-individual">✕</button>
        </div>
        
        @include('alumnos.individualform')
    </div>
</div>

<div id="modal-editar-alumno" class="fixed inset-0 z-50 hidden bg-gray-900/50 backdrop-blur-sm flex justify-center items-center p-4">
    <div class="relative bg-white rounded-lg shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto p-6">
        <div class="flex items-center justify-between border-b pb-3 mb-4">
            <h3 class="text-lg font-bold text-gray-900">EDITAR ALUMNO</h3>
            <button type="button" class="btn-close-modal text-gray-400 hover:text-gray-900" data-modal="modal-editar-alumno" aria-label="Cerrar">✕</button>
        </div>

        <form id="form-editar-alumno" action="#" method="POST" class="mx-auto w-full max-w-lg">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="edit-matricula" class="mb-2 block text-sm font-medium">Matrícula</label>
                <input id="edit-matricula" name="matricula" type="text" readonly class="block w-full rounded-base border border-default-medium bg-gray-100 px-3 py-2.5 text-sm">
            </div>
            <div class="mb-4">
                <label for="edit-curp" class="mb-2 block text-sm font-medium">CURP</label>
                <input id="edit-curp" name="curp" type="text" required class="block w-full rounded-base border border-default-medium px-3 py-2.5 text-sm">
            </div>
            <div class="mb-4">
                <label for="edit-nombre" class="mb-2 block text-sm font-medium">Nombre</label>
                <input id="edit-nombre" name="nombre" type="text" required class="block w-full rounded-base border border-default-medium px-3 py-2.5 text-sm">
            </div>
            <div class="grid gap-4 md:grid-cols-2">
                <div class="mb-4">
                    <label for="edit-apell-paterno" class="mb-2 block text-sm font-medium">Apellido paterno</label>
                    <input id="edit-apell-paterno" name="apell_paterno" type="text" required class="block w-full rounded-base border border-default-medium px-3 py-2.5 text-sm">
                </div>
                <div class="mb-4">
                    <label for="edit-apell-materno" class="mb-2 block text-sm font-medium">Apellido materno</label>
                    <input id="edit-apell-materno" name="apell_materno" type="text" required class="block w-full rounded-base border border-default-medium px-3 py-2.5 text-sm">
                </div>
            </div>
            <div class="grid gap-4 md:grid-cols-3">
                <div class="mb-4">
                    <label for="edit-semestre" class="mb-2 block text-sm font-medium">Semestre</label>
                    <input id="edit-semestre" name="semestre" type="number" min="1" max="20" required class="block w-full rounded-base border border-default-medium px-3 py-2.5 text-sm">
                </div>
                <div class="mb-4">
                    <label for="edit-carrera" class="mb-2 block text-sm font-medium">Carrera</label>
                    <select id="edit-carrera" name="carrera" required class="block w-full rounded-base border border-default-medium px-3 py-2.5 text-sm">
                        <option value="Eléctrica">Eléctrica</option>
                        <option value="Electrónica">Electrónica</option>
                        <option value="Computación">Computación</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="edit-estatus" class="mb-2 block text-sm font-medium">Estatus</label>
                    <select id="edit-estatus" name="estatus" required class="block w-full rounded-base border border-default-medium px-3 py-2.5 text-sm">
                        <option value="Inscrito">Inscrito</option>
                        <option value="Articulo">Articulo</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="rounded-base bg-brand px-4 py-2.5 text-sm font-medium text-white hover:bg-brand-strong">Guardar cambios</button>
        </form>
    </div>
</div>

<div id="modal-excel" class="fixed inset-0 z-50 hidden bg-gray-900/50 backdrop-blur-sm flex justify-center items-center p-4">
    <div class="relative bg-white rounded-lg shadow-xl w-full max-w-6xl max-h-[100vh] overflow-y-auto p-6">
        <div class="flex items-center justify-between border-b pb-3 mb-4">
            <h3 class="text-lg font-bold text-gray-900">IMPORTAR DESDE EXCEL</h3>
            <button type="button" class="btn-close-modal text-gray-400 hover:text-gray-900" data-modal="modal-excel">✕</button>
        </div>
        
        @include('alumnos.excelform')
    </div>
</div>

@vite(['resources/js/admin/alum.js'])
