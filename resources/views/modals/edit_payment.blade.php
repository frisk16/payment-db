<div class="modal fade" id="editPaymentModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5></h5>
            </div>
            <form action="" method="post" name="editPaymentForm">
                @csrf
                @method('patch')
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="category_id" class="col-4 text-end">
                            カテゴリー名
                        </label>
                        <div class="col-6">
                            <select name="category_id" id="category_id"
                            class="form-control" required>

                                <option value="">-- 選択 --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="name" class="col-4 text-end">
                            支払い名
                        </label>
                        <div class="col-6">
                            <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror"
                            placeholder="20文字以内" required>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="price" class="col-4 text-end">
                            金額
                        </label>
                        <div class="col-6">
                            <input type="number" name="price" id="price"
                            class="form-control @error('price') is-invalid @enderror" step="1" required>
                        </div>
                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <label for="type" class="col-4 text-end">
                            支払い方法
                        </label>
                        <div class="col-6">
                            <select name="type" id="type" class="form-control" required>
                                <option value="">-- 選択 --</option>
                                @foreach($type_lists as $type_list)
                                    <option value="{{ $type_list['id'] }}">{{ $type_list['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="date" class="col-4 text-end">
                            日付
                        </label>
                        <div class="col-6">
                            <input type="text" name="date" id="editDate"
                            class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <span class="btn btn-secondary" data-bs-dismiss="modal">閉じる</span>
                    <button type="submit" class="btn btn-primary">編集</button>
                </div>
            </form>
        </div>
    </div>
</div>
