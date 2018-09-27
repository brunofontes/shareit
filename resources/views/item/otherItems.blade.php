<div class="card mt-4">
    <div class="card-header">
        {{ __('item.otherItems') }}
    </div>

    <div class="card-body">
        <ul>
        @forelse ($otherItems as $otherItem)
            @if (!$otherItem->used_by)
                <li><a href="/item/{{ $otherItem->id }}">{{ $otherItem->name }}</a></li>
            @endif
        @empty
            <p>{{ __('item.noItems') }}</p>
        @endforelse
        </ul>
    </div>
</div>