<div class="container-fluid">
    <div class="row">
        <div class="col-5 mx-auto mt-2">
            <div class="card bg-light border-0">
                <div class="card-body">
                    <form wire:submit.prevent="registerUser">
                        <div class="mb-3">
                            <label for="username" class="form-label">User Name</label>
                            <input wire:model.lazy="username" type="text" class="form-control border-0" id="username"
                                aria-describedby="emailHelp">
                            @error('username')
                            <div id="emailHelp" class="form-text text-danger">{{ $message }}
                            </div>
                            @enderror

                        </div>
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
                            <input wire:model.lazy="password" type="password" class="form-control border-0"
                                id="password">
                            @error('password')
                            <div id="emailHelp" class="form-text text-danger">{{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="cpassword" class="form-label">Confirme Password</label>
                            <input wire:model.lazy="password_confirmation" type="password" class="form-control border-0"
                                id="cpassword">
                        </div>
                        <button type="submit" class="btn btn-success">Create Account</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
