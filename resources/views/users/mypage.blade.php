@extends('layouts.app')

@section('title')
    ユーザー管理
@endsection

@section('content')
    @include('modals.edit_user')
    @include('modals.edit_password')
    <div class="container">
        @include('messages.message')
        <div class="row justify-content-center mt-3">
            <div class="col-md-8">
                <p class="links">
                    <a href="{{ route('home') }}">ホーム</a> &raquo; ユーザー管理
                </p>
                <div class="card">
                    <div class="card-header">
                        <h5>ようこそ、{{ Auth::user()->name }} 様</h5>
                    </div>
                    <div class="card-body">
                        <ul class="title-lists">
                            <li class="mt-3">
                                <div class="row py-2">
                                    <div class="col-lg-5 col-10 mx-auto d-flex align-items-center gap-3">
                                        <i class="fa-3x fa-solid fa-user-pen"></i>
                                        <span>
                                            <h5>ユーザー情報変更</h5>
                                            <p>ユーザー名、Eメールアドレス、電話番号等の変更</p>
                                        </span>
                                    </div>
                                    <div class="col-lg-3 col-10 mx-auto d-flex justify-content-end align-items-center">
                                        <h1 class="me-3">&raquo;</h1>
                                        <a href="" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#editUserModal">
                                            変更 <i class="fa-solid fa-pen"></i>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li class="mt-3">
                                <div class="row py-2">
                                    <div class="col-lg-5 col-10 mx-auto d-flex align-items-center gap-3">
                                        <i class="fa-3x fa-solid fa-unlock-keyhole"></i>
                                        <span>
                                            <h5>パスワード変更</h5>
                                            <p>パスワード情報の変更</p>
                                        </span>
                                    </div>
                                    <div class="col-lg-3 col-10 mx-auto d-flex justify-content-end align-items-center">
                                        <h1 class="me-3">&raquo;</h1>
                                        <a href="" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#editPasswordModal">
                                            変更 <i class="fa-solid fa-pen"></i>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li class="mt-3">
                                <div class="row py-2">
                                    <div class="col-lg-5 col-10 mx-auto d-flex align-items-center gap-3">
                                        <i class="fa-3x fa-solid fa-user-slash"></i>
                                        <span>
                                            <h5>登録解除</h5>
                                            <p>ユーザー情報の削除手続き</p>
                                        </span>
                                    </div>
                                    <div class="col-lg-3 col-10 mx-auto d-flex justify-content-end align-items-center">
                                        <h1 class="me-3">&raquo;</h1>
                                        <a href="{{ route('users.confirm') }}" class="btn btn-outline-info">
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
