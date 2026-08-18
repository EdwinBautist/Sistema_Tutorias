@extends('layouts.main')

@section('title', 'Alumnos')

@section('content')
<div align="center" class="w-200">
    <h2>INSERTAR ALUMNO</h2>
    <br>

    <form action="{{ route('alumnos.store') }}" class="x mx-auto" class="w-full max-w-lg" method="POST">

        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="matricula" id="matricula"
                class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-brand peer"
                placeholder=" " required />
            <label for="floating_company"
                class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-fg-brand peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Matrícula</label>
        </div>

        <div class="relative z-0 w-full mb-5 group">
            <input type="password" name="contrasena" id="contrasena"
                class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-brand peer"
                placeholder=" " required />
            <label for="alum_password"
                class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-fg-brand peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Contrasena</label>
        </div>

        <div class="relative z-0 w-full mb-5 group">
            <input type="email" name="correo" id="correo"
                class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-brand peer"
                placeholder=" " required />
            <label for="alum_email"
                class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-fg-brand peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Correo
                Institucional</label>
        </div>

        <div class="grid md:grid-cols-3 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="nombre" id="nombre"
                    class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-brand peer"
                    placeholder=" " required />
                <label for="alum_nombre"
                    class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-fg-brand peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Nombre</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="apell_paterno" id="alum_paterno"
                    class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-brand peer"
                    placeholder=" " required />
                <label for="alum_paterno"
                    class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-fg-brand peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Apellido
                    Paterno</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="apell_materno" id="apell_paterno"
                    class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-brand peer"
                    placeholder=" " required />
                <label for="alum_materno"
                    class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-fg-brand peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Apellido
                    Materno</label>
            </div>
        </div>

        <div class="grid md:grid-cols-3 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <input type="number" name="semestre" id="semestre"
                    class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-brand peer"
                    placeholder=" " required />
                <label for="semestre"
                    class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-fg-brand peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Semestre</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <label for="carrera" class="block mb-2.5 text-sm font-medium text-heading">Carrera</label>
                <select id="carrera" name="carrera"
                    class="block w-full px-3 py-2.5 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body">
                    <option value="Eléctrica">Eléctrica</option>
                    <option value="Electrónica">Electrónica</option>
                    <option value="Computación">Computación</option>
                </select>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <label for="estatus" class="block mb-2.5 text-sm font-medium text-heading">Estatus</label>
                <select id="estatus" name="estatus"
                    class="block w-full px-3 py-2.5 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body">
                    <option value="Inscrito">Inscrito</option>
                    <option value="Articulo">Articulo</option>
                </select>
            </div>
        </div>
        <button type="submit"
            class="text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Subir</button>
    </form>

    <br>
    <div class="border-dashed rounded-base border-1 rounded-base">
    <br>
    <h2>SELECCIONE UN ARCHIVO .CSV</h2>
    
    <form class="max-w-lg mx-auto">
        <div class="relative z-0 w-full mb-5 group">
        <input
            class="cursor-pointer bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full shadow-xs placeholder:text-body"
            id="file_input" type="file" accept=".csv">
        </div>
        <button type="submit"
            class="text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Subir</button>
    </form>
    <br>
    </div>
</div>
@endsection