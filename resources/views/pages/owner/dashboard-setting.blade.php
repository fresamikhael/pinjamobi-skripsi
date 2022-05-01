@extends('layouts.owner')

@section('title')
    Pengaturan Rental | Pinjamobi
@endsection

@section('content')
    <div
        class="section-content secetion-dashboard-home"
        data-aos="fade-up"
        >
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Pengaturan Rental</h2>
                <p class="dashboard-subtitle">
                    Selamat datang di menu pengaturan!
                </p>
            </div>
            <div class="dashboard-content">
            <div class="row">
                <div class="col-12">
                <form method="POST" action="{{ route('owner-settings-update-redirect','owner-setting') }}" class="mt-3" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="rent_name">Nama Rental</label>
                            <input
                                type="text"
                                class="form-control"
                                id="rent_name"
                                name="rent_name"
                                value="{{ $user->rent_name }}"
                            ></input>
                        </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="address">Alamat Rental</label>
                            <input
                                type="text"
                                class="form-control"
                                id="address"
                                name="address"
                                value="{{ $user->address }}"
                            ></input>
                        </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Status Rental</label>
                            <p class="text-muted">
                                Apakah anda ingin membuka rental?
                            </p>
                            <div
                                class="
                                custom-control
                                custom-radio
                                custom-control-inline
                                "
                            >
                                <input
                                type="radio"
                                class="custom-control-input"
                                name="rent_status"
                                id="openStoreTrue"
                                value="1"
                                {{ $user->rent_status == 1 ? 'checked' : '' }}
                                />
                                <label
                                for="openStoreTrue"
                                class="custom-control-label"
                                >Buka</label
                                >
                            </div>
                            <div
                                class="
                                custom-control
                                custom-radio
                                custom-control-inline
                                "
                            >
                                <input
                                type="radio"
                                class="custom-control-input"
                                name="rent_status"
                                id="openStoreFalse"
                                value="0"
                                {{ $user->rent_status == 0 || $user->rent_status == NULL ? 'checked' : '' }}
                                />
                                <label
                                for="openStoreFalse"
                                class="custom-control-label"
                                >Sementara Tutup</label
                                >
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col text-right">
                            <button class="btn btn-info px-5" type="submit">
                            Simpan
                            </button>
                        </div>
                        </div>
                    </div>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection
