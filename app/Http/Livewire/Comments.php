<?php

namespace App\Http\Livewire;

use App\Models\Comments as ModelsComments;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
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
            'photo' => 'image|max:1024|nullable'
        ];

    public $photo,
        $content;




    public function addComment()
    {
        $this->validate();
        // upload photo to the server
        if (!is_null($this->photo)) {
            $this->photo->storeAs('photos', $this->photo->getClientOriginalName());
        }
        ModelsComments::Create([
            "body" => $this->content,
            "user_id" => rand(1, 10),
            "image" => $this->photo != null ? $this->photo->getClientOriginalName() : null,
        ]);

        $this->content = "";
        $this->photo = null;
        session()->flash('message', 'Comment Added successfully.');
    }

    public function removeComment($commentId)
    {
        $selectedComment = ModelsComments::findOrFail($commentId);
        if ($selectedComment) {
            $file = storage_path('app/public/photos/' . $selectedComment->image);
            if (file_exists($file)) {
                Storage::disk('public')->delete('photos/' . $selectedComment->image);
            }
            $selectedComment->delete();
            session()->flash('message', 'Comment Removed successfully.');
        }
        session()->flash('message', 'Failed To Remove Your Comment.');
    }

    public function render()
    {
        return view('livewire.comments', [
            'comments' => ModelsComments::latest()->paginate(10)
        ]);
    }
}
