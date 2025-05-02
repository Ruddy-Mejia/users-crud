<div>
    <button wire:click="getUser"
        class=" flex text-slate-50 hover:bg-indigo-950 bg-indigo-600 w-16 h-8 justify-center items-center rounded-md">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
            <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
            <path fill-rule="evenodd"
                d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                clip-rule="evenodd" />
        </svg>
    </button>
    <div>
        @if ($isModalOpen)
            <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50" x-data="{ open: true }" @click.away="open = false" x-show="open">
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 w-full max-w-md">
                    <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 text-center mb-4">
                        Información del Usuario
                    </h2>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="font-medium text-gray-700 dark:text-gray-300">Nombre:</span>
                            <span class="text-gray-900 dark:text-gray-100">{{ $name }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="font-medium text-gray-700 dark:text-gray-300">Apellido:</span>
                            <span class="text-gray-900 dark:text-gray-100">{{ $lastname }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="font-medium text-gray-700 dark:text-gray-300">Correo electrónico:</span>
                            <span class="text-gray-900 dark:text-gray-100">{{ $email }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="font-medium text-gray-700 dark:text-gray-300">Dirección:</span>
                            <span class="text-gray-900 dark:text-gray-100">{{ $address }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="font-medium text-gray-700 dark:text-gray-300">Teléfono:</span>
                            <span class="text-gray-900 dark:text-gray-100">{{ $phone }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="font-medium text-gray-700 dark:text-gray-300">Rol:</span>
                            <span class="text-gray-900 dark:text-gray-100">{{ Str::ucfirst($role->name) }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="font-medium text-gray-700 dark:text-gray-300">Género:</span>
                            <span class="text-gray-900 dark:text-gray-100">{{ $gender = 'male' ? 'Masculino' : 'Femenino' }}</span>
                        </div>
                    </div>

                    <!-- Botón Cerrar -->
                    <div class="mt-6 flex justify-end">
                        <button wire:click="closeModal"
                            class="px-4 py-2 text-sm font-medium text-gray-600 bg-gray-200 hover:bg-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">
                            Cerrar
                        </button>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
