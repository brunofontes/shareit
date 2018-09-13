@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4>Your itens</h4>
                    @forelse ($items as $item)
                        <hr class="ml-5 mr-5">
                        <li class="mt-1 mb-1">
                            <strong>{{$item->name}}</strong> ({{$item->product->name}})

                            @if ($item->usedBy)
                                @if ($item->usedBy == \Auth::id())
                                    <span class="float-right">
                                        <form action="/return" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="item" value="{{$item->id}}"> 
                                            <button type="submit" class="btn-xm btn-danger">Return It</button>
                                        </form>
                                    </span>
                                    <span class="float-right mr-3"><em>{{\Carbon\Carbon::parse($item->updated_at)->diffForHumans()}}</em></span>
                                @else
                                    <div class="alert alert-danger" role="alert">In use by {{$item->usedBy}}, since {{$item->updated_at->diffForHumans()}}</div>
                                @endif
                            @else
                                <span class="float-right">
                                    <form action="/take" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="item" value="{{$item->id}}"> 
                                        <button type="submit" class="btn-xm btn-success">Take It</button>
                                    </form>
                                </span>
                            @endif
                        </li>
                    @empty
                        <p>There are no items for you yet. Include a product or an item <a href="/product">here.</a></p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
