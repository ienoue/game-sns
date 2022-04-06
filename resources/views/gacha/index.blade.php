@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
                <div class="card">
                    <div class="card-body text-center">
                        <form name="gacha" action="{{ route('gacha.index') }}" method="POST">
                            @csrf
                            <a href="javascript:gacha.submit()">
                                <img src="/images/treasure_box.png" class="img-fluid poyopoyo" alt="ガチャ">
                            </a>
                        </form>
                        <h4 class="card-title fw-bold mb-5">クリック!</h4>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
