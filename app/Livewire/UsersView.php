<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class UsersView extends Component
{
    public $isModalOpen = false;
    public $role, $name, $lastname, $email, $address, $gender, $phone, $photo_path;

    public $userId;

    public function mount($userId)
    {
        $this->userId = $userId;
    }

    public function openModal()
    {
        $this->isModalOpen = true;
    }

    public function closeModal()
    {
        $this->isModalOpen = false;
    }
    public function getUser()
    {
        $this->openModal();
        $user = User::find($this->userId);
        $this->name = $user->name;

        $this->name = $user->name;
        $this->lastname = $user->lastname;
        $this->email = $user->email;
        $this->address = $user->address;
        $this->phone = $user->phone;
        $this->role = $user->role;
        $this->gender = $user->gender;
    }
    public function render()
    {
        return view('livewire.users-view');
    }
}
