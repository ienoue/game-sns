{{-- ユーザ情報 --}}
<div class="card mb-4 shadow-sm">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">

            <div class="d-flex justify-content-between align-items-center">
                {{-- モンスター画像 --}}
                <a href="{{ route('monsters.show', ['monster' => $user->partner]) }}">
                    <img src="{{ $user->partner->small_image_path }}" class="rounded-circle border me-2" alt="モンスター"
                        style="width:3rem;height:3rem;">
                </a>
                {{-- /モンスター画像 --}}

                {{-- 名前 --}}
                <a href="{{ route('users.index', ['user' => $user->name]) }}"
                    class="text-reset text-decoration-none fs-5 fw-bold">
                    {{ $user->name }}
                </a>
                {{-- /名前 --}}
            </div>

            {{-- フォローボタン --}}
            @if (Auth::check() && Auth::id() !== $user->id)
                <button type="button" class="{{ $followBtn['btnVisual'] }}" data-user-name="{{ $user->name }}">
                    <span>{{ $followBtn['btnText'] }}</span>
                </button>
            @endif
            {{-- /フォローボタン --}}
        </div>

        {{-- フォロー数 --}}
        <div class="mb-2">
            <a href="{{ route('users.followees', ['user' => $user->name]) }}"
                class="text-reset text-decoration-none me-3">
                <span class="text-muted me-1">フォロー中</span>
                <span class="fw-bold">{{ $user->followees->count() }}</span>
            </a>

            <a href="{{ route('users.followers', ['user' => $user->name]) }}" class="text-reset text-decoration-none">
                <span class="text-muted me-1">フォロワー</span>
                <span class="fw-bold">{{ $user->followers->count() }}</span>
            </a>
        </div>
        {{-- /フォロー数 --}}

        {{-- 相棒モンスター --}}
        <div>
            <a href="{{ route('monsters.show', ['monster' => $user->partner]) }}"
                class="text-reset text-decoration-none">
                <span class="text-muted me-1">相棒モンスター</span>
                <span id="partner-name" class="fw-bold">
                    {{ $user->partner->name }}
                </span>
            </a>
        </div>
        {{-- /相棒モンスター --}}

    </div>
</div>
{{-- /ユーザ情報 --}}
