<div class="container">
    <div class="row">
        <div class="col-8 mx-auto mt-4">
            <div class="card">
                <div class="card-header">
                    Comments
                </div>
                <div class="card-body">
                    <div class="col-12">
                        <form wire:submit.prevent="addComment">
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
                                <span class="fw-bold text-capitalize">{{ $comment['user'] }}</span> -- <span
                                    class="text-dark fs-6 lh-sm">{{ $comment['created_at'] }}</span>
                            </div>
                            <div class="card-body">
                                <div class="col-12">
                                    {{ $comment['body'] }}
                                </div>
                            </div>
                        </div>
                    @empty
                        <mark>No Comments found</mark>
                    @endforelse

                </div>
            </div>
        </div>
    </div>

</div>
