{{-- モンスタ一覧 --}}
<tr>
    <td>
        <a href="{{ route('monsters.show', ['monster' => $monster]) }}">
            <img src="{{ $monster->small_image_path }}" class="rounded-circle border me-2" alt="モンスター"
                style="width:3rem;height:3rem;">
        </a>
    </td>
    <td>
        <a href="{{ route('monsters.show', ['monster' => $monster]) }}" class="text-reset text-decoration-none fw-bold">
            {{ $monster->name }}
        </a>
    </td>
    <td>{{ $monster->rarity->name }}</td>
    <td>{{ $monster->attack }}</td>
    <td>{{ $monster->pivot->updated_at }}</td>
    <td>
        <button type="button" class="{{ $partnerBtn['btnVisual'] }}" data-monster-id="{{ $monster->id }}"
            {{ $partnerBtn['btnDisabled'] }}>
            <span>{{ $partnerBtn['btnText'] }}</span>
        </button>
    </td>
</tr>
{{-- /モンスタ一覧 --}}
