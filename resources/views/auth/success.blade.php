@extends('layouts.success')

@section('title')
    Berhasil Daftar | Pinjamobi
@endsection

@section('content')
    <div class="page-content page-success">
      <div class="section-success" data-aos="zoom-in">
        <div class="container">
          <div class="row align-item-center row-login justify-content-center">
            <div class="col-lg-6 text-center">
              <img src="/images/register-success.svg" alt="" class="mb-4" />
              <h2>Welcome to LoraRentCar</h2>
              <p>
                Kamu sudah berhasil terdaftar bersama kami. <br />
                Mulai pinjam mobil kapanpun dan dimanapun.
              </p>
              <div>
                <a href="/rentals.html" class="btn btn-info w-50 mt-4"
                  >Cari Mobil</a
                >
                <a href="/index.html" class="btn btn-signup w-50 mt-4"
                  >Kembali ke Beranda</a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
