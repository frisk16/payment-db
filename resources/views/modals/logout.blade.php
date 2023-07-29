<div class="modal fade" id="logoutModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5>ログアウト</h5>
            </div>
            <div class="modal-body">
                <p>ログアウトしますか？</p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <span class="btn btn-secondary" data-bs-dismiss="modal">閉じる</span>
                    <button type="submit" class="btn btn-danger">ログアウト</button>
                </form>
            </div>
        </div>
    </div>
</div>
