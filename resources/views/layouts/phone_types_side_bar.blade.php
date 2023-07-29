<div class="side-bar">
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5>支払い項目</h5>
            </div>
            <div class="card-body">
                <ul class="mt-3 p-0">
                    @foreach($type_lists as $type_list)
                        <li>
                            <a href="{{ route('payments.show_type', ['year' => $year, 'month' => $month, 'type_id' => $type_list['id']]) }}">
                                @if(request()->type_id == $type_list['id'])
                                    <span class="text-info">{{ $type_list['name'] }}</span>
                                @else
                                    <span>{{ $type_list['name'] }}</span>
                                @endif
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
