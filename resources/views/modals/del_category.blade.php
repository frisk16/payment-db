<div class="modal fade" id="delCategoryModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5></h5>
            </div>
            <form action="" method="post" name="delCategoryForm">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <p>カテゴリーを削除すると、それに関連する支払い履歴も全て削除されてしまいます。</p>
                    <br>
                    <p>本当によろしいですか？</p>
                </div>
                <div class="modal-footer">
                    <span class="btn btn-secondary" data-bs-dismiss="modal">閉じる</span>
                    <button type="submit" class="btn btn-danger">削除</button>
                </div>
            </form>
        </div>
    </div>
</div>
