<?php

namespace App\Http\Livewire;

use App\Models\Comments as ModelsComments;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Comments extends Component
{

    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap',
        $rules = [
            'content' => 'required|min:6|max:255',
            'photo' => 'image|max:1024'
        ];

    public $photo,
        $content;




    public function addComment()
    {
        $this->validate();
        // upload photo to the server
        $this->photo->store('photos');

        ModelsComments::Create([
            "body" => $this->content,
            "user_id" => rand(1, 10),
            "image" => $this->photo != null ? $this->photo->getFilename() : null,
        ]);

        $this->content = "";
        $this->photo = null;
        session()->flash('message', 'Comment Added successfully.');
    }

    public function removeComment($commentId)
    {
        ModelsComments::findOrFail($commentId);
        session()->flash('message', 'Comment Removed successfully.');
    }

    public function render()
    {
        return view('livewire.comments', [
            'comments' => ModelsComments::latest()->paginate(10)
        ]);
    }
}
