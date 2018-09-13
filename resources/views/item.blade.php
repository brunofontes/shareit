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
                        @if (!$otherItem->usedBy)
                            <li><a href="/item/{{ $otherItem->id }}">{{ $otherItem->name }}</a></li>
                        @endif
                    @empty
                        <p>There are no items yet. Include one with the form above.</p>
                    @endforelse
                    </ul>
                </div>
            </div>
            <div class="float-right mt-2 mr-4"><a href="{{ URL::previous() }}">BACK</a></div>
        </div>
    </div>
</div>
@endsection
