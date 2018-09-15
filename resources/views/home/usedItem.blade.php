@if ($item->used_by == \Auth::id())
    <span class="float-right">
        <form action="/take" method="POST">
            {{ csrf_field() }}
            @method('DELETE')
            <input type="hidden" name="item" value="{{$item->id}}"> 
            <button type="submit" class="btn btn-sm btn-danger">Return It</button>
        </form>
    </span>
    <span class="float-right mr-3"><em>{{\Carbon\Carbon::parse($item->updated_at)->diffForHumans()}}</em></span>


@else
    <span class="float-right">
        <form action="/alert" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="item" value="{{$item->id}}"> 
            @if ($item->waiting_user_id == \Auth::id())
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger">Cancel Alert</button>
            @elseif (!$item->waiting_user_id)
                <button type="submit" class="btn btn-sm btn-outline-secondary">Alert me</button>
            @endif
        </form>
    </span>
    <span class="float-right mr-3">
        <em>
            {{str_limit($users[$item->used_by], 15, '...')}} 
            @if ($item->waiting_user_id && $item->waiting_user_id != \Auth::id())
                <strong>> {{str_limit($users[$item->waiting_user_id], 15, '...')}}</strong>
            @endif
            <small>({{$item->updated_at->diffForHumans()}})</small>
        </em>
    </span>
@endif