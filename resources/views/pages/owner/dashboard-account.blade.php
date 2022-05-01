@extends('layouts.owner')

@section('title')
    Pengaturan Akun | Pinjamobi
@endsection

@section('content')
    <div
        class="section-content secetion-dashboard-home"
        data-aos="fade-up"
        >
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
                <form method="POST" action="{{ route('owner-settings-redirect','owner-account') }}" class="mt-3" enctype="multipart/form-data">
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
                                value="{{ $user->nik }}"
                                disabled
                                ></input>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone_number">No. HP</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="phone_number"
                                    name="phone_number"
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
                                    value="{{ $user->address }}"
                                ></input>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Foto</label>
                            <input type="file" name="photo" class="form-control" />
                            <p class="text-muted">
                                Disarankan foto dengan rasio 1:1
                            </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-right">
                        <button type="submit" class="btn btn-info px-5" >
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
