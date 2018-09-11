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
                <input type="hidden" name="product_id" id="product_id" value="{{ $product['id'] }}" required>
                <div class="col"><button type="submit" class="btn btn-primary">Insert</button></div>
            </div>
            @include ('layouts.errors')
            </form>

            <div class="card mt-4">
                <div class="card-header">
                    Product: <strong>{{$product['name']}}</strong>
                    <span class="d-inline-block text-truncat float-right">Edit - Delete</span>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert"> {{ session('status') }}
                        </div>
                    @endif

                    <ul>
                    @forelse ($product->items as $item)
                        <li><a href="/item/{{ $item->id }}">{{ $item->name }}</a></li>
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
