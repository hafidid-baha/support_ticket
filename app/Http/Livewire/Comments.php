<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class Comments extends Component
{
    public $comments;
    public $content;

    public function mount()
    {
        $this->comments = array(
            array(
                "body" => "hi thiere this is my comment body created and ready to be tested",
                "user" => "hafid",
                "created_at" => Carbon::now()->diffForHumans()
            )
        );
    }

    public function addComment()
    {
        array_unshift(
            $this->comments,
            array(
                "body" => $this->content,
                "user" => "hafid",
                "created_at" => Carbon::now()->diffForHumans()
            )
        );
        $this->content = "";
    }

    public function render()
    {
        return view('livewire.comments');
    }
}
