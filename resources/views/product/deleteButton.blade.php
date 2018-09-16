<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal">Delete</button>

<!-- MODAL - DELETE CONFIRMATION -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Confirmation...</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        Would you like to delete the product <strong>{{$product->name}}</strong> and it's items?
        <p>You will not be able to restore it after deletion.</p>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <form action="/delete" method="POST">
        @method('DELETE')
        {{ csrf_field() }}
        <input type="hidden" name="product" value="{{$product->id}}"> 
        <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
    </div>
</div>
</div>