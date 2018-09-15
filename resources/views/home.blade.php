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
                        <div class="my-4 p-2">
                            <strong>{{$item->name}}</strong> ({{$item->product->name}})

                            @if ($item->used_by)
                                @include('home.usedItem')
                            @else
                                @include('home.unusedItem')
                            @endif
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