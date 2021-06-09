<?php

namespace App\Http\Livewire;

use App\Models\Comments as ModelsComments;
use Carbon\Carbon;
use Livewire\Component;

class Comments extends Component
{
    public $comments;
    public $content;

    protected $rules = [
        'content' => 'required|min:6|max:255'
    ];

    public function mount()
    {
        // $this->comments = ModelsComments::all()->sortBy('created_at');
        $this->comments = ModelsComments::orderBy('created_at','desc')->get();
    }

    public function addComment()
    {
        $this->validate();
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
