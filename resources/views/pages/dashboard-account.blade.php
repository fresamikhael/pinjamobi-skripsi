@extends('layouts.dashboard')

@section('title')
    Pengaturan Akun | Pinjamobi
@endsection

@section('content')
    <div
        class="section-content secetion-dashboard-home"
        data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
            <h2 class="dashboard-title">Akun Saya</h2>
            <p class="dashboard-subtitle">
                Selamat datang di akun anda!
            </p>
            </div>
            <div class="dashboard-content">
            <div class="row">
                <div class="col-12">
                <form method="POST" action="{{ route('dashboard-settings-redirect','dashboard-settings-account') }}" class="mt-3" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <input
                                type="text"
                                class="form-control"
                                id="name"
                                placeholder="Masukkan Nama Lengkap Anda"
                                name="name"
                                value="{{ $user->name }}"
                                ></input>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nik">No. KTP</label>
                                <input
                                type="text"
                                class="form-control"
                                id="nik"
                                name="nik"
                                placeholder="Masukkan No. KTP Anda"
                                value="{{ $user->nik }}"
                                disabled
                                ></input>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone_number">No. HP</label>
                                <input
                                type="number"
                                class="form-control"
                                id="phone_number"
                                name="phone_number"
                                placeholder="Masukkan No. HP Anda"
                                value="{{ $user->phone_number }}"
                                ></input>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input
                                type="email"
                                class="form-control"
                                id="email"
                                name="email"
                                placeholder="Masukkan Email Anda"
                                value="{{ $user->email }}"
                                ></input>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Alamat</label>
                                <input
                                type="text"
                                class="form-control"
                                id="address"
                                name="address"
                                placeholder="Masukkan Alamat Anda"
                                value="{{ $user->address }}"
                                ></input>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Foto</label>
                            <input type="file" name="photo" class="form-control" value="{{ $user->photo }}" />
                            <p class="text-muted">
                                Disarankan foto dengan rasio 1:1
                            </p>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-right">
                        <button type="submit" class="btn btn-info px-5 mb-3 mr-3" >
                            Simpan
                        </button>
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
