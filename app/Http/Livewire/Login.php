<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    protected $rules = [
        "email" => "required|email",
        "password" => "required|min:6",
    ];

    public function render()
    {
        return view('livewire.login');
    }

    public function loginUser()
    {
        $this->validate();

        if (Auth::attempt(array("email" => $this->email, "password" => $this->password))) {
            return redirect()->route('home');
        }
        session()->flash("message", "Please Enter Correct Email And Password");
    }
}
