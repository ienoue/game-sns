{{-- $userは既に使用しているのでuserモデルは$usrとする --}}
<div class="card mb-4">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="{{ route('users.index', ['name' => $usr->name]) }}" class="text-reset text-decoration-none">
                <h5 class="card-title">{{ $usr->name }}</h5>
            </a>
            @if (Auth::check() && Auth::id() !== $usr->id)
                <button type="button" class="btn btn-follow {{ $buttonState['btnVisual'] }}"
                    data-user-name="{{ $usr->name }}">
                    <i class="fa-solid {{ $buttonState['icon'] }}"></i>
                    <span>{{ $buttonState['btnText'] }}</span>
                </button>
            @endif
        </div>
        <p class="card-text">{{ $usr->introduction }}</p>
    </div>
</div>
