<div class="modal fade" id="editUserModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5>会員情報変更</h5>
            </div>
            <form action="{{ route('users.update') }}" method="post">
                @csrf
                @method('patch')
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="name" class="col-4 text-end">
                            {{ __('Name') }}
                        </label>
                        <div class="col-6">
                            <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror"
                            placeholder="5文字以上20文字以内" value="{{ $user->name }}" required>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-4 text-end">
                            {{ __('Email Address') }}
                        </label>
                        <div class="col-6">
                            <input type="email" name="email" id="email"
                            class="form-control @error('email') is-invalid @enderror"
                            placeholder="xxxx@xxxx.xx.xx" value="{{ $user->email }}" required>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="phone" class="col-4 text-end">
                            {{ __('Phone Number') }}
                        </label>
                        <div class="col-6">
                            <input type="tel" name="phone" id="phone"
                            class="form-control @error('phone') is-invalid @enderror" pattern="\d{2,4}-\d{2,4}-\d{3,4}"
                            placeholder="ハイフン必須" value="{{ $user->phone }}" required>

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <span class="btn btn-secondary" data-bs-dismiss="modal">閉じる</span>
                    <button type="submit" class="btn btn-primary">変更</button>
                </div>
            </form>
        </div>
    </div>
</div>
