{{-- マイページタブ --}}
<nav class="nav nav-pills nav-fill flex-column flex-lg-row mb-4">

    <a @class([
        'nav-link',
        'flex-sm-fill',
        'text-sm-center',
        'text-reset' => !$postsPage,
        'active' => $postsPage,
    ]) href="{{ route('users.index', ['name' => $user->name]) }}">
        <i class="fa-solid fa-pen-to-square fa-fw"></i>
        投稿
    </a>

    <a @class([
        'nav-link',
        'flex-sm-fill',
        'text-sm-center',
        'text-reset' => !$likesPage,
        'active' => $likesPage,
    ]) href="{{ route('users.likes', ['name' => $user->name]) }}">
        <i class="fa-solid fa-heart fa-fw"></i>
        いいね
    </a>

    <a @class([
        'nav-link',
        'text-reset' => !$battlesPage,
        'active' => $battlesPage,
    ]) href="{{ route('users.battles', ['name' => $user->name]) }}" tabindex="-1"
        aria-disabled="true">
        <i class="fa-solid fa-fire fa-fw"></i>
        対戦
    </a>

    <a @class([
        'nav-link',
        'text-reset' => !$monstersPage,
        'active' => $monstersPage,
    ]) href="{{ route('users.monsters', ['name' => $user->name]) }}" tabindex="-1"
        aria-disabled="true">
        <i class="fa-solid fa-dragon fa-fw"></i>
        モンスター
    </a>

    <a @class([
        'nav-link',
        'flex-sm-fill',
        'text-sm-center',
        'text-reset' => !$followeePage,
        'active' => $followeePage,
    ]) href="{{ route('users.followees', ['name' => $user->name]) }}" tabindex="-1"
        aria-disabled="true">
        <i class="fa-solid fa-users fa-fw"></i>
        フォロー中<span class="ms-1 fw-bold">{{ $user->followees->count() }}</span>
    </a>

    <a @class([
        'nav-link',
        'flex-sm-fill',
        'text-sm-center',
        'text-reset' => !$followerPage,
        'active' => $followerPage,
    ]) href="{{ route('users.followers', ['name' => $user->name]) }}" tabindex="-1"
        aria-disabled="true">
        <i class="fa-solid fa-user fa-fw"></i>
        フォロワー<span class="ms-1 fw-bold">{{ $user->followers->count() }}</span>
    </a>

</nav>
{{-- /マイページタブ --}}
