@extends('layouts.success')

@section('title')
    Berhasil Pesan | Pinjamobi
@endsection

@section('content')
    <div class="page-content page-success">
      <div class="section-success" data-aos="zoom-in">
        <div class="container">
          <div class="row align-item-center row-login justify-content-center">
            <div class="col-lg-6 text-center">
              <img src="/images/sukses-min.jpg" alt="" class="mb-4" />
              <h2>Transaksi Berhasil!</h2>
              <p>
                Pesanan kamu sudah berhasil dibuat nih! Silahkan tunjukkan bukti pesanan kamu ke rental mobil yang bersangkutan
              </p>
              <div>
                <a href="{{ route('dashboard-myorder') }}" class="btn btn-info w-50 mt-4"
                  >Pesanan Saya</a
                >
                <a href="{{ route('home') }}" class="btn btn-signup w-50 mt-4"
                  >Kembali ke Beranda</a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
