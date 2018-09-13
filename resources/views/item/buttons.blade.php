<span class="d-inline-block text-truncat float-right">
    <div class="btn-group btn-group-sm" role="group">


        <!-- EDIT BUTTON -->
        @if ($item->product->user_id == \Auth::id())
            <form action="/item/{{$item->id}}" method="POST">
                @method('PATCH')
                <button type="button" class="btn-sm btn-secondary mr-1">Edit</button>
            </form>
        @endif


        <!-- DELETE BUTTON -->
        <form action="/item/" method="POST">
            @method('DELETE')
            {{ csrf_field() }}
            <input type="hidden" name="item" value="{{$item->id}}"> 
            <button type="submit" class="btn-sm btn-danger">Delete</button>
        </form>


    </div>
</span>