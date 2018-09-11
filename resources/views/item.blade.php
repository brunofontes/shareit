@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <form method="POST" action="/item" class="form-inline">
            <div class="form-group">
                {{ csrf_field() }}
                <div class="col"><label for="product">Add Item: </label></div>
                <div class="col-6"><input type="text" class="form-control" name="item" id="item" placeholder="One Hundred Years of Solitude" required></div>
                <div class="col"><button type="submit" class="btn btn-primary">Insert</button></div>
            </div>
            @include ('layouts.errors')
            </form>

            <div class="card mt-4">
                <div class="card-header">
                    Item: <strong>{{$item[0]->name}}</strong>
                    @include ('item.buttons')
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert"> {{ session('status') }}
                        </div>
                    @endif

                    <ul>
                    @forelse ($otherItems as $otherItem)
                        @if (!$otherItem->usedBy)
                            <li><a href="/item/{{ $otherItem->id }}">{{ $otherItem->name }}</a></li>
                        @endif
                    @empty
                        <p>There are no items yet. Include one with the form above.</p>
                    @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
