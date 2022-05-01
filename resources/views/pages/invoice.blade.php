@extends('layouts.app')

@section('title')
    Detail Pesanan | Pinjamobi
@endsection

@section('content')
    <div class="page-content page-cart">
        <section
            class="rental-breadcrumbs"
            data-aos="fade-down"
            data-aos-delay="100"
        >
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="/index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Cart</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>

        <section class="rental-cart">
            <div class="container">
                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-12 table-responsive">
                        <table class="table table-borderless table-cart">
                            <thead>
                                <tr>
                                    <td>Gambar</td>
                                    <td>Merk &amp; Pemilik</td>
                                    <td>Harga</td>
                                    <td>Menu</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="width: 15%">
                                        <img
                                            src="/images/car1.jpg"
                                            alt=""
                                            class="cart-image w-100"
                                        />
                                    </td>
                                    <td style="width: 35%">
                                        <div class="car-title">
                                            Honda Jazz
                                        </div>
                                        <div class="car-subtitle">
                                            by Kimi Rental
                                        </div>
                                    </td>
                                    <td style="width: 35%">
                                        <div class="car-title">
                                            Rp. 240.000
                                        </div>
                                        <div class="car-subtitle">
                                            Per Hari
                                        </div>
                                    </td>
                                    <td style="width: 20%">
                                        <a
                                            href="#"
                                            class="btn btn-success disabled"
                                        >
                                            Tersedia
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row" data-aos="fade-up" data-aos-delay="150">
                    <div class="col-12">
                        <hr />
                    </div>
                    <div class="col-12">
                        <h2 class="mb-4">Detail Pesanan</h2>
                    </div>
                </div>
                <div
                    class="row mb-2"
                    data-aos="fade-up"
                    data-aos-delay="200"
                >
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="startDate">Tanggal Pinjam</label>
                            <p>10 Maret 2021</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="endDate">Tanggal Kembali</label>
                            <p>10 Maret 2021</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="driver">Supir</label>
                            <p>Pakai Supir</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mobilePhone">No. HP</label>
                            <p>081293281283</p>
                        </div>
                    </div>
                </div>
                <div class="row" data-aos="fade-up" data-aos-delay="150">
                    <div class="col-12">
                        <hr />
                    </div>
                    <div class="col-12">
                        <h2 class="mb-4">Detail Pembayaran</h2>
                    </div>
                </div>
                <div class="row" data-aos="fade-up" data-aos-delay="200">
                    <div class="col-4 col-md-2">
                        <div class="car-title">Rp. 200.000</div>
                        <div class="car-subtitle">Total Biaya</div>
                    </div>
                    <div class="col text-right">
                        <a href="/checkout.html" class="btn btn-info px-5"
                            >Lanjut ke Pembayaran</a
                        >
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
