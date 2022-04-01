{{-- マイページタブ --}}
<ul class="nav nav-pills nav-fill mb-4">
    <li class="nav-item">
        <a @class([
            'nav-link',
            'text-reset' => !$postsPage,
            'active' => $postsPage,
        ]) href="{{ route('users.index', ['name' => $user->name]) }}">
            <i class="fa-solid fa-pen fa-fw"></i>
            投稿
        </a>
    </li>
    <li class="nav-item">
        <a @class([
            'nav-link',
            'text-reset' => !$likesPage,
            'active' => $likesPage,
        ]) href="{{ route('users.likes', ['name' => $user->name]) }}">
            <i class="fa-solid fa-heart fa-fw"></i>
            いいね
        </a>
    </li>
    {{-- <li class="nav-item">
                <a @class([
                    'nav-link',
                    'text-reset' => !$battlesPage,
                    'active' => $battlesPage,
                ]) href="#" tabindex="-1" aria-disabled="true">
                    <i class="fa-solid fa-skull-crossbones fa-fw"></i>
                    バトる
                </a>
            </li>
            <li class="nav-item">
                <a @class([
                    'nav-link',
                    'text-reset' => !$monstersPage,
                    'active' => $monstersPage,
                ]) href="#" tabindex="-1" aria-disabled="true">
                    <i class="fa-solid fa-dragon fa-fw"></i>
                    モンスター
                </a>
            </li> --}}
    <li class="nav-item">
        <a @class([
            'nav-link',
            'text-reset' => !$followeePage,
            'active' => $followeePage,
        ]) href="{{ route('users.followees', ['name' => $user->name]) }}" tabindex="-1"
            aria-disabled="true">
            <i class="fa-solid fa-users fa-fw"></i>
            フォロー中<span class="ms-1 fw-bold">{{ $user->followees->count() }}</span>
        </a>
    </li>
    <li class="nav-item">
        <a @class([
            'nav-link',
            'text-reset' => !$followerPage,
            'active' => $followerPage,
        ]) href="{{ route('users.followers', ['name' => $user->name]) }}" tabindex="-1"
            aria-disabled="true">
            <i class="fa-solid fa-user fa-fw"></i>
            フォロワー<span class="ms-1 fw-bold">{{ $user->followers->count() }}</span>
        </a>
    </li>
</ul>
{{-- /マイページタブ --}}
