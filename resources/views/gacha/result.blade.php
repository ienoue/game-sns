@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
                <div class="card">
                    <div class="card-body">
                        <img src="{{ $monster->picture_path }}" class="img-fluid mb-4" alt="ガチャ">
                        <ul class="list-group list-group-flush text-center mb-4">
                            <li class="list-group-item">
                                <div class="">名前</div>
                                <div class="fw-bold fs-5">
                                    {{ $monster->name }}
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="">攻撃力</div>
                                <div class="fw-bold fs-5">
                                    {{ $monster->attack }}
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="">レア度</div>
                                <div class="fw-bold fs-5">
                                    {{ $monster->rarity->name }}
                                </div>
                            </li>
                        </ul>
                        <div class="d-flex" role="group" aria-label="gacha">
                            <form action="{{ route('monsters.update', ['monster' => $monster]) }}" method="POST">
                                @method('PATCH')
                                @csrf
                                <button type="submit" class="btn btn-primary text-white flex-fill me-3" href="#">
                                    相棒に設定
                                </button>
                            </form>
                            <a role="button" class="btn btn-primary text-white flex-fill me-3"
                                href="{{ route('gacha.index') }}">
                                次のガチャ
                            </a>
                            <a role="button" class="btn btn-primary text-white flex-fill"
                                href="{{ route('posts.index') }}">
                                ホーム
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
