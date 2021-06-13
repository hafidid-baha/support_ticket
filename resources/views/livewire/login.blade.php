<div class="row">
    <div class="col-5 mx-auto mt-2">
        <div class="card bg-light border-0 p-4">
            <div class="card-body">
                <form wire:submit.prevent="loginUser">
                    @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input wire:model.lazy="email" type="email" class="form-control border-0" id="email"
                            aria-describedby="emailHelp">
                        @error('email')
                        <div id="emailHelp" class="form-text text-danger">{{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input wire:model.lazy="password" type="password" class="form-control border-0" id="password">
                        @error('password')
                        <div id="emailHelp" class="form-text text-danger">{{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">login</button>
                </form>
            </div>
        </div>
    </div>
</div>
