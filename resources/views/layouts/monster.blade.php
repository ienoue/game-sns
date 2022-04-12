{{-- モンスター情報 --}}
@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="fw-bold">
                                <span class="badge bg-secondary align-middle fs-6">{{ $monster->rarity->name }}</span>
                                <span class="align-middle d-inline-block fs-5">{{ $monster->name }}</span>
                            </div>

                            {{-- 相棒ボタン --}}
                            @if (Auth::check() && Auth::user()->hasMonster($monster))
                                <button type="button" class="{{ $partnerBtn['btnVisual'] }}"
                                    data-monster-id="{{ $monster->id }}" {{ $partnerBtn['btnDisabled'] }}>
                                    <span>{{ $partnerBtn['btnText'] }}</span>
                                </button>
                            @endif
                            {{-- /相棒ボタン --}}
                        </div>

                        {{-- モンスター画像 --}}
                        <div class="text-center">
                            <img src="{{ $monster->image_path }}" class="img-fluid rounded mb-3" alt="モンスター">
                        </div>
                        {{-- /モンスター画像 --}}

                        {{-- モンスター情報 --}}
                        <ul class="list-group list-group-flush text-center mb-3">
                            <li class="list-group-item">
                                <div class="">攻撃力</div>
                                <div class="fw-bold fs-4">
                                    {{ $monster->attack }}
                                </div>
                            </li>
                        </ul>
                        {{-- /モンスター情報 --}}

                        {{-- 操作ボタン --}}
                        @yield('link')
                        {{-- /操作ボタン --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
