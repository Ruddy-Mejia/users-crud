<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class UsersDelete extends Component
{
    public $toastMessage = '';

    public function mount(){}

    public function render()
    {
        return view('livewire.users-delete');
    }
}
