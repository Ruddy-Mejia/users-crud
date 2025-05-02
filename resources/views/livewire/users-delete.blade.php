<div>
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
