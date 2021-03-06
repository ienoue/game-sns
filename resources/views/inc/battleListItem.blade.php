{{-- 対戦結果 --}}
<div class="d-flex justify-content-between align-items-center px-3">

    <span class="text-muted">{{ $battle->created_at }}</span>

    {{-- 投稿内容へのリンク --}}
    <a role="button" href="{{ $battle->post->id ? route('posts.show', ['post' => $battle->post]) : '' }}"
        @class([
            'btn',
            'outline-0',
            'disabled' => !$battle->post->id,
        ])>
        <i class="fa-solid fa-pen-to-square fa-fw"></i>
        投稿内容
    </a>
    {{-- /投稿内容へのリンク --}}

</div>

<div class="card mb-4 shadow-sm">
    <ul class="list-group list-group-flush position-relative">

        <li class="list-group-item">
            <div>
                {{-- モンスター画像 --}}
                <a href="{{ route('monsters.show', ['monster' => $battle->userMonster]) }}"
                    class="text-decoration-none">
                    <img src="{{ $battle->userMonster->small_image_path }}" class="rounded-circle border me-2"
                        alt="モンスター" style="width:3rem;height:3rem;">
                </a>
                {{-- /モンスター画像 --}}

                {{-- 名前 --}}
                <a href="{{ route('users.index', ['user' => $battle->user->name]) }}"
                    class="text-reset text-decoration-none fw-bold me-2">
                    {{ $battle->user->name }}
                </a>
                {{-- /名前 --}}

                {{-- 対戦結果 --}}
                @if ($battle->user->is($battle->winUser))
                    <span class="badge bg-primary rounded-pill">WIN</span>
                @endif
                {{-- /対戦結果 --}}
            </div>
        </li>

        <li class="list-group-item border-bottom-0">
            <div>
                {{-- モンスター画像 --}}
                <a href="{{ route('monsters.show', ['monster' => $battle->postMonster]) }}"
                    class="text-decoration-none">
                    <img src="{{ $battle->postMonster->small_image_path }}" class="rounded-circle border me-2"
                        alt="モンスター" style="width:3rem;height:3rem;">
                </a>
                {{-- /モンスター画像 --}}

                {{-- 名前 --}}
                <a href="{{ route('users.index', ['user' => $battle->postUser()->name]) }}"
                    class="text-reset text-decoration-none fw-bold me-2">
                    {{ $battle->postUser()->name }}
                </a>
                {{-- /名前 --}}

                {{-- 対戦結果 --}}
                @if (!$battle->user->is($battle->winUser))
                    <span class="badge bg-primary rounded-pill">WIN</span>
                @endif
                {{-- /対戦結果 --}}
            </div>
        </li>

        <div class="position-absolute top-50 start-50 translate-middle bg-white">
            <span class="fa-stack">
                <i class="fa-regular fa-heart fa-stack-2x"></i>
                <i class="fa-solid fa-arrow-down fa-stack-1x"></i>
            </span>
        </div>
    </ul>
</div>
{{-- /対戦結果 --}}