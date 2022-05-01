@extends('layouts.dashboard')

@section('title')
    Pesanan Saya | Pinjamobi
@endsection

@section('content')
    <div
        class="section-content secetion-dashboard-home"
        data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
            <h2 class="dashboard-title">Pesanan Saya</h2>
            <p class="dashboard-subtitle">Ini adalah list pesanan kamu</p>
            </div>
            <div class="dashboard-content">
            <div class="row">
                <div class="col-12 mt-2">
                <ul
                    class="nav nav-pills mb-3"
                    id="pills-tab"
                    role="tablist"
                >
                    <li class="nav-item" role="presentation">
                    <a
                        class="nav-link active"
                        id="pills-home-tab"
                        data-toggle="pill"
                        href="#pills-home"
                        role="tab"
                        aria-controls="pills-home"
                        aria-selected="true"
                        style="font-weight: normal;
                font-size: 18px;
                color: #9191a9;
                border-radius: 0;

                a:active:
                    font-weight: 500;
                    font-size: 18px;
                    color: #0c0d36;
                    border-bottom: 2px solid #0c0d36;
                    background: none;"
                        >Ongoing Order</a
                    >
                    </li>
                    <li class="nav-item" role="presentation">
                    <a
                        class="nav-link"
                        id="pills-profile-tab"
                        data-toggle="pill"
                        href="#pills-profile"
                        role="tab"
                        aria-controls="pills-profile"
                        aria-selected="false"
                        style="font-weight: normal;
                font-size: 18px;
                color: #9191a9;
                border-radius: 0;

                a:active:
                    font-weight: 500;
                    font-size: 18px;
                    color: #0c0d36;
                    border-bottom: 2px solid #0c0d36;
                    background: none;"
                        >All Order</a
                    >
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                <div
                    class="tab-pane fade show active"
                    id="pills-home"
                    role="tabpanel"
                    aria-labelledby="pills-home-tab"
                    >
                        @foreach ($ongoingTransactions as $transaction)
                            <a
                                href="{{ route('dashboard-myorder-details', $transaction->id) }}"
                                class="card card-list d-block"
                            >
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <img src="{{ Storage::url($transaction->car->galleries->first()->photos ?? '') }}" class="w-50" />
                                        </div>
                                        <div class="col-md-4">{{ $transaction->car->name }}</div>
                                        <div class="col-md-3">{{ $transaction->car->user->rent_name }}</div>
                                        <div class="col-md-3">{{ $transaction->created_at }}</div>
                                        <div class="col-md-1 d-none d-md-block">
                                        <img
                                            src="/images/dashboard-arrow-right.svg"
                                            alt=""
                                        />
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <div
                    class="tab-pane fade"
                    id="pills-profile"
                    role="tabpanel"
                    aria-labelledby="pills-profile-tab"
                    >
                        @foreach ($buyTransactions as $transaction)
                            <a
                                href="{{ route('dashboard-myorder-details', $transaction->id) }}"
                                class="card card-list d-block"
                            >
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <img src="{{ Storage::url($transaction->car->galleries->first()->photos ?? '') }}" class="w-50" />
                                        </div>
                                        <div class="col-md-4">{{ $transaction->car->name }}</div>
                                        <div class="col-md-3">{{ $transaction->car->user->rent_name }}</div>
                                        <div class="col-md-3">{{ $transaction->created_at }}</div>
                                        <div class="col-md-1 d-none d-md-block">
                                        <img
                                            src="/images/dashboard-arrow-right.svg"
                                            alt=""
                                        />
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
                {{-- <h5 class="mb-3">Pesanan Saya</h5> --}}
                    {{-- @foreach ($buyTransactions as $transaction)
                        <a
                            href="{{ route('dashboard-myorder-details', $transaction->id) }}"
                            class="card card-list d-block"
                        >
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-1">
                                        <img src="{{ Storage::url($transaction->car->galleries->first()->photos ?? '') }}" class="w-50" />
                                    </div>
                                    <div class="col-md-4">{{ $transaction->car->name }}</div>
                                    <div class="col-md-3">{{ $transaction->car->user->rent_name }}</div>
                                    <div class="col-md-3">{{ $transaction->created_at }}</div>
                                    <div class="col-md-1 d-none d-md-block">
                                    <img
                                        src="/images/dashboard-arrow-right.svg"
                                        alt=""
                                    />
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach --}}
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection
