@extends('layouts.dashboard')

@section('title')
    Detail Pesanan | Pinjamobi
@endsection

@section('content')
    <div
        class="section-content secetion-dashboard-home"
        data-aos="fade-up"
        >
        <div class="container-fluid">
            <div class="dashboard-heading">
            <h2 class="dashboard-title">#{{ $transaction->code }}</h2>
            <p class="dashboard-subtitle">Transactions Details</p>
            </div>
            <div class="dashboard-content" id="transactionDetails">
            <div class="row">
                <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-4">
                        <img
                            src="{{ Storage::url($transaction->car->galleries->first()->photos ?? '') }}"
                            alt=""
                            class="w-100 mb-3 rounded-lg"
                        />
                        </div>
                        <div class="col-12 col-md-8">
                        <div class="row">
                            <div class="col-12 col-md-6 mb-3">
                            <h5>Informasi Peminjam</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="car-title">Nama Peminjam</div>
                                <div class="car-subtitle">{{ $transaction->transaction->user->name }}</div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="car-title">Merk Mobil</div>
                                <div class="car-subtitle">{{ $transaction->car->name }}</div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="car-title">Tanggal Sewa</div>
                                <div class="car-subtitle">{{ $transaction->transaction->rent_date }}</div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="car-title">Tanggal Kembali</div>
                                <div class="car-subtitle">{{ $transaction->transaction->return_date }}</div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="car-title">Pembayaran</div>
                                <div class="car-subtitle">
                                    {{ $transaction->transaction->transaction_status }}
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="car-title">Biaya Sewa</div>
                                <div class="car-subtitle">Rp. {{ number_format($transaction->transaction->price) }}</div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="car-title">No. HP</div>
                                <div class="car-subtitle">{{ $transaction->transaction->user->phone_number }}</div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="car-title">Denda</div>
                                <div class="car-subtitle">Rp. {{ number_format($transaction->penalty) }}</div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="car-title">Status</div>
                                <div class="car-subtitle">{{ $transaction->status }}</div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="car-title">Supir</div>
                                <div class="car-subtitle">{{ $transaction->transaction->driver }}</div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="car-title">Tanggal Selesai</div>
                                <div class="car-subtitle">{{ $transaction->finish_date }}</div>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mt-3 ml-3">
                                <h5>Catatan :</h5>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <p>
                                        Harap menunjukkan halaman ini kepada pihak rental disaat
                                        anda ingin mengambil mobil dari rental yang bersangkutan.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script>
      var transactionDetails = new Vue({
        el: "#transactionDetails",
        data: {
          status: "Sudah Selesai",
          tanggalkembali: "15 Maret 2021",
          denda: "Rp. 200,000",
        },
      });
    </script>
@endpush
