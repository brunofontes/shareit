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
                <div class="card-header"><strong>{!! __('help.step_title') !!}</strong></div>
                <div class="card-body">
                    <div>
                        <strong>{!! __('help.step_sharing_subtitle') !!}</strong>
                        <ol>
                           {!! __('help.step_sharing_steps') !!} 
                        </ol>
                    </div>
                    <div>
                        <strong>{!! __('help.step_sharedItem_subtitle') !!}</strong>
                        <ol>
                           {!! __('help.step_sharedItem_steps') !!} 
                        </ol>
                    </div>
                    <div>
                        <strong>{!! __('help.step_getAlerted_subtitle') !!}</strong>
                        <ol>
                           {!! __('help.step_getAlerted_steps') !!} 
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>{!! __('help.screens_title') !!}</strong></div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>{!! __('help.home_title') !!}</strong></div>
                <div class="card-body">
                   {!! __('help.home_body') !!} 
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>{!! __('help.products_title') !!}</strong></div>
                <div class="card-body">
                   {!! __('help.products_body') !!} 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection