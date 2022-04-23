{{-- マイページタブ --}}
<nav class="nav nav-pills nav-fill flex-column flex-lg-row mb-4">

    <a @class([
        'nav-link',
        'flex-lg-fill',
        'text-lg-center',
        'text-reset' => !$postsPage,
        'active' => $postsPage,
    ]) href="{{ route('users.index', ['name' => $user->name]) }}">
        <i class="fa-solid fa-pen-to-square fa-fw"></i>
        投稿
    </a>

    <a @class([
        'nav-link',
        'flex-lg-fill',
        'text-lg-center',
        'text-reset' => !$likesPage,
        'active' => $likesPage,
    ]) href="{{ route('users.likes', ['name' => $user->name]) }}">
        <i class="fa-solid fa-heart fa-fw"></i>
        いいね
    </a>

    <a @class([
        'nav-link',
        'flex-lg-fill',
        'text-lg-center',
        'text-reset' => !$commentsPage,
        'active' => $commentsPage,
    ]) href="{{ route('users.comments', ['name' => $user->name]) }}">
        <i class="fa-solid fa-comments fa-fw"></i>
        コメント
    </a>

    <a @class([
        'nav-link',
        'flex-lg-fill',
        'text-lg-center',
        'text-reset' => !$battlesPage,
        'active' => $battlesPage,
    ]) href="{{ route('users.battles', ['name' => $user->name]) }}" tabindex="-1"
        aria-disabled="true">
        <i class="fa-solid fa-fire fa-fw"></i>
        対戦
    </a>

    <a @class([
        'nav-link',
        'flex-lg-fill',
        'text-lg-center',
        'text-reset' => !$monstersPage,
        'active' => $monstersPage,
    ]) href="{{ route('users.monsters', ['name' => $user->name]) }}" tabindex="-1"
        aria-disabled="true">
        <i class="fa-solid fa-dragon fa-fw"></i>
        モンスター
    </a>

</nav>
{{-- /マイページタブ --}}
