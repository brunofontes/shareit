@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row"><h1>{!! __('help.helpTitle') !!}</h1></div>
            <div class="card">
                <div class="card-header"><strong>{!! __('help.whatIsIt') !!}</strong></div>
                <div class="card-body">
                        {!! __('help.siteHelpOthers') !!}
                    <p class="my-4"><ul>
                        {!! __('help.product_item') !!}
                    </ul></p>
                    <p class="my-4">
                        {!! __('help.examples') !!}
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
                            <li>Include the Product and click on it;</li>
                            <li>Include an Item that belongs to that Product and click on it;</li>
                            <li>Add other people with their subscribed e-mail address.</li>
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