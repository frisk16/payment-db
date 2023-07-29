@extends('layouts.app')

@section('title')
    カテゴリー設定
@endsection

@push('scripts')
    <script src="{{ asset('js/categoriesPage.js') }}"></script>
@endpush

@section('content')
    @include('modals.add_category')
    @include('modals.edit_category')
    @include('modals.del_category')

    <div class="container">
        @include('messages.message')
        <div class="row my-3">
            <div class="col-12 col-lg-9 mx-auto">
                <p class="links">
                    <a href="{{ route('home') }}">ホーム</a> &raquo; <a href="{{ route('payments.index') }}">支払い履歴</a> &raquo; カテゴリー設定</p>
                <div class="card">
                    <div class="card-header">
                        <h5>カテゴリー設定</h5>
                    </div>
                    <div class="card-body">
                        <a href="" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                            <i class="fa-solid fa-folder-plus"></i>
                            カテゴリー追加
                        </a>
                        <div class="card-body my-2">
                            <ul class="lists">
                                @if($categories == TRUE)
                                    @foreach($categories as $category)
                                    <li class="d-flex px-3"
                                    data-id="{{ $category->id }}" data-name="{{ $category->name }}">
                                        {{ $category->name }}
                                        <a href="" class="ms-auto" data-bs-toggle="modal" data-bs-target="#editCategoryModal">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                            変更
                                        </a>
                                        <a href="" class="ms-3" data-bs-toggle="modal" data-bs-target="#delCategoryModal">
                                            <i class="fa-solid fa-trash-can"></i>
                                            削除
                                        </a>
                                    </li>
                                    @endforeach
                                @else
                                    <h5>カテゴリーがありません</h5>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
