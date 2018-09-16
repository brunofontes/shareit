<p><strong>Users:</strong></p>
@forelse ($users as $user)
    @if (!$loop->first)
        <hr>
    @endif
    {{ $user->name }} ({{ $user->email}})
    <div class="form-inline float-right">
    <form method="POST" action="/user" class="form-inline">
        <div class="form-group">
            {{ csrf_field() }}
            @method('DELETE')
            <input type="hidden" class="form-control" name="user_id" id="user_id" value="{{$user->id}}">
            <input type="hidden" name="item_id" id="item_id" value="{{ $item['id'] }}">
            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
        </div>
    </form>
    </div>
@empty
    <p>There are no items yet. Include one with the form above.</p>
@endforelse


<!-- ADD USERS -->
<div class="mt-5 mb-5">
<hr>
    <p><strong>Add user</strong></p>
    <form method="POST" action="/user" class="form-inline">
    <div class="form-group">
        {{ csrf_field() }}
        <div class="col"><label for="name">E-mail: </label></div>
        <div class="col-6"><input type="email" class="form-control" name="email" id="email" placeholder="name@domain.com" required></div>
        <input type="hidden" name="item_id" id="item_id" value="{{ $item['id'] }}" required>
        <div class="col ml-3"><button type="submit" class="btn btn-primary">Insert</button></div>
    </div>
    </form>
</div>
@include ('layouts.errors')