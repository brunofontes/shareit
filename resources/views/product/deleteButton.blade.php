<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal">{{ __('product.delete') }}</button>

<!-- MODAL - DELETE CONFIRMATION -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">{{ __('product.confirmation') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        {!! __('product.wannaDelete', ['productname' => $product->name]) !!}
        <p>{{ __('product.notAbleRestore') }}</p>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('product.close') }}</button>
    <form action="/product" method="POST">
        @method('DELETE')
        {{ csrf_field() }}
        <input type="hidden" name="product" value="{{$product->id}}"> 
        <button type="submit" class="btn btn-danger">{{ __('product.delete') }}</button>
        </form>
    </div>
    </div>
</div>
</div>