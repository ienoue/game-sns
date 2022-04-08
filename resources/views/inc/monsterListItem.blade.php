{{-- モンスタ一覧 --}}
<tr>
    <td>{{ $monster->name }}</td>
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
