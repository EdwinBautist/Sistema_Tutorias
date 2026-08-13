<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <aside id="default-sidebar"
        class="fixed top-0 left-0 z-40 w-55 h-full transition-transform -translate-x-full sm:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-[#0E2773] border-e border-default">
            <ul class="space-y-2 font-medium">

                <li class="flex items-center px-2 py-1.5 text-white rounded-base hover:bg-neutral-tertiary">
                    BIENVENIDO
                </li>

                <x-sidebar href="/home" data-target="inicio">
                    <x-slot:icon>
                        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 20v-9l-4 1.125V20h4Zm0 0h8m-8 0V6.66667M16 20v-9l4 1.125V20h-4Zm0 0V6.66667M18 8l-6-4-6 4m5 1h2m-2 3h2" />
                        </svg>
                    </x-slot:icon>
                    Inicio
                </x-sidebar>



                <x-sidebar href="#" data-target="alumnos">
                    <x-slot:icon>
                        <svg class="w-6 h-6 text-white dark:text" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                d="M4.5 17H4a1 1 0 0 1-1-1 3 3 0 0 1 3-3h1m0-3.05A2.5 2.5 0 1 1 9 5.5M19.5 17h.5a1 1 0 0 0 1-1 3 3 0 0 0-3-3h-1m0-3.05a2.5 2.5 0 1 0-2-4.45m.5 13.5h-7a1 1 0 0 1-1-1 3 3 0 0 1 3-3h3a3 3 0 0 1 3 3 1 1 0 0 1-1 1Zm-1-9.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z" />
                        </svg>
                    </x-slot:icon>
                    Alumnos
                </x-sidebar>

                <x-sidebar href="#" data-target="profesor">
                    <x-slot:icon>
                        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                d="M12.1429 11v9m0-9c-2.50543-.7107-3.19099-1.39543-6.13657-1.34968-.48057.00746-.86348.38718-.86348.84968v7.2884c0 .4824.41455.8682.91584.8617 2.77491-.0362 3.45995.6561 6.08421 1.3499m0-9c2.5053-.7107 3.1067-1.39542 6.0523-1.34968.4806.00746.9477.38718.9477.84968v7.2884c0 .4824-.4988.8682-1 .8617-2.775-.0362-3.3758.6561-6 1.3499m2-14c0 1.10457-.8955 2-2 2-1.1046 0-2-.89543-2-2s.8954-2 2-2c1.1045 0 2 .89543 2 2Z" />
                        </svg>
                    </x-slot:icon>
                    Profesores
                </x-sidebar>

                <x-sidebar href="#" data-target="asesoria">
                    <x-slot:icon>
                        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.5713 5h7v9h-7m-6.00001-4-3 4.5m3-4.5v5m0-5h3.00001m0 0h5m-5 0v5m-3.00001 0h3.00001m-3.00001 0v5m3.00001-5v5m6-6 2.5 6m-3-6-2.5 6m-3-14.5c0 .82843-.67158 1.5-1.50001 1.5-.82843 0-1.5-.67157-1.5-1.5s.67157-1.5 1.5-1.5 1.50001.67157 1.50001 1.5Z" />
                        </svg>
                    </x-slot:icon>
                    Asesorías
                </x-sidebar>

                <x-sidebar href="#" data-target="tutoria">
                    <x-slot:icon>
                        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                d="M4.07141 14v6h5.99999v-6H4.07141Zm4.5-4h6.99999l-3.5-6-3.49999 6Zm7.99999 10c1.933 0 3.5-1.567 3.5-3.5s-1.567-3.5-3.5-3.5-3.5 1.567-3.5 3.5 1.567 3.5 3.5 3.5Z" />
                        </svg>
                    </x-slot:icon>
                    Tutorías
                </x-sidebar>

                <x-sidebar href="/logout" data-target="logout">
                    <x-slot:icon>
                        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                d="M16 12H4m12 0-4 4m4-4-4-4m3-4h2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3h-2" />
                        </svg>
                    </x-slot:icon>
                    Cerrar Sesión
                </x-sidebar>

            </ul>
        </div>
    </aside>

    <div class="p-4 sm:ml-64">
        <x-sidebar_alumnos data-panel="alumnos"    class="hidden"/>
        <x-sidebar_profesor data-panel="profesor"    class="hidden" />
        <x-sidebar_asesoria data-panel="asesoria"    class="hidden" />
        <x-sidebar_tutoria data-panel="tutoria"    class="hidden" />
           
        <div class="p-4 border-1 border-default border-dashed rounded-base">
            <!-- Aquí puedes empezar a borrar las cajas grises y meter tu información -->
            <div class="grid grid-cols-1 gap-4 mb-4" justify-center items-center>
                <div class="flex items-center justify-center h-24 rounded-base bg-neutral-secondary-soft">
                    <h1 class="text-heading font-bold text-xl"></h1>
                </div>
                <div class="flex items-center justify-center bg-neutral-secondary-soft">
                                        @yield('content')
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>
</body>

</html>
