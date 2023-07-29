@extends('layouts.app')

@section('title')
    各支払い方法毎の履歴
@endsection

@push('scripts')
    <script src="{{ asset('js/showTypePage.js') }}"></script>
@endpush

@section('content')
    <div class="background"></div>
    @include('layouts.phone_types_side_bar')
    <div class="container">
        <p class="links">
            <a href="{{ route('home') }}">ホーム</a> &raquo; 各支払い方法毎の履歴
        </p>
        <div class="row mb-4">
            @include('layouts.types_aside')
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
                                                        <a href="" class="btn btn-outline-secondary disabled" aria-disabled="true">&lt;</a>
                                                    @else
                                                        <a href="{{ route('payments.show_type', ['year' => $year - 1, 'type_id' => 1]) }}" class="btn btn-outline-secondary">&lt;</a>
                                                    @endif
                                                   <h5 class="text-white">{{ $year }}年</h5>
                                                   @if($year == date('Y'))
                                                        <a href="" class="btn btn-outline-secondary disabled" aria-disabled="true">&gt;</a>
                                                   @else
                                                        <a href="{{ route('payments.show_type', ['year' => $year + 1, 'type_id' => 1]) }}" class="btn btn-outline-secondary">&gt;</a>
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
                                                                <a href="{{ route('payments.show_type', ['year' => $year, 'month' => $m, 'type_id' => 1]) }}" class="dropdown-item p-0 text-info">{{ $m }}月</a>
                                                            @else
                                                                <a href="{{ route('payments.show_type', ['year' => $year, 'month' => $m, 'type_id' => 1]) }}" class="dropdown-item p-0">{{ $m }}月</a>
                                                            @endif
                                                        @endif
                                                    </div>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="title mb-2">
                                    @if(request()->has('type_id'))
                                        @foreach($type_lists as $type_list)
                                            @if(request()->type_id == $type_list['id'])
                                                {{ $type_list['name'] }} 総額
                                            @endif
                                        @endforeach
                                    @else
                                        支払い項目を選択してください。
                                    @endif
                                </h5>

                                @if(request()->has('type_id'))
                                    <div class="progress">
                                        <div class="progress-bar bg-info @if($total == 200000) bg-danger @endif" style="width: {{ $total / 2000 }}%" aria-valuenow="{{ $total / 500 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="text-center">{{ $total }}円 / 200,000円</p>
                                @else
                                    <div class="progress">
                                        <div class="progress-bar bg-info"></div>
                                    </div>
                                    <p class="text-center">???円 / 200,000円</p>
                                @endif

                                <div class="mt-3 d-flex flex-wrap gap-3 justify-content-end">
                                    <span class="d-lg-none" id="typeListsBtn">
                                        <i class="fa-lg fa-solid fa-align-right"></i>
                                        <span>支払い項目の選択</span>
                                    </span>
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
