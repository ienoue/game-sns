<div class="card mb-4">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
            {{-- ユーザ情報 --}}
            <a href="{{ route('users.index', ['name' => $user->name]) }}"
                class="text-reset text-decoration-none fs-5 fw-bolder">
                {{ $user->name }}
            </a>
            @if (Auth::check() && Auth::id() !== $user->id)
                <button type="button" class="{{ $followBtn['btnVisual'] }}" data-user-name="{{ $user->name }}">
                    <span>{{ $followBtn['btnText'] }}</span>
                </button>
            @endif
            {{-- /ユーザ情報 --}}
        </div>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">相棒モンスター <span id="partner-name">{{ $user->partner->name }}</span></li>
    </ul>
</div>
