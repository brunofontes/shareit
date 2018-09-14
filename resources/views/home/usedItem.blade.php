@if ($item->used_by == \Auth::id())
    <span class="float-right">
        <form action="/return" method="POST">
            {{ csrf_field() }}
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
            <button type="submit" class="btn btn-sm btn-outline-secondary">Alert me</button>
        </form>
    </span>
    <span class="float-right mr-3">
        <em>{{str_limit($users[$item->used_by], 15, '...')}} ({{$item->updated_at->diffForHumans()}})</em>
    </span>
@endif