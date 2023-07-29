<div class="col-lg-3 d-none d-lg-block">
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h5 class="my-2">支払い項目</h5>
        </div>
        <div class="card-body">
            <div class="container">
                <ul class="lists">
                    @foreach($type_lists as $type_list)
                    <li class="bg-transparent">
                        <a href="{{ route('payments.show_type', ['year' => $year, 'month' => $month, 'type_id' => $type_list['id']]) }}">
                            <div class="row py-2">
                                @if(request()->type_id == $type_list['id'])
                                    <div class="col-2 d-flex align-items-center justify-content-center text-info">
                                        <i class="fa-lg fa-solid fa-list-ul"></i>
                                    </div>
                                    <div class="col-10 d-flex align-items-center text-info">
                                        <h5>{{ $type_list['name'] }}</h5>
                                    </div>
                                @else
                                    <div class="col-2 d-flex align-items-center justify-content-center">
                                        <i class="fa-lg fa-solid fa-ellipsis"></i>
                                    </div>
                                    <div class="col-10 d-flex align-items-center">
                                        <h5>{{ $type_list['name'] }}</h5>
                                    </div>
                                @endif
                            </div>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
