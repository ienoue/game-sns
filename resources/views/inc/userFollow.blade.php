{{-- $userは既に使用しているのでuserモデルは$usrとする --}}
<li class="list-group-item">
    <div class="d-flex justify-content-between align-items-center p-2">
        <a href="{{ route('users.index', ['name' => $usr->name]) }}" class="text-reset text-decoration-none fs-5">
            {{ $usr->name }}
        </a>
        @if (Auth::check() && Auth::id() !== $usr->id)
            <button type="button" class="btn btn-follow rounded-pill {{ $buttonState['btnVisual'] }}"
                data-user-name="{{ $usr->name }}">
                <span>{{ $buttonState['btnText'] }}</span>
            </button>
        @endif
    </div>
</li>
