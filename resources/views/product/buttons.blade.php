<span class="d-inline-block text-truncat float-right">
    <div class="btn-group btn-group-sm" role="group">


        <!-- EDIT BUTTON -->
        @if ($product->user_id == \Auth::id())
            <form action="/product" method="POST">
                @method('PATCH')
                <button type="submit" class="btn-sm btn-secondary mr-1">Edit</button>
            </form>
        @endif


        <!-- DELETE BUTTON -->
        <form action="/product" method="POST">
            @method('DELETE')
            <button type="submit" class="btn-sm btn-danger">Delete</button>
        </form>


    </div>
</span>