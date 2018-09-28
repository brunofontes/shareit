@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card mt-4">
                <div class="card-header">
                    <strong>{{$product['name']}}</strong> 
                    @if ($product['url'])
                        (<em><a href="{{$product['url']}}" target="_blank" rel="noopener noreferrer">{{$product['url']}}</a></em>)
                    @endif
                    <span class="d-inline-block text-truncat float-right">
                    <div class="btn-group" role="group">
                        @include ('product.editButton')
                        @include ('product.deleteButton')
                    </div>
                    </span>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert"> {{ session('status') }}
                        </div>
                    @endif

                    <strong>{{ __('product.items') }}</strong>
                    <ul>
                    @forelse ($product->items as $item)
                        <li><a href="/item/{{ $item->id }}">{{ $item->name }}</a></li>
                    @empty
                        <p>{{ __('product.noItemsYet') }}</p>
                    @endforelse
                    </ul>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">{{ __('product.addItem') }}</div>
                <div class="card-body">@include('product.addItemForm')</div>
            </div>
            
            <div class="float-right mt-2"><a class="btn btn-secondary" href="/product">{{ __('product.back') }}</a></div>
        </div>
    </div>
</div>
@endsection
