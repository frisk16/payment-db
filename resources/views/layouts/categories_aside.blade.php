<div class="col-lg-3 d-none d-lg-block">
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h5 class="my-2">カテゴリー</h5>
            <a href="{{ route('categories.index') }}" class="ms-auto">
                <i class="fa-lg fa-solid fa-gear"></i>
                <span>設定</span>
            </a>
        </div>
        <div class="card-body">
            <div class="container">
                <ul class="lists">
                    @if($categories->isNotEmpty())
                        @foreach($categories as $category)
                        <li class="bg-transparent">
                            <a href="{{ route('payments.index', ['year' => $year, 'month' => $month, 'category_id' => $category->id]) }}">
                                <div class="row py-2">
                                    @if(request()->category_id == $category->id)
                                        <div class="col-2 d-flex align-items-center justify-content-center text-info">
                                            <i class="fa-lg fa-solid fa-list-ul"></i>
                                        </div>
                                        <div class="col-10 d-flex align-items-center text-info">
                                            <h5>{{ $category->name }}</h5>
                                        </div>
                                    @else
                                        <div class="col-2 d-flex align-items-center justify-content-center">
                                            <i class="fa-lg fa-solid fa-ellipsis"></i>
                                        </div>
                                        <div class="col-10 d-flex align-items-center">
                                            <h5>{{ $category->name }}</h5>
                                        </div>
                                    @endif
                                </div>
                            </a>
                        </li>
                        @endforeach
                    @else
                        <h6 class="my-3 text-center">カテゴリーはありません。</h6>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
