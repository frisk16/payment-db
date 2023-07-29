@extends('layouts.app')

@section('title')
    支払い履歴
@endsection

@push('scripts')
    <script src="{{ asset('js/paymentsPage.js') }}"></script>
    <script src="{{ asset('js/flatpickrs.js') }}"></script>
@endpush

@section('content')
    @include('modals.add_payment')
    @include('modals.edit_payment')
    @include('modals.del_payment')

    <div class="background"></div>
    @include('layouts.phone_categories_side_bar')
    <div class="container">
        @include('messages.message')

        <p class="links">
            <a href="{{ route('home') }}">ホーム</a> &raquo; 支払い履歴
        </p>
        <div class="row mb-4">
            @include('layouts.categories_aside')
            <div class="col-12 col-lg-9">
                <div class="card">
                    <div class="card-header">
                        <h5 class="my-2">支払い履歴一覧</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-lg-4 pt-lg-4 pb-3">
                                <div class="text-center mb-3">
                                    <div class="dropdown">
                                        <a href="" class="dropdown-toggle d-flex align-items-center justify-content-center" data-bs-toggle="dropdown" aria-expanded="false">
                                            <h4>
                                                {{ $year }}年 {{ $month }}月
                                            </h4>
                                        </a>
                                        <div class="dropdown-menu bg-dark">
                                            <div class="row">
                                                <div class="col-12 d-flex justify-content-center align-items-center gap-5">
                                                    @if($year == 2022)
                                                        <a href="{{ route('payments.index', ['year' => $year - 1]) }}" class="btn btn-outline-secondary disabled" aria-disabled="true">&lt;</a>
                                                    @else
                                                        <a href="{{ route('payments.index', ['year' => $year - 1]) }}" class="btn btn-outline-secondary">&lt;</a>
                                                    @endif
                                                   <h5 class="text-white">{{ $year }}年</h5>
                                                   @if($year == date('Y'))
                                                        <a href="{{ route('payments.index', ['year' => $year + 1]) }}" class="btn btn-outline-secondary disabled" aria-disabled="true">&gt;</a>
                                                   @else
                                                        <a href="{{ route('payments.index', ['year' => $year + 1]) }}" class="btn btn-outline-secondary">&gt;</a>
                                                   @endif
                                                </div>
                                            </div>
                                            <hr class="dropdown-divider bg-white">
                                            <div class="row p-2">
                                                @for($m = 1; $m <= 12; $m++)
                                                    <div class="col-3">
                                                        @if($m > date('m') && $year == date('Y'))
                                                            <a href="" class="dropdown-item p-0 disabled" tabindex="-1" aria-disabled="true">{{ $m }}月</a>
                                                        @else
                                                            @if($m == $month)
                                                                <a href="{{ route('payments.index', ['year' => $year, 'month' => $m]) }}" class="dropdown-item p-0 text-info">{{ $m }}月</a>
                                                            @else
                                                                <a href="{{ route('payments.index', ['year' => $year, 'month' => $m]) }}" class="dropdown-item p-0">{{ $m }}月</a>
                                                            @endif
                                                        @endif
                                                    </div>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="title mb-2">
                                    @if(request()->has('category_id'))
                                        @foreach($categories as $category)
                                            @if(request()->category_id == $category->id)
                                                {{ $category->name }} 総額
                                            @endif
                                        @endforeach
                                    @else
                                        {{ $month }}月分 総額
                                    @endif
                                </h5>

                                @if(request()->has('category_id'))
                                    <div class="progress">
                                        <div class="progress-bar bg-info @if($total == 50000) bg-danger @endif" style="width: {{ $total / 500 }}%" aria-valuenow="{{ $total / 500 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="text-center">{{ $total }}円 / 50,000円</p>
                                @else
                                    <div class="progress">
                                        <div class="progress-bar bg-info @if($total == 300000) bg-danger @endif" style="width: {{ $total / 3000 }}%" aria-valuenow="{{ $total / 3000 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="text-center">{{ $total }}円 / 300,000円</p>
                                @endif

                                <div class="mt-3 d-flex flex-wrap gap-3 justify-content-end">
                                    <span class="d-lg-none" id="categoryBtn">
                                        <i class="fa-lg fa-solid fa-align-right"></i>
                                        <span>カテゴリー</span>
                                    </span>
                                    @if($categories->isNotEmpty())
                                        <a href="" data-bs-toggle="modal" data-bs-target="#addPaymentModal">
                                            <i class="fa-lg fa-solid fa-piggy-bank"></i>
                                            <span>データ追加</span>
                                        </a>
                                    @else
                                        <a href="{{ route('categories.index') }}">
                                            <i class="fa-solid fa-folder-plus"></i>
                                            <span>まずはカテゴリーを追加</span>
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-lg-8">
                                <ul class="lists">
                                    @if($payments->isNotEmpty())
                                        @foreach($payments as $payment)
                                            <li>
                                                <div class="row">
                                                    <div class="col-3 d-flex flex-column align-items-center justify-content-center">
                                                        <i class="{{ $payment->type_option['icon'] }}"></i>
                                                        <span>{{ $payment->type_option['name'] }}</span>
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="title d-flex align-items-center mb-2">
                                                            <span>{{ $payment->date }}</span>
                                                            <strong class="text-info ms-auto">{{ $payment->category_name }}</strong>
                                                        </div>
                                                        <div class="row mb-1">
                                                            <div class="col-12 col-lg-6">
                                                                <strong>{{ $payment->name }}</strong>
                                                            </div>
                                                            <div class="col-12 col-lg-6 text-end">
                                                                <strong>￥{{ $payment->price }} 円</strong>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12 d-flex justify-content-end">
                                                                <div class="dropdown">
                                                                    <span class="btn btn-sm btn-outline-info dropdown-toggle" data-bs-toggle="dropdown">
                                                                        <i class="fa-lg fa-solid fa-gear"></i>
                                                                        設定
                                                                    </span>

                                                                    <ul class="dropdown-menu bg-dark">
                                                                        <li
                                                                            data-id="{{ $payment->id }}"
                                                                            data-categoryId="{{ $payment->category_id }}"
                                                                            data-name="{{ $payment->name }}"
                                                                            data-price="{{ $payment->price }}"
                                                                            data-type="{{ $payment->type }}"
                                                                            data-date="{{ $payment->date }}"
                                                                        >
                                                                            <a href="" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editPaymentModal">編集</a>
                                                                        </li>
                                                                        <li
                                                                            data-id="{{ $payment->id }}"
                                                                            data-date="{{ $payment->date }}"
                                                                        >
                                                                            <a href="" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#delPaymentModal">削除</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    @else
                                        <li class="text-center">
                                            <h5>-- 支払い履歴がありません。 --</h5>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body d-flex justify-content-end pe-3">
                    {{ $payments->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
