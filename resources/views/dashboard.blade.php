<x-app-layout>
    <x-slot name="header">
        <div class="header-container">
            <h2 class="font-semibold text-xl">
                {{ __('¡Bienvenid@!') }}
            </h2>
            <h4>
                Este es el panel de control para los empleados del estudio, aquí podrás gestionar todo lo relativo a las citas con los clientes.
            </h4>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
