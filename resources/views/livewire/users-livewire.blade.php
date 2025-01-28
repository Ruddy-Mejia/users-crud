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
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Zm6-10.125a1.875 1.875 0 1 1-3.75 0 1.875 1.875 0 0 1 3.75 0Zm1.294 6.336a6.721 6.721 0 0 1-3.17.789 6.721 6.721 0 0 1-3.168-.789 3.376 3.376 0 0 1 6.338 0Z" />
                  </svg>

                @endif
            </button>
        </div>
    </div>
    @if ($cards)
        <div class="grid lg:grid-cols-5 md:grid-cols-2 sm:grid-cols-1 gap-4 p-4" wire:poll.1s>
            {{-- <div class="grid lg:grid-cols-5 md:grid-cols-2 sm:grid-cols-1 gap-4 p-4"> --}}
            @foreach ($users as $user)
                <div>
                    <!-- Card start -->
                    <div
                        class="max-w-sm mx-auto bg-white dark:bg-gray-500 rounded-lg overflow-hidden transition ease-in-out duration-150">
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
    @endif


</div>
