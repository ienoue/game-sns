{{-- ユーザリスト $userは既に使用しているのでuserモデルは$usrとする --}}
<div class="card mb-3 shadow-sm">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">

            <div>
                {{-- モンスター画像 --}}
                <a href="{{ route('monsters.show', ['monster' => $usr->partner]) }}" class="text-decoration-none">
                    <img src="{{ $usr->partner->small_image_path }}" class="rounded-circle border me-2" alt="モンスター"
                        style="width:2.5rem;height:2.5rem;">
                </a>
                {{-- /モンスター画像 --}}

                {{-- 名前 --}}
                <a href="{{ route('users.index', ['user' => $usr->name]) }}"
                    class="text-reset text-decoration-none align-middle fw-bold">
                    {{ $usr->name }}
                </a>
                {{-- /名前 --}}
            </div>

            {{-- フォローボタン --}}
            @if (Auth::check() && Auth::id() !== $usr->id)
                <button type="button" class="{{ $followBtn['btnVisual'] }}" data-user-name="{{ $usr->name }}">
                    <span>{{ $followBtn['btnText'] }}</span>
                </button>
            @endif
            {{-- /フォローボタン --}}

        </div>

    </div>
</div>
{{-- /ユーサリスト --}}
