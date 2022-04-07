{{-- モンスタ一覧 --}}
<li class="list-group-item">
    <div class="d-flex justify-content-between align-items-center p-2">
        <div>
            <div class="fw-bold">
                <span class="badge bg-secondary align-middle">{{ $monster->rarity->name }}</span>
                <span class="align-middle d-inline-block">{{ $monster->name }}</span>
            </div>
            <div>攻撃力<span class="ms-2">{{ $monster->attack }}</span></div>
            <div>取得日<span class="ms-2">{{ $monster->pivot->updated_at }}</span></div>
        </div>
        <button type="button" class="{{ $partnerBtn['btnVisual'] }}" data-monster-id="{{ $monster->id }}"
            {{ $partnerBtn['btnDisabled'] }}>
            <span>{{ $partnerBtn['btnText'] }}</span>
        </button>
    </div>
</li>
{{-- /モンスタ一覧 --}}
