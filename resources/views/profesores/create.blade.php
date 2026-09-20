@extends('layouts.main')

@section('title', 'Profesores')

@section('content')
<div align="center" class="w-200">
    <h2>INSERTAR PROFESOR</h2>
    <br>

    <form action={{ route('profesores.store') }} class="x mx-auto" class="w-full max-w-lg" method="POST">

        <div class="relative z-0 w-full mb-5 group">
            <label for="n_empleado"
                class="block mb-2.5 text-sm font-medium text-heading">
                Número de Empleado</label>
            <input type="text" name="num_empleado" id="num_empleado" value="{{old('num_empleado')}}"
                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="No. de empleado"/>
                
                @error('num_empleado')
                <p>{{$message}}</p>
                @enderror
        </div>

        <div class="relative z-0 w-full mb-5 group">
            <label for="floating_password"
                class="block mb-2.5 text-sm font-medium text-heading">
                CURP</label>
            <input type="password" name="curp" id="curp" value="{{old('curp')}}"
                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="CURP"/>
            
        </div>

        <div class="relative z-0 w-full mb-5 group">
            <label for="correo"
                class="block mb-2.5 text-sm font-medium text-heading">
                Correo Institucional</label>
            <input type="text" name="correo" id="correo" value="{{old('correo')}}"
                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="matricula@umich.mx"/>
            
                @error('correo')
                <p>{{$message}}</p>
                @enderror
        </div>

        <div class="grid md:grid-cols-3 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <label for="floating_apell_nombre"
                    class="block mb-2.5 text-sm font-medium text-heading">
                    Nombre</label>
                <input type="text" name="nombre" id="nombre" value="{{old('nombre')}}"
                    class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="Nombre"/>
                
                @error('nombre')
                    <p>{{$message}}</p>
                @enderror
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <label for="floating_apell_paterno"
                    class="block mb-2.5 text-sm font-medium text-heading">
                    Apellido
                    Paterno</label>
                <input type="text" name="apell_paterno" id="apell_paterno" value="{{old('apell_paterno')}}"
                    class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="Apellido paterno"/>
                
                @error('apell_paterno')
                    <p>{{$message}}</p>
                @enderror
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <label for="floating_last_name"
                    class="block mb-2.5 text-sm font-medium text-heading">
                    Apellido
                    Materno</label>
                <input type="text" name="apell_materno" id="apell_materno" value="{{old('apell_paterno')}}"
                    class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="Apellido materno   "/>
                
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
    <form class="max-w-lg mx-auto" method="POST" action={{route('profesores.import')}} >
        <div class="relative z-0 w-full mb-5 group">
        <input
            class="cursor-pointer bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full shadow-xs placeholder:text-body"
            id="file_input" type="file" accept=".csv" name="archivo">
        </div>
        <button type="submit"
            class="text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Subir</button>
    </form>
    <br>
    </div>
</div>
@endsection