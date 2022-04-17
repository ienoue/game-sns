{{-- モンスタ一覧 --}}
<tr>
    <td>
        {{-- モンスター画像 --}}
        <a href="{{ route('monsters.show', ['monster' => $monster]) }}">
            <img src="{{ $monster->small_image_path }}" class="rounded-circle border me-2" alt="モンスター"
                style="width:3rem;height:3rem;">
        </a>
        {{-- /モンスター画像 --}}
    </td>
    <td>
        {{-- モンスター名 --}}
        <a href="{{ route('monsters.show', ['monster' => $monster]) }}"
            class="text-reset text-decoration-none fw-bold">
            {{ $monster->name }}
        </a>
        {{-- /モンスター名 --}}
    </td>
    <td>{{ $monster->rarity->name }}</td>
    <td>{{ $monster->attack }}</td>
    <td>{{ $monster->pivot->updated_at }}</td>
    <td>
        {{-- 相棒ボタン --}}
        <button type="button" class="{{ $partnerBtn['btnVisual'] }}" data-monster-id="{{ $monster->id }}"
            {{ $partnerBtn['btnDisabled'] }}>
            <span>{{ $partnerBtn['btnText'] }}</span>
        </button>
        {{-- /相棒ボタン --}}
    </td>
</tr>
{{-- /モンスタ一覧 --}}
