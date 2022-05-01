@extends('layouts.admin')

@section('title')
    Admin Dashboard | Pinjamobi
@endsection

@section('content')
    <div
        class="section-content secetion-dashboard-home"
        data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Admin Dashboard</h2>
                <p class="dashboard-subtitle">
                    Selamat datang di Dashboard Admin Pinjamobi!
                </p>
            </div>
            <div class="dashboard-content">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">Total User</div>
                            <div class="dashboard-card-subtitle">{{ $customer }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">Total Pendapatan</div>
                            <div class="dashboard-card-subtitle">Rp. {{ number_format($revenue) }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">Total Transaksi</div>
                            <div class="dashboard-card-subtitle">{{ $transaction }}</div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection
