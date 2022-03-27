<div class="card mb-4">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="{{ route('users.index', ['name' => $user->name]) }}" class="text-reset text-decoration-none">
                <h5 class="card-title">{{ $user->name }}</h5>
            </a>
            @if (Auth::check() && Auth::id() !== $user->id)
                <button type="button" class="btn btn-follow {{ $buttonState['btnVisual'] }}"
                    data-user-name="{{ $user->name }}">
                    <i class="fa-solid {{ $buttonState['icon'] }}"></i>
                    <span>{{ $buttonState['btnText'] }}</span>
                </button>
            @endif
        </div>
        <p class="card-text">{{ $user->introduction }}</p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <a href="{{ route('users.followees', ['name' => $user->name]) }}"
                class="text-reset text-decoration-none">フォロー中 {{ $user->followees->count() }}
            </a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('users.followers', ['name' => $user->name]) }}"
                class="text-reset text-decoration-none">フォロワー {{ $user->followers->count() }}
            </a>
        </li>
        <li class="list-group-item">相棒モンスター test</li>
        <li class="list-group-item">バトル回数 1,324</li>
        <li class="list-group-item">勝率 53%</li>
    </ul>
</div>
