<div class="card text-center mb-4">
    <div class="card-body">
        <ul class="nav nav-pills nav-fill">
            <li class="nav-item">
                <a @class([
                    'nav-link',
                    'text-reset' => !$postsPage,
                    'active' => $postsPage,
                ]) href="{{ route('users.index', ['name' => $user->name]) }}">投稿</a>
            </li>
            <li class="nav-item">
                <a @class([
                    'nav-link',
                    'text-reset' => !$likesPage,
                    'active' => $likesPage,
                ]) href="{{ route('users.likes', ['name' => $user->name]) }}">いいね</a>
            </li>
            <li class="nav-item">
                <a @class([
                    'nav-link',
                    'text-reset' => !$battlesPage,
                    'active' => $battlesPage,
                ]) href="#" tabindex="-1" aria-disabled="true">バトる</a>
            </li>
            <li class="nav-item">
                <a @class([
                    'nav-link',
                    'text-reset' => !$monstersPage,
                    'active' => $monstersPage,
                ]) href="#" tabindex="-1" aria-disabled="true">モンスター</a>
            </li>
            <li class="nav-item">
                <a @class([
                    'nav-link',
                    'text-reset' => !$followeePage,
                    'active' => $followeePage,
                ]) href="{{ route('users.followees', ['name' => $user->name]) }}"
                    tabindex="-1" aria-disabled="true">フォロー中</a>
            </li>
            <li class="nav-item">
                <a @class([
                    'nav-link',
                    'text-reset' => !$followerPage,
                    'active' => $followerPage,
                ]) href="{{ route('users.followers', ['name' => $user->name]) }}"
                    tabindex="-1" aria-disabled="true">フォロワー</a>
            </li>
        </ul>
    </div>
</div>
