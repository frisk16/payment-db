<div class="modal fade" id="addCategoryModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5>カテゴリー追加</h5>
            </div>
            <form action="{{ route('categories.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="name" class="col-4 text-end">
                            カテゴリー名
                        </label>
                        <div class="col-6">
                            <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror"
                            placeholder="2文字以上8文字以内" value="{{ old('name') }}" required>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <span class="btn btn-secondary" data-bs-dismiss="modal">閉じる</span>
                    <button type="submit" class="btn btn-primary">追加</button>
                </div>
            </form>
        </div>
    </div>
</div>
