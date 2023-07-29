@extends('layouts.app')

@section('title')
    ホーム
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>メニュー</h5>
                </div>
                <div class="card-body">
                    <ul class="title-lists">
                        <li class="mt-3">
                            <div class="row py-2">
                                <div class="col-lg-5 col-10 mx-auto d-flex align-items-center gap-3">
                                    <i class="fa-3x fa-solid fa-money-check-dollar"></i>
                                    <span>
                                        <h5>全支払い履歴</h5>
                                        <p>閲覧・追加・編集・削除</p>
                                    </span>
                                </div>
                                <div class="col-lg-3 col-10 mx-auto d-flex justify-content-end align-items-center">
                                    <h1 class="me-3">&raquo;</h1>
                                    <a href="{{ route('payments.index') }}" class="btn btn-outline-info">
                                        次へ <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="mt-3">
                            <div class="row py-2">
                                <div class="col-lg-5 col-10 mx-auto d-flex align-items-center gap-3">
                                    <i class="fa-3x fa-solid fa-hand-holding-dollar"></i>
                                    <span>
                                        <h5>種類別支払い履歴</h5>
                                        <p>各支払い方法毎の履歴</p>
                                    </span>
                                </div>
                                <div class="col-lg-3 col-10 mx-auto d-flex justify-content-end align-items-center">
                                    <h1 class="me-3">&raquo;</h1>
                                    <a href="{{ route('payments.show_type', ['type_id' => 1]) }}" class="btn btn-outline-info">
                                        次へ <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="mt-3">
                            <div class="row py-2">
                                <div class="col-lg-5 col-10 mx-auto d-flex align-items-center gap-3">
                                    <i class="fa-3x fa-solid fa-user-gear"></i>
                                    <span>
                                        <h5>ユーザー管理</h5>
                                        <p>ユーザー情報の変更・削除</p>
                                    </span>
                                </div>
                                <div class="col-lg-3 col-10 mx-auto d-flex justify-content-end align-items-center">
                                    <h1 class="me-3">&raquo;</h1>
                                    <a href="{{ route('mypage') }}" class="btn btn-outline-info">
                                        次へ <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
