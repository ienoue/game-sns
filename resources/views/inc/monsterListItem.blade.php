<li class="list-group-item">
    <div class="d-flex justify-content-between align-items-center p-2">
        <div>
            <div>{{ $monster->name }}</div>
            <div>{{ $monster->pivot->updated_at }}</div>
            <div>{{ $monster->rarity->name }}</div>
        </div>
        <button type="button" class="{{ $partnerBtn['btnVisual'] }}"
            data-monster-id="{{ $monster->id }}" {{ $partnerBtn['btnDisabled'] }}>
            <span>{{ $partnerBtn['btnText'] }}</span>
        </button>
    </div>
</li>
