{{-- ガチャ結果 --}}
@extends('layouts.monster')


@section('link')
    <ul class="pagination justify-content-center flex-md-row flex-column">
        <li class="mb-3">
            <a class="btn page-link flex-fill rounded-pill"
                href="{{ route('users.monsters', ['name' => Auth::user()->name]) }}">所有モンスター
            </a>
        </li>
        <li class="mx-md-4 mb-3">
            <a role="button" class="btn page-link flex-fill rounded-pill" href="{{ route('posts.index') }}">
                ホーム
            </a>
        </li>
        <li class="">
            <a role="button" href="{{ $remainingGachaCount > 0 ? route('gacha.index') : '' }}"
                @class([
                    'btn',
                    'page-link',
                    'rounded-pill',
                    'flex-fill',
                    'text-muted' => $remainingGachaCount <= 0,
                    'disabled' => $remainingGachaCount <= 0,
                ])>次のガチャ
            </a>
        </li>
    </ul>
@endsection