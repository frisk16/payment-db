<div class="modal fade" id="editPasswordModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5>パスワード変更</h5>
            </div>
            <form action="{{ route('users.update_password') }}" method="post">
                @csrf
                @method('patch')
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="current_password" class="col-10 mx-auto">
                            現在のパスワードを入力
                        </label>
                        <div class="col-10 mx-auto">
                            <input type="password" name="current_password" id="current_password"
                            class="form-control" required placeholder="現在のパスワード">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password" class="col-10 mx-auto">
                            新しいパスワードを入力
                        </label>
                        <div class="col-10 mx-auto">
                            <input type="password" name="password" id="password"
                            class="form-control @error('password') is-invalid @enderror" required placeholder="8文字以上">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password_confirm" class="col-10 mx-auto">
                            確認の為もう一度入力
                        </label>
                        <div class="col-10 mx-auto">
                            <input type="password" name="password_confirm" id="password_confirm"
                            class="form-control" required placeholder="8文字以上">
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
