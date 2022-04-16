@extends('layouts.app')

@section('javascript')
    @include('inc.transformToJs')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">

                {{-- ガチャ --}}
                @auth
                    <div class="card mb-4 text-center">
                        <div class="card-body d-flex justify-content-around">
                            <img src="/images/monsters/regular/fountain_guardian.png" class="img-fluid" alt="モンスター"
                                style="width:5rem;height:5rem;">
                            <div>
                                <h5 class="card-title fw-bold mb-3">
                                    <i class="fa-solid fa-gem fa-fw"></i>
                                    ガチャ
                                    <i class="fa-solid fa-gem fa-fw"></i>
                                </h5>
                                <a role="button" href="{{ $remainingGachaCount > 0 ? route('gacha.index') : '' }}"
                                    @class([
                                        'btn',
                                        'btn-outline-primary',
                                        'disabled' => $remainingGachaCount <= 0,
                                    ])>本日あと<span
                                        class="fw-bold mx-1">{{ $remainingGachaCount }}</span>回
                                </a>
                            </div>
                            <img src="\images\monsters\regular\lightning.png" class="img-fluid" alt="モンスター"
                                style="width:5rem;height:5rem;">
                        </div>
                    </div>
                @endauth
                {{-- /ガチャ --}}

                {{-- 投稿フォーム --}}
                @auth
                    <div class="card mb-4">
                        <div class="card-body">
                            @include('inc.error')
                            <form action="{{ route('posts.store') }}" method="POST" id="formNewPost">
                                @csrf
                                <div class="mb-3">
                                    <textarea class="form-control" rows="2" name="text" placeholder="好きな話題を投稿してみよう">{{ old('text') }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control customLook" name="tags" value="{{ old('tags') }}"
                                        placeholder="タグを5個まで入力できます">
                                </div>
                                <button type="submit" class="btn btn-primary text-white">
                                    <i class="fa-solid fa-pen-to-square fa-fw"></i>投稿する
                                </button>
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
