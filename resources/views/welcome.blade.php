<x-guest-layout>
    <div class="flex flex-col items-center justify-center">
        <p class="text-2xl font-semibold mb-6 text-gray-800 dark:text-gray-100">Welcome to rmejiam's users-crud</p>

        <x-primary-button>
            <a href="{{ route('login') }}">
                LOGIN
            </a>
        </x-primary-button>
    </div>
</x-guest-layout>
