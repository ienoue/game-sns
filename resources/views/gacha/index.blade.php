{{-- ガチャ準備 --}}
@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
                {{-- エラー表示 --}}
                @include('inc.error')
                {{-- /エラー表示 --}}

                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <form name="gacha" action="{{ route('gacha.index') }}" method="POST" id="formGacha">
                            @csrf
                            <button type="submit" class="btn position-relative">
                                <img src="/images/treasure_box.png"
                                    class="img-fluid {{ $hasWonYesterday ? 'fa-beat-fade' : 'fa-bounce' }}" alt="ガチャ">
                                @if ($hasWonYesterday)
                                    <span
                                        class="position-absolute top-100 start-50 translate-middle-x badge bg-danger fs-6 opacity-75">
                                        R以上確定 !
                                    </span>
                                @endif
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
