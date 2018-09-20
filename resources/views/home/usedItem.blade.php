@if ($item->used_by == \Auth::id())
<form action="/take" method="POST" class="form-inline">
    <em class="pr-sm-2 ml-auto">{{\Carbon\Carbon::parse($item->updated_at)->diffForHumans()}}</em>
    <div class="w-100 d-xm-block d-sm-none"></div>
    {{ csrf_field() }}
    @method('DELETE')
    <input type="hidden" name="item" value="{{$item->id}}">
    <button type="submit" class="btn btn-sm btn-danger ml-auto">Return It</button>
</form>


@else
<form action="/alert" method="POST" class="form-inline">
    <em class="pr-sm-2 ml-auto">
        {{str_limit($users[$item->used_by], 15, '...')}}
        @if ($item->waiting_user_id && $item->waiting_user_id != \Auth::id())
        <strong>> {{str_limit($users[$item->waiting_user_id], 15, '...')}}</strong>
        @endif
        <small>({{$item->updated_at->diffForHumans()}})</small>
    </em>
    <div class="w-100 d-xm-block d-sm-none"></div>
    {{ csrf_field() }}
    <input type="hidden" name="item" value="{{$item->id}}">
    @if ($item->waiting_user_id == \Auth::id())
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-outline-danger ml-auto">Cancel Alert</button>
    @elseif (!$item->waiting_user_id)
    <button type="submit" class="btn btn-sm btn-outline-secondary ml-auto">Alert me</button>
    @endif
</form>
@endif