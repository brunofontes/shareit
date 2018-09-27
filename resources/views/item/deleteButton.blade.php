<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal">Delete</button>

<!-- MODAL - DELETE CONFIRMATION -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">{{ __('item.confirmation') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <p>{!! __('item.confirmDeletion', ['itemname' => $item->name]) !!}</p>
        <p>{!! __('item.notAbleRestore') !!}</p>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('item.close') }}</button>
    <form action="/item/" method="POST">
        @method('DELETE')
        {{ csrf_field() }}
        <input type="hidden" name="item" value="{{$item->id}}"> 
        <button type="submit" class="btn btn-danger">{{ __('item.delete') }}</button>
        </form>
    </div>
    </div>
</div>
</div>