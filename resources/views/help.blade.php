@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row"><h1>Help...</h1></div>
            <div class="card">
                <div class="card-header"><strong>What is it?</strong></div>
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
                <div class="card-header"><strong>Step-by-step</strong></div>
                <div class="card-body">
                    <div>
                        <strong>Sharing a product/item</strong>
                        <ol>
                            <li>Go to the <strong><a href="/product">Products</a></strong> page;</li>
                            <li>Include the Product name and click on it;</li>
                            <li>Include the Item you want to share and click on it;</li>
                            <li>Add other people by their subscribed e-mail address.</li>
                        </ol>
                    </div>
                    <div>
                        <strong>Using a shared item</strong>
                        <ol>
                            <li>Go to the <strong><a href="/home">Home</a></strong> page (tip: add this page as a bookmark);</li>
                            <li>Click on <strong>Take</strong> to take the item you want to use;</li>
                            <li>When you finish using it, click on <strong>Return</strong> button.</li>
                        </ol>
                    </div>
                    <div>
                        <strong>Getting alerted when an item is available</strong>
                        <ol>
                            <li>Go to the <strong><a href="/home">Home</a></strong> page (tip: add this page as a bookmark);</li>
                            <li>Click on <strong>Alert me</strong> next the taken item;</li>
                            <li>The active user will be alerted you want to use it later. When the person return it, you will be notified.</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>Screens</strong></div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>Home</strong></div>
                <div class="card-body">
                    <p>The <strong>Home</strong> is the main screen where you will going to <strong>Take</strong> 
                    and <strong>Return</strong> items.</p>
                    <p>It shows all items that were shared with you or that you are sharing, unless you remove yourself from there.</p>
                    <p>If the item has a website, the items name will become a link, so you can just click on it to open.</p>
                    <p>When the item you want is already taken, you are going to see who got it and for how long.
                    So you can identify if the person is still using it or if someone just forgot to return it.</p>
                    <p>You can also ask to be alerted when the item is available. This will notify the active
                    user that you want to use that item. So the person can return it as soon as they finish using it.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>Products</strong></div>
                <div class="card-body">
                    <p>The <strong>Products</strong> is the screen to include Products and Items.</p>
                    <p>You can also <strong>add users</strong> to your items from this screen. 
                    To be able to do that you just need to select the item.</p>
                    <p class="mb-4">When adding a Product, you can specify a webpage (this is optional).</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection