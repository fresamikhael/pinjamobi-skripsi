@extends('layouts.app')

@section('title')
    Cart | Pinjamobi
@endsection

@section('content')
@forelse ($carts as $cart)
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
                    <a href="{{ route('home') }}">Home</a>
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
                  @php $totalPrice = 0 @endphp
                  @foreach ($carts as $cart)
                      <tr>
                        <td style="width: 15%">
                            @if ($cart->car->galleries)
                            <img
                                src="{{ Storage::url($cart->car->galleries->first()->photos) }}"
                                alt=""
                                class="cart-image w-100"
                            />
                            @endif
                        </td>
                        <td style="width: 35%">
                            <div class="car-title">{{ $cart->car->name }}</div>
                            <div class="car-subtitle">{{ $cart->car->user->rent_name }}</div>
                        </td>
                        <td style="width: 35%">
                            <div class="car-title">Rp. {{ number_format($cart->car->price) }}</div>
                            <div class="car-subtitle">Per Hari</div>
                        </td>
                        <td style="width: 20%">
                            <form action="{{ route('cart-delete', $cart->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-remove-cart"> Batal Sewa </button>
                            </form>
                        </td>
                    </tr>
                    @php $totalPrice += $cart->car->price @endphp
                  @endforeach
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
          <form action="{{ route('checkout') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <input type="hidden" name="price" value="{{ $totalPrice }}">
              <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="rent_date">Tanggal Pinjam</label>
                        <input
                        type="date"
                        class="form-control"
                        id="rent_date"
                        name="rent_date"
                        value=""
                        required
                        ></input>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="return_date">Tanggal Kembali</label>
                        <input
                        type="date"
                        class="form-control"
                        id="return_date"
                        name="return_date"
                        value=""
                        required
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
                        value=""
                        name="phone_number"
                        placeholder="Masukkan No. HP Anda"
                        required
                        ></input>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="driver">Supir</label>
                    <select name="driver" class="form-control" id="driver">
                        @foreach ($carts as $cart)
                            @if ($cart->car->driver == 1)
                                <option value="PAKAI" selected>Pakai (+ Rp 150.000)</option>
                                <option value="TIDAK PAKAI">Tidak Pakai</option>
                            @else
                                <option value="TIDAK PAKAI" selected>Rental Tidak Menyediakan Supir</option>
                            @endif
                        @endforeach
                    </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col text-right">
                    @if($carts->count() > 1 )
                        <button type="submit" class="btn btn-info px-5" disabled>Sewa Sekarang</button>
                    @else
                        <button type="submit" class="btn btn-info px-5">Sewa Sekarang</button>
                    @endif
                </div>
            </div>
          </form>
        </div>
      </section>
    </div>
@empty
    <div class="page-content page-success">
      <div class="section-success" data-aos="zoom-in">
        <div class="container">
          <div class="row align-item-center row-login justify-content-center">
            <div class="col-lg-6 text-center mt-5">
              <img src="/images/kosong.jpg" alt="" class="w-100 mb-4" />
              <h2 class="mb-3">Wah keranjang kamu kosong nih!</h2>
              <p>
                Keranjang belanja kamu masih kosong nih, yuk cari mobil dulu di halaman mobil, atau bisa klik tombol dibawah untuk langsung masuk ke halaman mobil
              </p>
              <div>
                <a href="{{ route('cars') }}" class="btn btn-info w-50 mt-4"
                  >Cari Mobil, Yuk</a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endforelse

@endsection
