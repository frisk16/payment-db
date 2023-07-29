@extends('layouts.app')

@section('title')
    登録解除
@endsection

@section('content')
    @include('modals.del_user')
    <div class="container">
        <div class="row my-3">
            <div class="col-12 col-lg-8 mx-auto">
                <p class="links">
                    <a href="{{ route('home') }}">ホーム</a> &raquo; <a href="{{ route('mypage') }}">ユーザー管理</a> &raquo; 登録解除
                </p>
                <div class="card">
                    <div class="card-header">
                        <h5>ご注意</h5>
                    </div>
                    <div class="card-body">
                        <p>ユーザー登録を解除すると、作成時に登録したメールアドレスから再びログインすることができなくなります。</p>
                        <p>本当によろしいですか？</p><br>
                        <p class="text-warning fw-bold">※ 解除後、強制的にログアウトします。</p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="" data-bs-toggle="modal" data-bs-target="#delUserModal" class="btn btn-outline-primary">はい ： 確認パスワードを入力</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
