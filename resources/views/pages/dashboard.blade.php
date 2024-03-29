@extends('layouts.dashboard')

@section('title')
    Dashboard | Pinjamobi
@endsection

@section('content')
    <div
        class="section-content secetion-dashboard-home"
        data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
            <h2 class="dashboard-title">Dashboard</h2>
            <p class="dashboard-subtitle">
                Selamat datang di menu dashboard!
            </p>
            </div>
            <div class="dashboard-content">
            <div class="row">
                <div class="col-md-4">
                <div class="card mb-2">
                    <div class="card-body">
                    <div class="dashboard-card-title">Jumlah Transaksi</div>
                    <div class="dashboard-card-subtitle">{{ number_format($transaction_count) }}</div>
                    </div>
                </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 mt-2">
                <h5 class="mb-3">Transaksi Terbaru</h5>
                @foreach ($transaction_data as $transaction)
                    <a
                        href="{{ route('dashboard-myorder-details', $transaction->id) }}"
                        class="card card-list d-block"
                    >
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1">
                                    <img src="{{ Storage::url($transaction->car->galleries->first()->photos ?? '') }}" alt="" />
                                </div>
                                <div class="col-md-4">{{ $transaction->car->name ?? '' }}</div>
                                <div class="col-md-3">{{ $transaction->transaction->user->name ?? '' }}</div>
                                <div class="col-md-3">{{ $transaction->created_at ?? '' }}</div>
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
            </div>
        </div>
    </div>
@endsection
