@extends('layouts.main')

@section('title', 'Alumnos')

@section('content')
<div align="center" class="w-200">
    <h2>INSERTAR ALUMNO</h2>
    <br>

    <form action="{{ route('alumnos.store') }}" class="x mx-auto" class="w-full max-w-lg" method="POST">

        <div class="relative z-0 w-full mb-5 group">
            <label for="floating_company"
                class="block mb-2.5 text-sm font-medium text-heading">Matrícula</label>
            <input type="text" name="matricula" id="matricula" value="{{old('matricula')}}"
                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="Matricula"/>
                @error('matricula')
                <p>{{$message}}</p>
                @enderror
        </div>

        <div class="relative z-0 w-full mb-5 group">
            <label for="curp"
                class="block mb-2.5 text-sm font-medium text-heading">
                CURP</label>
            <input type="text" name="curp" id="curp" value="{{old('curp')}}"
                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="CURP"/>
            
        </div>

        <div class="grid md:grid-cols-3 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <label for="alum_nombre"
                    class="block mb-2.5 text-sm font-medium text-heading">
                    Nombre</label>
                <input type="text" name="nombre" id="nombre" value="{{old('nombre')}}"
                    class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="Nombre"
                    placeholder=" "/>
                @error('nombre')
                <p>{{$message}}</p>
                @enderror
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <label for="alum_paterno"
                    class="block mb-2.5 text-sm font-medium text-heading">
                    Apellido
                    Paterno</label>
                <input type="text" name="apell_paterno" id="alum_paterno" value="{{old('apell_paterno')}}"
                    class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="Apellido paterno"/>
                @error('apell_paterno')
                <p>{{$message}}</p>
                @enderror
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <label for="apell_materno"
                    class="block mb-2.5 text-sm font-medium text-heading">
                    Apellido
                    Materno</label>
                <input type="text" name="apell_materno" id="apell_paterno" value="{{old('apell_materno')}}"
                    class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="Apellido materno"/>
                @error('apell_materno')
                <p>{{$message}}</p>
                @enderror
            </div>
        </div>

        <div class="grid md:grid-cols-3 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <label for="semestre"
                    class="block mb-2.5 text-sm font-medium text-heading">
                    Semestre</label>
                <input type="number" name="semestre" id="semestre" value="{{old('semestre')}}" min="1" max="20"
                    class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                    placeholder="Semestre"/>
                @error('semestre')
                <p>{{$message}}</p>
                @enderror
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
    <h2>SELECCIONE UN ARCHIVO EXCEL</h2>

    <!-- Este body card nos va a ayudar a mostrar en una tabla todos los errores que vayamos a ir recolectando al leer el archivo -->
<div class="card-body">
    <!-- Mensaje de Éxito -->
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>            
    @endif

    <!-- Mensaje de Advertencia General -->
    @if (session('warning'))
        <div class="alert alert-warning" role="alert">
            {{ session('warning') }}
        </div>            
    @endif

    <!-- Errores de Validación Básicos (Formulario) -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>            
    @endif

    <!-- Errores Específicos por Fila del Excel -->
    @if (session()->has('failures'))
        <div class="table-responsive my-3">
            <table class="table table-danger table-bordered align-middle">
                <thead>
                    <tr>
                        <th>Fila Excel</th>
                        <th>Columna</th>
                        <th>Errores Encontrados</th>
                        <th>Valor Enviado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (session()->get('failures') as $validation)
    <tr>
        {{-- Soporta tanto sintaxis de Objeto como de Array --}}
        <td>{{ is_array($validation) ? ($validation['row'] ?? 'N/A') : $validation->row() }}</td>
        <td>
            <code>{{ is_array($validation) ? ($validation['attribute'] ?? '') : $validation->attribute() }}</code>
        </td>
        <td>
            <ul class="mb-0">
                @php
                    $eList = is_array($validation) 
                        ? ($validation['errors'] ?? []) 
                        : $validation->errors();
                @endphp
                @foreach ($eList as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </td>
        <td>
            @php
                $values = is_array($validation) 
                    ? ($validation['values'] ?? []) 
                    : $validation->values();
                $attr = is_array($validation) 
                    ? ($validation['attribute'] ?? '') 
                    : $validation->attribute();
            @endphp
            {{ $values[$attr] ?? 'N/A / Vacío' }}
        </td>
    </tr>
@endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
    
    <!-- Este formulario es el que tiene la tarea de recibir el archivo excel -->
    <form class="max-w-lg mx-auto" method="POST" action="{{ route('alumnos.import') }}" enctype="multipart/form-data">
        @csrf
        <div class="relative z-0 w-full mb-5 group">
        <input
            class="cursor-pointer bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full shadow-xs placeholder:text-body"
            id="file_input" type="file" accept=".xlsx, .xls" name="alumimport">
        </div>
        <button type="submit"
            class="text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Subir</button>
    </form>
    <br>
    </div>
</div>
@endsection

