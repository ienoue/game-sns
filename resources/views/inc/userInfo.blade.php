<div class="card mb-4">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
            <a href="{{ route('users.index', ['name' => $user->name]) }}" class="text-reset text-decoration-none fs-5 fw-bolder">
                {{ $user->name }}
            </a>
            @if (Auth::check() && Auth::id() !== $user->id)
                <button type="button" class="btn btn-follow {{ $buttonState['btnVisual'] }}"
                    data-user-name="{{ $user->name }}">
                    <span>{{ $buttonState['btnText'] }}</span>
                </button>
            @endif
        </div>
    </div>
</div>
