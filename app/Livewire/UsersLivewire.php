<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;


class UsersLivewire extends Component
{

    public $search = '', $cards = true;
    public $isModalOpen = false;
    public $modalType = '';
    public $deleteId = '';
    public $user_to_view = '';
    public $toastMessage = '';

    public function toogleModal()
    {
        $this->isModalOpen = !$this->isModalOpen;
    }

    public function toogleView()
    {
        $this->cards = !$this->cards;
    }

    public function viewUser($id)
    {
        $this->modalType = 'view';
        $this->toogleModal();
        $this->user_to_view = User::find($id);
    }

    public function confirmDelete($id)
    {
        $this->modalType = 'delete';
        $this->deleteId = $id;
        // $this->toogleModal();
    }

    public function deleteUser($id)
    {
        User::find($id)->delete();
    }


    public function confirmUpdate($id)
    {
        $this->modalType = 'update';
        $user = User::find($id);
        // dd($user);
    }

    public function updateUser($id)
    {
        // $user = User::find($id);
        User::whereId($this->userId)->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);
        // User::whereId($id)=
        // $this->validate();
        // if ($this->photo_path) {
        //     $photo_path = $this->photo_path->store('photos', 'public');
        // }
        // User::create([
        //     'role_id' => $this->role,
        //     'name' => $this->name,
        //     'lastname' => $this->lastname,
        //     'email' => $this->email,
        //     'password' => Hash::make($this->name . $this->phone),
        //     'address' => $this->address,
        //     'gender' => $this->gender,
        //     'phone' => $this->phone,
        //     'photo_path' => $photo_path,
        //     'status' => 1,
        // ]);

        // $this->toastMessage = 'Usuario creado exitosamente';
        // $this->toastMessage = $photo_path;
        $this->closeModal();
        $this->resetForm();
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
