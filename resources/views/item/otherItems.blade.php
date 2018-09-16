<div class="card mt-4">
    <div class="card-header">
        Other items from the same product
    </div>

    <div class="card-body">
        <ul>
        @forelse ($otherItems as $otherItem)
            @if (!$otherItem->used_by)
                <li><a href="/item/{{ $otherItem->id }}">{{ $otherItem->name }}</a></li>
            @endif
        @empty
            <p>There are no items yet. Include one with the form above.</p>
        @endforelse
        </ul>
    </div>
</div>