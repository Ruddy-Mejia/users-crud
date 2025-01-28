<div class="p-10">
    <div class="px-4">
        <div class="justify-between flex items-center align-middle">
            <h1 class="text-2xl md:py-4 font-bold  w-full">Gestión de usuarios</h1>

            <input type="text" placeholder="Buscar..." wire:model.live="search"
                class="rounded-md dark:bg-slate-800 focus:outline-none focus:ring-0 p-3 border-0">
        </div>
        <div class="flex justify-between py-2 align-baseline">
            <livewire:users-add-livewire />
            <button class="rounded-md border-slate-600 border-2 bg-slate-800 p-2" wire:click="toogleView">
                @if ($cards)
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0ZM3.75 12h.007v.008H3.75V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm-.375 5.25h.007v.008H3.75v-.008Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                    </svg>
                @endif
                @if (!$cards)
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Zm6-10.125a1.875 1.875 0 1 1-3.75 0 1.875 1.875 0 0 1 3.75 0Zm1.294 6.336a6.721 6.721 0 0 1-3.17.789 6.721 6.721 0 0 1-3.168-.789 3.376 3.376 0 0 1 6.338 0Z" />
                    </svg>
                @endif
            </button>
        </div>
    </div>
    @if ($cards)
        {{-- <div class="grid lg:grid-cols-5 md:grid-cols-2 sm:grid-cols-1 gap-4 p-4" wire:poll.1s> --}}
        <div class="grid lg:grid-cols-5 md:grid-cols-2 sm:grid-cols-1 gap-4 p-4">
            @foreach ($users as $user)
                <div>
                    <!-- Card start -->
                    <div
                        class="max-w-sm mx-auto bg-slate-50 dark:bg-gray-500 rounded-lg overflow-hidden transition ease-in-out duration-150">
                        <div class="border-b px-4 pb-6">
                            <div class="text-center my-4">
                                <img class="h-32 w-32 rounded-full border-4 border-white dark:border-gray-800 mx-auto my-4"
                                    alt=""
                                    src="{{ $user->photo_path ? asset('storage/' . $user->photo_path) : 'https://i.pravatar.cc/300?u=' . $user->id }}">
                                <div class="py-2">
                                    <h3 class="font-bold text-2xl  dark:text-white mb-1">
                                        {{ $user->name . ' ' . $user->lastname }}
                                    </h3>
                                    <div class="inline-flex  dark: items-center">
                                        {{ $user->email }} <br> {{ $user->role->name }}
                                    </div>
                                </div>
                            </div>
                            <div class="flex px-2 justify-center gap-2">
                                <livewire:users-view :userId="$user->id" :key="'user-view-' . $user->id" />
                                <livewire:users-update :key="'user-update-' . $user->id" />
                                <livewire:users-delete :userId="$user->id" :key="'user-delete-' . $user->id" />
                            </div>
                        </div>
                    </div>
                    <!-- Card end -->
                </div>
            @endforeach
        </div>
        <div class="mt-4">
            {{ $users->links('pagination::tailwind') }}
        </div>
    @else
        <div class="p-4">
            <div class="overflow-y-hidden rounded-lg">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-indigo-700 text-left text-sm text-gray-100">
                                <th class="p-5">Nombre completo</th>
                                <th class="p-5">Rol</th>
                                <th class="p-5">Email</th>
                                <th class="p-5">Estado</th>
                                <th class="p-5">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-300">
                            @foreach ($users as $user)
                                <tr>
                                    <td class=" bg-slate-800 p-5 text-sm">
                                        <div class="flex items-center">
                                            <div class="h-10 w-10 flex-shrink-0">
                                                <img class="h-full w-full rounded-full"
                                                    src="{{ $user->photo_path ? asset('storage/' . $user->photo_path) : 'https://i.pravatar.cc/300?u=' . $user->id }}"
                                                    alt="" />
                                            </div>
                                            <div class="ml-3">
                                                <p class="whitespace-no-wrap">{{ $user->name . ' ' . $user->lastname }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class=" bg-slate-800 p-5 text-sm">
                                        <p class="whitespace-no-wrap">
                                            {{ $user->role->name == 'admin' ? 'Administrador' : 'Estudiante' }}</p>
                                    </td>
                                    <td class=" bg-slate-800 p-5 text-sm">
                                        <p class="whitespace-no-wrap">{{ $user->email }}</p>
                                    </td>

                                    <td class=" bg-slate-800 p-5 text-sm">
                                        @if ($user->status)
                                            <span
                                                class="rounded-full bg-green-200 px-3 py-1 text-xs font-semibold text-green-900">Activo
                                            </span>
                                        @else
                                            <span
                                                class="rounded-full bg-red-200 px-3 py-1 text-xs font-semibold text-red-900">Inactivo
                                            </span>
                                        @endif
                                    </td>
                                    <td class="bg-slate-800">
                                        <div class="flex px-2 gap-2">
                                            <livewire:users-view :userId="$user->id" :key="'user-view-list-' . $user->id" />
                                            <livewire:users-update :key="'user-update-list-' . $user->id" />
                                            <livewire:users-delete :userId="$user->id" :key="'user-delete-list-' . $user->id" />
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $users->links('pagination::tailwind') }}
                    </div>
                </div>
                {{-- <div class="flex flex-col items-center border-t bg-slate-800 p-5 sm:flex-row sm:justify-between">
                    <span class="text-xs text-gray-600 sm:text-sm"> Showing 1 to 5 of 12 Entries </span>
                    <div class="mt-2 inline-flex sm:mt-0">
                        <button
                            class="mr-2 h-12 w-12 rounded-full border text-sm font-semibold text-gray-600 transition duration-150 hover:bg-gray-100">Prev</button>
                        <button
                            class="h-12 w-12 rounded-full border text-sm font-semibold text-gray-600 transition duration-150 hover:bg-gray-100">Next</button>
                    </div>
                </div> --}}
            </div>
        </div>
    @endif


</div>
