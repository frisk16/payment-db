<div class="side-bar">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5>カテゴリー</h5>
                <a href="{{ route('categories.index') }}">
                    <i class="fa-solid fa-gear"></i>
                    <span>設定</span>
                </a>
            </div>
            <div class="card-body">
                <ul class="mt-3 p-0">
                    @if($categories->isNotEmpty())
                        @foreach($categories as $category)
                            <li>
                                <a href="{{ route('payments.index', ['year' => $year, 'month' => $month, 'category_id' => $category->id]) }}">
                                    @if(request()->category_id == $category->id)
                                        <span class="text-info">{{ $category->name }}</span>
                                    @else
                                        <span>{{ $category->name }}</span>
                                    @endif
                                </a>
                            </li>
                        @endforeach
                    @else
                        <li class="text-center">
                            <h6>カテゴリーはありません。</h6>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
