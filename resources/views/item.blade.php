@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-header">
                    <strong>{{$item->name}}</strong>
                    <span class="d-inline-block text-truncat float-right">
                    <div class="btn-group" role="group">
                        @include ('item.editButton')
                        @include ('item.deleteButton')
                    </div>
                    </span>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert"> {{ session('status') }}
                        </div>
                    @endif

                    @include('item.users')
                </div>
            </div>


            @include ('item.otherItems')


            <div class="float-right mt-2"><a class="btn btn-secondary" href="/product/{{ $item->product->id }}">BACK</a></div>
        </div>
    </div>
</div>
@endsection
