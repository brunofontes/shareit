@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-header"><strong>Products</strong></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul>
                    @forelse ($products as $product)
                        <li><a href="/product/{{$product['id']}}">{{$product['name']}}</a></li>
                    @empty
                        <p>There are no products yet. Include one with the form above.</p>
                    @endforelse
                    </ul>

                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header">Add product</div>
                <div class="card-body">@include('product.addProductForm')</div>
            </div>
            <div class="float-right mt-2"><a class="btn btn-secondary" href="/home">Your items</a></div>
        </div>
    </div>
</div>
@endsection
