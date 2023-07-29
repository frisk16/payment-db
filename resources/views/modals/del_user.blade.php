<div class="modal fade" id="delUserModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">パスワード確認</h5>
            </div>
            <form action="{{ route('users.delete') }}" method="post">
                @csrf
                @method('patch')
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="current_password" class="col-10 mx-auto">
                            現在のパスワードを入力
                        </label>
                        <div class="col-10 mx-auto">
                            <input type="password" name="current_password" id="current_password"
                            class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <span class="btn btn-secondary" data-bs-dismiss="modal">閉じる</span>
                    <button type="submit" class="btn btn-danger">登録を解除</button>
                </div>
            </form>
        </div>
    </div>
</div>
