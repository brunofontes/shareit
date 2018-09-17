@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row"><h1>Help...</h1></div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">What is it?</div>
                <div class="card-body">
                    <p>
                        <strong>Share&nbsp;It!</strong> is a site dedicated to help you sharing items with others.
                    </p>
                    <p>But before sharing anything, you just need to understand 2 basic ideas:</p>
                    <p class="my-4"><ul>
                        <li><strong>Product</strong> - The category that has some similar items</li>
                        <li><strong>Item</strong> - The item that will be shared. Every item belongs to a <strong>Product</strong></li>
                    </ul></p>
                    <p class="my-4"><strong><em>Examples:</em></strong> You can create the following Categories/Items</p>
                    <p>
                        <ul>
                            <li>Books -> Don Quixote, The Hitchhiker's Guide to the Galaxy</li>
                            <li>Matrix Movies -> Matrix 1, Matrix 2, Matrix 3</li>
                            <li>Website Y -> <em>YourAccount</em>*</li>
                        </ul>
                        <p><em>* Please note that many websites does not allow sharing your account. Read the site EULA before include it here.</em></p>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Screens</div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Home</div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Products</div>
            </div>
        </div>
    </div>
</div>
@endsection