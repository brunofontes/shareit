<button type="button" class="btn btn-sm btn-secondary mr-1" data-toggle="modal" data-target="#editModal">Edit</button>

<!-- MODAL - CHANGE WINDOW -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>

        <form action="/product" method="POST">
            <div class="modal-body">
                <div class="form-group">
                    <label for="name" class="col-form-label">New name: </label>
                    <input type="text" name="name" id="name" class="form-control" value="{{$product->name}}">
                </div>
                <div class="form-group">
                    <label for="url" class="col-form-label">New url: </label>
                    <input type="text" name="url" id="url" class="form-control" value="{{$product->url}}">
                </div>
            </div>
            <div class="modal-footer">
                @method('PATCH')
                {{ csrf_field() }}
                <input type="hidden" name="product" value="{{$product->id}}"> 
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Edit</button>
            </div>
        </form>

    </div>
</div>
</div>