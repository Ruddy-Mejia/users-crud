<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class UsersDelete extends Component
{
    public $userId, $isModalOpen = false;
    public $toastMessage = '';

    public function mount($userId)
    {
        $this->userId = $userId;
    }

    public function deleteUser()
    {
        User::find($this->userId)->delete();
        $this->toastMessage = 'Se eliminó correctamente';
        $this->closeModal();
    }

    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }

    public function render()
    {
        return view('livewire.users-delete');
    }
}
