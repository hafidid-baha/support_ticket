<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $sum = 1;

    public function increment(){
        $this->sum++;
    }

    public function decrement(){
        $this->sum--;
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
