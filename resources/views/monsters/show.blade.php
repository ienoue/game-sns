{{-- モンスターの詳細情報表示 --}}
@extends('layouts.monster')

@section('link')
    <ul class="pagination justify-content-center flex-md-row flex-column">
        <li class="mb-3">
            <a class="btn page-link flex-fill rounded-pill"
                href="{{ route('monsters.show', ['monster' => $monster->previous()]) }}">前のモンスター
            </a>
        </li>
        <li class="mx-md-4 mb-3">
            <a role="button" class="btn page-link flex-fill rounded-pill" href="{{ route('posts.index') }}">
                ホーム
            </a>
        </li>
        <li class="">
            <a class="btn page-link flex-fill rounded-pill"
                href="{{ route('monsters.show', ['monster' => $monster->next()]) }}">次のモンスター
            </a>
        </li>
    </ul>
@endsection