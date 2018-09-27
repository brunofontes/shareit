<form action="/take" method="POST">
    {{ csrf_field() }}
    <input type="hidden" name="item" value="{{$item->id}}">
    <button type="submit" class="btn btn-sm btn-success">@lang('home.take')</button>
</form>