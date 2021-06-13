<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public $username;
    public $email;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'username' => 'required|min:6|max:255',
        'email' => 'required|email',
        'password' => 'required|confirmed|min:3',
    ];

    public function render()
    {
        return view('livewire.register');
    }

    public function registerUser()
    {
        $this->validate();

        User::create([
            'name' => $this->username,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        return redirect()->route("login");
    }
}
