import './bootstrap';
import Alpine from 'alpinejs';

// Previene que Livewire cargue su propia versión
window.deferLoadingAlpine = function (callback) {
    window.addEventListener('livewire:load', callback);
};

window.Alpine = Alpine;
Alpine.start();
