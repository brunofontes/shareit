@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @forelse ($products as $items)
            <div class="card mb-4">
                <div class="card-header">{{$items->first()->product->name}}</div>
                <div class="card-body">
                    @forelse ($items->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE) as $item)
                    @if (!$loop->first)
                    <hr class="m-3">
                    @endif
                    <div class="row align-items-center p-2">
                        <div class="col col-xs-auto">
                            @if ($item->product->url)
                            <a href="{{$item->product->url}}" class="link-unstyled" target="_blank" rel="noopener noreferrer">
                                @endif

                                <strong>{{$item->name}}</strong>

                                @if ($item->product->url)
                            </a>
                            @endif
                        </div>
                        <div class="ml-auto align-self-end text-right">
                            @if ($item->used_by)
                            @include('home.usedItem')
                            @else
                            @include('home.unusedItem')
                            @endif
                        </div>
                    </div>
                    @empty
                    <p>@lang('home.no_messages')<a href="/product">@lang('home.share_item')</a></p>
                    @endforelse
                </div>
            </div>
            @empty
            @endforelse
        </div>
    </div>
</div>
@endsection