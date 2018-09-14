@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-header">
                    Item: <strong>{{$item->name}}</strong>
                    @include ('item.buttons')
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert"> {{ session('status') }}
                        </div>
                    @endif

                    <strong>Other items from the same product:</strong>
                    <ul>
                    @forelse ($otherItems as $otherItem)
                        @if (!$otherItem->used_by)
                            <li><a href="/item/{{ $otherItem->id }}">{{ $otherItem->name }}</a></li>
                        @endif
                    @empty
                        <p>There are no items yet. Include one with the form above.</p>
                    @endforelse
                    </ul>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header">
                    Users of this item
                </div>

                <div class="card-body">
                    <strong>Users that has access to this item:</strong>
                    <ul>
                    @forelse ($users as $user)
                        <hr>
                        <li>
                            {{ $user->name }} ({{ $user->email}})
                            <div class="form-inline float-right">
                            <form method="POST" action="/user" class="form-inline"> <div class="form-group">
                                {{ csrf_field() }}
                                @method('DELETE')
                                <input type="hidden" class="form-control" name="user_id" id="user_id" value="{{$user->id}}">
                                <input type="hidden" name="item_id" id="item_id" value="{{ $item['id'] }}">
                                <button type="submit" class="btn-xm btn-danger">Delete</button>
                            </form></div>
                        </li>
                    @empty
                        <p>There are no items yet. Include one with the form above.</p>
                    @endforelse
                    </ul>

                    <div class="mt-4">
                        <strong>Add user</strong>
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

                </div>
            </div>
            <div class="float-right mt-2 mr-4"><a href="{{ URL::previous() }}">BACK</a></div>
        </div>
    </div>
</div>
@endsection
