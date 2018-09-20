@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Your items</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @forelse ($items as $item)
                    @if (!$loop->first)
                    <hr class="m-3">
                    @endif
                    <div class="row align-items-center p-2">
                        <div class="col col-xs-auto">
                            @if ($item->product->url)
                            <a href="{{$item->product->url}}" class="link-unstyled" target="_blank" rel="noopener noreferrer">
                                @endif

                                <strong>{{$item->name}}</strong> ({{$item->product->name}})

                                @if ($item->product->url)
                            </a>
                            @endif
                        </div>
                        <div class="align-self-end text-right">
                            @if ($item->used_by)
                            @include('home.usedItem')
                            @else
                            @include('home.unusedItem')
                            @endif
                        </div>
                    </div>
                    @empty
                    <p>There are no items shared with you yet. <a href="/product">Share an item!</a></p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection