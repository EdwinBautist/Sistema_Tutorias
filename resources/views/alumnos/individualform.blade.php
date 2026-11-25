<div class="border-dashed rounded-base border-1 p-4 text-center">
<form id="form-crear-alumno" action="{{ route('alumnos.store') }}" class="x mx-auto w-full max-w-lg" method="POST">
    @csrf

    <div class="relative z-0 w-full mb-5 group">
        <label for="matricula" class="block mb-2.5 text-sm font-medium text-heading">Matrícula</label>
        <input type="text" name="matricula" id="matricula" value="{{old('matricula')}}"
            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="Matricula"/>
            @error('matricula', 'individualform')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
    </div>

    <div class="relative z-0 w-full mb-5 group">
        <label for="curp" class="block mb-2.5 text-sm font-medium text-heading">CURP</label>
        <input type="text" name="curp" id="curp" value="{{old('curp')}}"
            class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="CURP"/>
            @error('curp', 'individualform')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
    </div>

    <div class="grid md:grid-cols-3 md:gap-6">
        <div class="relative z-0 w-full mb-5 group">
            <label for="nombre" class="block mb-2.5 text-sm font-medium text-heading">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="{{old('nombre')}}"
                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="Nombre"/>
            @error('nombre','individualform')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <label for="alum_paterno" class="block mb-2.5 text-sm font-medium text-heading">Apellido Paterno</label>
            <input type="text" name="apell_paterno" id="alum_paterno" value="{{old('apell_paterno')}}"
                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="Apellido paterno"/>
            @error('apell_paterno','individualform')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <label for="apell_materno" class="block mb-2.5 text-sm font-medium text-heading">Apellido Materno</label>
            <input type="text" name="apell_materno" id="apell_paterno" value="{{old('apell_materno')}}"
                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="Apellido materno"/>
            @error('apell_materno', 'individualform')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>
    </div>

    <div class="grid md:grid-cols-3 md:gap-6">
        <div class="relative z-0 w-full mb-5 group">
            <label for="semestre" class="block mb-2.5 text-sm font-medium text-heading">Semestre</label>
            <input type="number" name="semestre" id="semestre" value="{{old('semestre')}}" min="1" max="20"
                class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="Semestre"/>
            @error('semestre', 'individualform')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
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
        class="text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
        Subir</button>
</form>
</div>