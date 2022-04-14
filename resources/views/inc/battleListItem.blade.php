<div class="card mb-4 border-bottom-0">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <span class="text-muted">{{ $battle->created_at }}</span>
        <a href="{{ route('posts.show', ['post' => $battle->post]) }}" class="text-decoration-none text-reset me-2">
            <i class="fa-solid fa-pen-to-square fa-fw"></i>
            投稿内容
        </a>
    </div>
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
                <a href="{{ route('users.index', ['name' => $battle->user->name]) }}"
                    class="text-reset text-decoration-none fw-bold me-2">
                    {{ $battle->user->name }}
                </a>
                {{-- /名前 --}}

                @if ($battle->user->is($battle->winUser))
                    <span class="badge bg-primary rounded-pill">WIN</span>
                @endif
            </div>
        </li>

        <li class="list-group-item">
            <div>
                {{-- モンスター画像 --}}
                <a href="{{ route('monsters.show', ['monster' => $battle->postMonster]) }}"
                    class="text-decoration-none">
                    <img src="{{ $battle->postMonster->small_image_path }}" class="rounded-circle border me-2"
                        alt="モンスター" style="width:3rem;height:3rem;">
                </a>
                {{-- /モンスター画像 --}}

                {{-- 名前 --}}
                <a href="{{ route('users.index', ['name' => $battle->postUser()->name]) }}"
                    class="text-reset text-decoration-none fw-bold me-2">
                    {{ $battle->postUser()->name }}
                </a>
                {{-- /名前 --}}

                @if (!$battle->user->is($battle->winUser))
                    <span class="badge bg-primary rounded-pill">WIN</span>
                @endif
            </div>
        </li>

        <div class="position-absolute top-50 start-50 translate-middle bg-white">
            <i class="fa-solid fa-circle-arrow-down"></i>
        </div>
    </ul>
</div>
