<form method="POST" action="/item">
{{ csrf_field() }}

<div class="container-fluid">
    <div class="form-group row mt-2">
        <div class="col-sm-2 col-lg-1"><label for="product">{{ __('product.item') }}</label></div>
        <div class="col-xs-12 col-sm mb-3"><input type="text" class="form-control" name="item" id="item" placeholder="{{ __('product.100yearsSolitude') }}" required></div>
        <input type="hidden" name="product_id" id="product_id" value="{{ $product['id'] }}" required>
        <div class="col-sm-2 col-lg-1 mr-4"><button type="submit" class="btn btn-primary">{{ __('product.insert') }}</button></div>
    </div>
</div>

@include ('layouts.errors')
</form>