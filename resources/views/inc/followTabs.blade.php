{{-- マイページフォロータブ --}}
<nav class="nav nav-pills nav-fill flex-column flex-lg-row mb-4">

    <a @class([
        'nav-link',
        'flex-lg-fill',
        'text-lg-center',
        'text-reset' => !$followeePage,
        'active' => $followeePage,
    ]) href="{{ route('users.followees', ['name' => $user->name]) }}" tabindex="-1"
        aria-disabled="true">
        <i class="fa-solid fa-users fa-fw"></i>
        フォロー中
    </a>

    <a @class([
        'nav-link',
        'flex-lg-fill',
        'text-lg-center',
        'text-reset' => !$followerPage,
        'active' => $followerPage,
    ]) href="{{ route('users.followers', ['name' => $user->name]) }}" tabindex="-1"
        aria-disabled="true">
        <i class="fa-solid fa-user fa-fw"></i>
        フォロワー
    </a>

</nav>
{{-- /マイページフォロータブ --}}
