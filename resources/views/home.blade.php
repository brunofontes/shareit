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
                        <li>
                            <strong>{{$item->name}}</strong> ({{$item->pname}})

                            @if ($item->usedBy)
                                @if ($item->usedBy == \Auth::id())
                                    <span class="float-right">
                                        <form action="/item/{{$item->id}}" method="POST">
                                            <button type="button" class="btn btn-danger" disabled>Return It</button>
                                        </form>
                                    </span>
                                @else
                                    <div class="alert alert-danger" role="alert">In use by {{$item->usedBy}}, since {{$item->usedSince->diffForHumans()}}</div>
                                @endif
                            @else
                                <span class="float-right">
                                    <form action="/item/{{$item->id}}" method="POST">
                                        <button type="button" class="btn btn-success">Take It</button>
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
