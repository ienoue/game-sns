@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="fw-bold">
                                <span class="badge bg-secondary align-middle fs-6">{{ $monster->rarity->name }}</span>
                                <span class="align-middle d-inline-block fs-5">{{ $monster->name }}</span>
                            </div>

                            <button type="button" class="{{ $partnerBtn['btnVisual'] }}"
                                data-monster-id="{{ $monster->id }}" {{ $partnerBtn['btnDisabled'] }}>
                                <span>{{ $partnerBtn['btnText'] }}</span>
                            </button>
                        </div>

                        <img src="{{ $monster->picture_path }}" class="img-fluid img-fluid rounded mb-3" alt="モンスター">

                        <ul class="list-group list-group-flush text-center mb-3">
                            <li class="list-group-item">
                                <div class="">攻撃力</div>
                                <div class="fw-bold fs-4">
                                    {{ $monster->attack }}
                                </div>
                            </li>
                        </ul>

                        <ul class="pagination justify-content-center">
                            <li>
                                <a class="btn page-link flex-fill rounded-pill"
                                    href="{{ route('users.index', ['name' => Auth::user()->name]) }}">ガチャ履歴
                                </a>
                            </li>
                            <li class="mx-4">
                                <a role="button" class="btn page-link flex-fill rounded-pill"
                                    href="{{ route('posts.index') }}">
                                    ホーム
                                </a>
                            </li>
                            <li>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
