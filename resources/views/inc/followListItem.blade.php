{{-- ユーザリスト $userは既に使用しているのでuserモデルは$usrとする --}}
<li class="list-group-item">
    <div class="d-flex justify-content-between align-items-center p-2">

        <div>
            {{-- モンスター画像 --}}
            <a href="{{ route('users.index', ['name' => $usr->name]) }}" class="text-decoration-none">
                <img src="{{ $usr->partner->small_image_path }}" class="img-fluid rounded-circle border me-2"
                    alt="モンスター" style="width:3rem;height:3rem;">
            </a>
            {{-- /モンスター画像 --}}

            {{-- 名前 --}}
            <a href="{{ route('users.index', ['name' => $usr->name]) }}" class="text-reset text-decoration-none fs-5 align-middle">
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
</li>
{{-- /ユーサリスト --}}
