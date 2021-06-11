<div class="container">
    <div class="row">
        <div class="col-8 mx-auto mt-4">
            <div class="card">
                <div class="card-header">
                    Comments
                </div>
                <div class="card-body">
                    <div class="col-12">
                        @if (session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        @error('content')
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @enderror
                        @error('photo')
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @enderror
                        <form wire:submit.prevent="addComment">
                            @if ($photo)
                            <div class="mb-2">
                                <img src="{{ $photo->temporaryUrl() }}" class="img-thumbnail"
                                    alt="selected Image Preview" width="200" height="200">
                            </div>
                            @endif
                            <div class="mb-3">
                                <label for="image" class="form-label">Comment Image (optional)</label>
                                <input wire:model="photo" accept="image/jpg" class="form-control form-control-sm"
                                    id="image" type="file">
                            </div>
                            <div class="input-group">
                                <input type="text" class="form-control" id="inlineFormInputGroupUsername"
                                    wire:model.lazy="content" placeholder="Comment">
                                <button class="btn btn-success" type="submit">Publish</button>
                            </div>
                        </form>
                    </div>
                    @forelse ($comments as $comment)
                    <div class="card mt-2">
                        <div class="card-header bg-none">
                            <span class="fw-bold text-capitalize">{{ $comment->user->name }}</span> -- <span
                                class="text-dark fs-6 lh-sm">{{ $comment->created_at->diffForHumans() }}</span>
                            <button type="button" wire:click="removeComment({{ $comment->id }})"
                                class="btn btn-light float-end">X</button>
                        </div>
                        <div class="card-body">
                            <div class="col-12">
                                {{ $comment->body }}
                            </div>
                        </div>
                    </div>
                    @empty
                    <mark>No Comments found</mark>
                    @endforelse
                    <span class="d-block mt-2"></span>
                    {{ $comments->links() }}
                </div>
            </div>
        </div>
    </div>

</div>
