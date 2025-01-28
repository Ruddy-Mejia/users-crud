<div>
    <button wire:click="openModal"
        class="flex items-centerw-28 p-3 bg-indigo-600  hover:bg-indigo-950 text-slate-50 dark:text-white w-16 h-8 justify-center items-center rounded-md">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
            <path fill-rule="evenodd"
                d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z"
                clip-rule="evenodd" />
        </svg>
    </button>

    @if ($isModalOpen)
        <form class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center text-center z-50">
            <div class="bg-slate-50 dark:bg-slate-800 rounded-lg p-6 lg:w-1/5 sm:w-1/2 md:w-10/16">
                <h2 class="text-xl font-bold mb-8">¿Estás seguro?</h2>
                <div class="mt-4 space-x-2 flex justify-center ">
                    <button value="{{ $userId }}" wire:click="deleteUser"
                        class=" flex text-black dark:text-white hover:bg-indigo-950 bg-indigo-600 px-4 py-2 justify-center items-center rounded-md">
                        Eliminar
                    </button>
                    <br>
                    <button wire:click="closeModal"
                        class="bg-cyan-950 text-white px-4 py-2 rounded-md cursor-pointer hover:bg-gray-900">
                        Cerrar
                    </button>
                </div>
            </div>
        </form>
    @endif
    @if ($toastMessage)
    <div class="fixed top-5 right-5 z-50 text-white p-4 lg:w-1/6 sm:w-1/2 rounded-lg shadow-lg flex justify-between items-center bg-yellow-600 transition-opacity duration-300 ease-in-out"
        x-data="{ show: true, progress: 100 }" x-show="show" x-init="setTimeout(() => show = false, 3000)" x-transition:leave="opacity-0">
        <p class="truncate flex-grow">{{ $toastMessage }}</p>
    </div>
    @endif
</div>
