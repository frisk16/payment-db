<div class="modal fade" id="delPaymentModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5></h5>
            </div>
            <form action="" method="post" name="delPaymentForm">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <p>指定した日付のデータを削除します。</p>
                    <p>よろしいですか？</p>
                </div>
                <div class="modal-footer">
                    <span class="btn btn-secondary" data-bs-dismiss="modal">閉じる</span>
                    <button type="submit" class="btn btn-danger">削除</button>
                </div>
            </form>
        </div>
    </div>
</div>
