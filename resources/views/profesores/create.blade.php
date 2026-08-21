@extends('layouts.main')

@section('title', 'Profesores')

@section('content')
<div align="center" class="w-200">
    <h2>INSERTAR PROFESOR</h2>

    <form action={{ route('profesores.store') }} class="x mx-auto" class="w-full max-w-lg" method="POST">

        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="num_empleado" id="num_empleado" value="{{old('num_empleado')}}"
                class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-brand peer"
                placeholder=" "/>
            <label for="n_empleado"
                class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-fg-brand peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Número
                de Empleado</label>
                
                @error('num_empleado')
                <p>{{$message}}</p>
                @enderror
        </div>

        <div class="relative z-0 w-full mb-5 group">
            <input type="password" name="contrasena" id="contrasena" value="{{old('contrasena')}}"
                class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-brand peer"
                placeholder=" "/>
            <label for="floating_password"
                class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-fg-brand peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Contrasena</label>
        </div>

        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="correo" id="correo" value="{{old('correo')}}"
                class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-brand peer"
                placeholder=" "/>
            <label for="correo"
                class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-fg-brand peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Correo
                Institucional</label>

                @error('correo')
                <p>{{$message}}</p>
                @enderror
        </div>

        <div class="grid md:grid-cols-3 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="nombre" id="nombre" value="{{old('nombre')}}"
                    class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-brand peer"
                    placeholder=" "/>
                <label for="floating_apell_nombre"
                    class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-fg-brand peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Nombre</label>
                @error('nombre')
                    <p>{{$message}}</p>
                @enderror
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="apell_paterno" id="apell_paterno" value="{{old('apell_paterno')}}"
                    class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-brand peer"
                    placeholder=" "/>
                <label for="floating_apell_paterno"
                    class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-fg-brand peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Apellido
                    Paterno</label>
                @error('apell_paterno')
                    <p>{{$message}}</p>
                @enderror
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="apell_materno" id="apell_materno" value="{{old('apell_paterno')}}"
                    class="block py-2.5 px-0 w-full text-sm text-heading bg-transparent border-0 border-b-2 border-default-medium appearance-none focus:outline-none focus:ring-0 focus:border-brand peer"
                    placeholder=" "/>
                <label for="floating_last_name"
                    class="absolute text-sm text-body duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-fg-brand peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Apellido
                    Materno</label>
                @error('apell_materno')
                    <p>{{$message}}</p>
                @enderror
            </div>
        </div>

        <div class="grid md:grid-cols-3 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <label for="countries" class="block mb-2.5 text-sm font-medium text-heading">Tutor</label>
                <select id="tutor" name="tutor"
                    class="block w-full px-3 py-2.5 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body">
                    <option value=0>No</option>
                    <option value=1>Sí</option>
                </select>
            </div>
            <div class="relative z-0 w-full mb-5 group">

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
            id="file_input" type="file">
        </div>
        <button type="submit"
            class="text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Subir</button>
    </form>
    <br>
    </div>
</div>
@endsection