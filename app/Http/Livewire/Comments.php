<?php

namespace App\Http\Livewire;

use App\Models\Comments as ModelsComments;
use Carbon\Carbon;
use Livewire\Component;

class Comments extends Component
{
    public $comments;
    public $content;

    public function mount()
    {
        $this->comments = ModelsComments::all();
    }

    public function addComment()
    {
        $createdComment = ModelsComments::Create([
            "body"=>$this->content,
            "user_id"=>"1"
        ]);
        $this->comments->prepend($createdComment);
        $this->content = "";
    }

    public function render()
    {
        return view('livewire.comments');
    }
}
