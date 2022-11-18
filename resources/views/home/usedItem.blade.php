@if ($item->used_by == \Auth::id())
<form action="/take" method="POST" class="form-inline">
    <em id="itemPassedTime_{{$item->id}}" class="pr-sm-2 ml-auto">{{\Carbon\Carbon::parse($item->updated_at)->diffForHumans()}}</em>
    <div hidden class="takenItemDate" id="{{$item->id}}">{{\Carbon\Carbon::parse($item->updated_at)->format('Y-m-d\TH:i:s.uP')}}</div>
    <div class="w-100 d-xm-block d-sm-none"></div>
    {{ csrf_field() }}
    @method('DELETE')
    <input type="hidden" name="item" value="{{$item->id}}">
    <button type="submit" class="btn btn-sm btn-danger ml-auto">@lang('home.return')</button>
</form>


@else
<form action="/alert" method="POST" class="form-inline">
    <em class="pr-sm-2 ml-auto">
        {{str_limit($users[$item->used_by], 15, '...')}}
        @if ($item->waiting_user_id && $item->waiting_user_id != \Auth::id())
        <strong>> {{str_limit($users[$item->waiting_user_id], 15, '...')}}</strong>
        @endif
        <small id="itemPassedTime_{{$item->id}}">({{$item->updated_at->diffForHumans()}})</small>
    </em>
    <div hidden class="takenItemDate" id="{{$item->id}}">{{$item->updated_at->format('Y-m-d\TH:i:s.uP')}}</div>
    <div class="w-100 d-xm-block d-sm-none"></div>
    {{ csrf_field() }}
    <input type="hidden" name="item" value="{{$item->id}}">
    @if ($item->waiting_user_id == \Auth::id())
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-outline-danger ml-auto">@lang('home.cancel_alert')</button>
    @elseif (!$item->waiting_user_id)
    <button type="submit" class="btn btn-sm btn-outline-secondary ml-auto">@lang('home.alert_me')</button>
    @endif
</form>
@endif
