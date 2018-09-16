<span class="d-inline-block text-truncat float-right">
    <div class="btn-group btn-group-sm" role="group">


        <!-- EDIT BUTTON -->
        <form action="/product" method="POST">
            @method('PATCH')
            <button type="submit" class="btn btn-sm btn-secondary mr-1">Edit</button>
        </form>


        <!-- DELETE BUTTON -->
        <form class="delete" action="/product" method="POST">
            {{ csrf_field() }}
            @method('DELETE')
            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal">Delete</button>
        </form>
    </div>


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
           You will not be able to restore it after deletion. 
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <form class="delete" action="/product" method="POST">
                {{ csrf_field() }}
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
        </div>
    </div>
    </div>
</span>