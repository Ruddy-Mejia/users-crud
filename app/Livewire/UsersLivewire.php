<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;


class UsersLivewire extends Component
{

    public $search = '', $cards = true;


    public function toogleView(){
        $this->cards = !$this->cards;
    }

    public function render()
    {
        $users = User::query()
            ->where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orderBy('id', 'asc')
            ->paginate(10);

        return view('livewire.users-livewire', [
            'users' => $users,
        ]);
    }
}
