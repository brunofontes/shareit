<p><strong>{{ __('item.users') }}</strong></p>
@forelse ($users as $user)
    @if (!$loop->first)
        <hr>
    @endif
    <div class="container-fluid">
        <div class="form-group row mr-1">
            <div class="col-xs-12 col-sm-10 col-lg-11 mb-2">
                {{ $user->name }} ({{ $user->email}})
            </div>
            <div class="col-xs-12 col-sm-2 col-lg-1">
                <form method="POST" action="/user">
                {{ csrf_field() }}
                @method('DELETE')
                <input type="hidden" name="item_id" id="item_id" value="{{ $item['id'] }}">
                <input type="hidden" class="form-control" name="user_id" id="user_id" value="{{$user->id}}">
                <button type="submit" class="btn btn-sm btn-danger">{{ __('item.delete') }}</button>
            </div>
        </div>
    </div>
    </form>
@empty
    <p>{{ __('item.noItems') }}</p>
@endforelse


<!-- ADD USERS -->
<hr class="mt-5">
<p><strong>{{ __('item.addUser') }}</strong></p>
<form method="POST" action="/user">
<div class="container-fluid">
    <div class="form-group row mt-2">
        {{ csrf_field() }}
        <div class="col-sm-2 col-lg-auto"><label for="name">{{ __('item.email') }}</label></div>
        <div class="col-xs-12 col-sm mb-3"><input type="email" class="form-control" name="email" id="email" placeholder="{{ __('item.nameDomain') }}" required></div>
        <input type="hidden" name="item_id" id="item_id" value="{{ $item['id'] }}" required>
        <div class="col-sm-2 col-lg-1 mr-4"><button type="submit" class="btn btn-primary">{{ __('item.insert') }}</button></div>
    </div>
</div>
</form>
@include ('layouts.errors')