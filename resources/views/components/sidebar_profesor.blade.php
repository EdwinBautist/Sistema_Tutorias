<aside id="sidebar_profesor" {{ $attributes->merge(['class' => 'fixed top-0 left-55 z-40 w-64 h-full transition-transform -translate-x-full sm:translate-x-0']) }}
            aria-label="Sidebar">
            <div class="h-full px-3 py-8 overflow-y-auto bg-[#F54927] border-e border-default">
                <ul>
                    <li class="flex items-center px-2 py-1.5 text-white rounded-base hover:bg-neutral-tertiary">
                        PROFESOR
                    </li>

                    <x-suboption href="/login">
                        <x-slot:icon>
                            <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M8 20v-9l-4 1.125V20h4Zm0 0h8m-8 0V6.66667M16 20v-9l4 1.125V20h-4Zm0 0V6.66667M18 8l-6-4-6 4m5 1h2m-2 3h2" />
                            </svg>
                        </x-slot:icon>
                        Buscar Profesor
                    </x-suboption>

                    <x-suboption href="/profesores/create">
                        <x-slot:icon>
                            <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M8 20v-9l-4 1.125V20h4Zm0 0h8m-8 0V6.66667M16 20v-9l4 1.125V20h-4Zm0 0V6.66667M18 8l-6-4-6 4m5 1h2m-2 3h2" />
                            </svg>
                        </x-slot:icon>
                        Agregar Profesor
                    </x-suboption>

                     <x-suboption href="/login">
                        <x-slot:icon>
                            <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M8 20v-9l-4 1.125V20h4Zm0 0h8m-8 0V6.66667M16 20v-9l4 1.125V20h-4Zm0 0V6.66667M18 8l-6-4-6 4m5 1h2m-2 3h2" />
                            </svg>
                        </x-slot:icon>
                        Eliminar Profesor
                    </x-suboption>

                     <x-suboption href="/login">
                        <x-slot:icon>
                            <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M8 20v-9l-4 1.125V20h4Zm0 0h8m-8 0V6.66667M16 20v-9l4 1.125V20h-4Zm0 0V6.66667M18 8l-6-4-6 4m5 1h2m-2 3h2" />
                            </svg>
                        </x-slot:icon>
                        Modificar Profesor
                    </x-suboption>
                </ul>
            </div>
        </aside>
