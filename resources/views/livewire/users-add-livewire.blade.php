<div>
    <button wire:click="openModal"
        class="flex items-centerw-28 rounded-md p-3 bg-indigo-700  hover:bg-indigo-950 text-slate-50">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="size-6" id="addModal">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
        </svg>
        Añadir
    </button>
    <div>
        @if ($isModalOpen)
            <form class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center z-50"
                wire:submit.prevent="createUser">
                <div class="bg-slate-50 dark:bg-slate-800 rounded-lg p-6 lg:w-1/3 sm:w-11/12 md:w-10/12">
                    <h2 class="text-xl font-bold mb-4">Añadir un usuario</h2>

                    {{-- <p class="text-sm pb-2">Nombre</p> --}}
                    <div class="py-2">
                        <p class="text-sm">Nombres</p>
                        <input type="text" wire:model.live.debounce.500ms="name"
                            class="rounded-xl focus:ring-0 p-3 border-0 bg-slate-200 dark:bg-slate-700 w-full"
                            placeholder="John">
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="py-2">
                        <p class="text-sm">Apellidos</p>
                        <input type="text" wire:model.live.debounce.500ms="lastname"
                            class="rounded-xl focus:ring-0 p-3 border-0 bg-slate-200 dark:bg-slate-700 w-full"
                            placeholder="Doe">
                        @error('lastname')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="py-2">
                        <p class="text-sm">Email</p>
                        <input type="text" wire:model.live.debounce.500ms="email"
                            class="rounded-xl focus:ring-0 p-3 border-0 bg-slate-200 dark:bg-slate-700 w-full"
                            placeholder="example@example.com">
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="py-2">
                        <p class="text-sm">Dirección</p>
                        <input type="text" wire:model.live.debounce.500ms="address"
                            class="rounded-xl focus:ring-0 p-3 border-0 bg-slate-200 dark:bg-slate-700 w-full"
                            placeholder="Avenida La Paz 412">
                        @error('address')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="py-2">
                        <p class="text-sm">Teléfono</p>
                        <input type="number" wire:model.live.debounce.500ms="phone"
                            class="rounded-xl focus:ring-0 p-3 border-0 bg-slate-200 dark:bg-slate-700 w-full"
                            placeholder="+56997914187">
                        @error('phone')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="pt-4 flex space-x-4 items-baseline">
                        <p class="text-sm">Género</p>
                        <select wire:model.live.debounce.500ms="gender" id="gender"
                            class="rounded-xl focus:ring-0 p-3 border-0 bg-slate-200 dark:bg-slate-700 w-1/2">
                            <option value="" selected {{ is_null($gender) ? 'selected' : '' }}>Seleccione el género</option>
                            <option value="male">Masculino</option>
                            <option value="female">Femenino</option>
                        </select>

                        <p class="text-sm">Rol</p>
                        <select wire:model.live.debounce.500ms="role" id="role"
                            class="rounded-xl focus:ring-0 p-3 border-0 bg-slate-200 dark:bg-slate-700 w-1/2">
                            <option value="" selected >Seleccione el rol</option>
                            <option value="1">Administrador</option>
                            <option value="2">Estudiante</option>
                        </select>

                    </div>
                    @error('gender')
                        <p class="text-red-500 text-sm mt-1 pt-2">{{ $message }}</p>
                    @enderror
                    @error('role')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <div class="py-2">
                        <p class="text-sm pb-1">Foto</p>
                        <div class="flex items-center space-x-6">
                            <div class="shrink-0">
                                <img id="preview_img" class="h-16 w-16 object-cover rounded-md"
                                    src="{{ $photo_path ? $photo_path->temporaryUrl() : 'https://avatar.iran.liara.run/public/boy?username=Ash' }}"/>
                            </div>
                            <label class="block">
                                <span class="sr-only">Choose profile photo</span>
                                <input type="file" wire:model="photo_path"
                                    class="block w-full text-sm text-slate-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-md file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-slate-700 file:text-slate-50
                                    hover:file:bg-violet-100 hover:file:text-slate-700" />
                            </label>
                        </div>
                        @error('photo_path')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-4 space-x-2 flex justify-end">
                        <button wire:click="createUser"
                            class="bg-indigo-700 text-white px-4 py-2 rounded-md cursor-pointer hover:bg-indigo-900">
                            Añadir
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
            <div class="fixed top-5 right-5 z-50 text-white p-4 lg:w-1/6 sm:w-1/2 rounded-lg shadow-lg flex justify-between items-center bg-green-500 transition-opacity duration-300 ease-in-out"
                x-data="{ show: true, progress: 100 }" x-show="show" x-init="setTimeout(() => show = false, 3000)" x-transition:leave="opacity-0">
                <p class="truncate flex-grow">{{ $toastMessage }}</p>
                <button type="button" @click="show = false" class="ml-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="h-6 w-6 cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        @endif
    </div>
</div>
