@extends('layouts.app')

@section('javascript')
    @include('inc.transformToJs')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                {{-- エラー表示 --}}
                @include('inc.error')
                {{-- /エラー表示 --}}

                {{-- ガチャ --}}
                @auth
                    <div class="card mb-4 text-center shadow-sm">
                        <div class="card-body d-flex justify-content-around">
                            <img src="/images/monsters/regular/fountain_guardian.png" class="img-fluid" alt="モンスター"
                                style="width:5rem;height:5rem;">
                            <div>
                                <h5 class="card-title fw-bold mb-3">
                                    <i class="fa-solid fa-gem fa-fw"></i>
                                    ガチャ
                                    <i class="fa-solid fa-gem fa-fw"></i>
                                </h5>

                                {{-- ガチャページへのリンク --}}
                                <a role="button" href="{{ $remainingGachaCount > 0 ? route('gacha.index') : '' }}"
                                    @class([
                                        'btn',
                                        'btn-outline-primary',
                                        'disabled' => $remainingGachaCount <= 0,
                                    ])>本日あと<span
                                        class="fw-bold mx-1">{{ $remainingGachaCount }}</span>回
                                </a>
                                {{-- /ガチャページへのリンク --}}

                            </div>
                            <img src="\images\monsters\regular\lightning.png" class="img-fluid" alt="モンスター"
                                style="width:5rem;height:5rem;">
                        </div>
                    </div>
                @endauth
                {{-- /ガチャ --}}

                {{-- 投稿フォーム --}}
                @auth
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <form action="{{ route('posts.store') }}" method="POST" id="formNewPost">
                                @csrf
                                {{-- 入力欄：投稿内容 --}}
                                <div class="mb-2">
                                    <textarea class="form-control" rows="2" name="text" placeholder="好きな話題を投稿してみよう">{{ old('text') }}</textarea>
                                </div>
                                {{-- /入力欄：投稿内容 --}}

                                {{-- 入力欄：タグ --}}
                                <div class="mb-2">
                                    <input type="text" class="form-control customLook" name="tags" value="{{ old('tags') }}"
                                        placeholder="タグを5個まで入力できます">
                                </div>
                                {{-- /入力欄：タグ --}}

                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa-solid fa-pen-to-square fa-fw"></i>投稿する
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endauth
                {{-- /投稿フォーム --}}

                {{-- 投稿内容一覧 --}}
                @foreach ($posts as $post)
                    @include('inc.post', [
                        'stretchedLink' => true,
                        'charLimit' => true,
                        'likeBtn' => $post->likeBtnStatus(),
                    ])
                @endforeach
                {{-- /投稿内容一覧 --}}

                {{-- ページネーション --}}
                {{ $posts->links() }}
                {{-- /ページネーション --}}

            </div>
        </div>
    </div>
@endsection
