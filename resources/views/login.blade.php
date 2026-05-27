<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Acceso</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="flex flex-col min-h-screen">

<div class="flex-1 flex items-center justify-center">
<div class="w-full max-w-sm">
    
    <img src="{{asset('img/FIE Escudo Azul Eléctrico.png') }}" alt="Escudo FIE">
    
</div>

<div class="w-full max-w-sm bg-neutral-primary-soft p-6 border border-default rounded-base shadow-xs">
    
    @if ($errors->any())
        <div class="mb-4 p-3 bg-red-50 border border-red-200 rounded-base">
            @foreach ($errors->all() as $error)
                <p class="text-sm text-red-600">{{ $error }}</p>
            @endforeach
        </div>
    @endif
    
    <form action="{{ route('login.store') }}" method="POST">
        @csrf
        <h5 class="text-xl font-semibold text-heading mb-6">Acceso Institucional</h5>
        <div class="mb-4">
            <label for="matricula" class="block mb-2.5 text-sm font-medium text-heading">Matrícula</label>
            <input type="text" id="matricula" name="matricula" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="" required value="{{ old('matricula') }}" />
        </div>
        <div>
            <label for="contrasena" class="block mb-2.5 text-sm font-medium text-heading ">Contraseña</label>
            <input type="password" id="contrasena" name="contrasena" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="" required />
        </div>
        <div class="flex items-start my-6">
            <a href="#" class="ms-auto text-sm font-medium text-fg-brand hover:underline">Olvidaste tu contraseña?</a>
        </div>
        <button type="submit" class="text-white bg-[#0E2773] box-border border border-transparent hover:bg-[#0F2859] focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none w-full mb-3">Iniciar Sesión</button>
        <div class="text-sm font-medium text-body tracking-normal">No estás registrado? <a href="#" class="text-fg-brand hover:underline">Registrate</a></div>
    </form>
</div>
</div>

<footer class="mt-auto bg-neutral-primary-soft rounded-base shadow-xs border border-default m-4">
    <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
      <span class="text-sm text-body sm:text-center">© 2026 <a href="https://www.fie.umich.mx/" class="hover:text-[#0E2773]">Facultad de Ingeniería Eléctrica - UMSNH</a>.
    </span>
    <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-body sm:mt-0">
        <li>
            <a href="#" class="hover:text-[#0E2773] me-4 md:me-6">Acerca De.</a>
        </li>
        <li>
            <a href="#" class="hover:text-[#0E2773] me-4 md:me-6">Política de Privacidad.</a>
        </li>
        <li>
            <a href="#" class="hover:text-[#0E2773] me-4 md:me-6">Licencia.</a>
        </li>
        <li>
            <a href="#" class="hover:text-[#0E2773]">Contacto.</a>
        </li>
    </ul>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>
</body>
</html>