@extends('layouts.owner')

@section('title')
    Detail Pesanan | Pinjamobi
@endsection

@section('content')
    <div
        class="section-content secetion-dashboard-home"
        data-aos="fade-up">
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
                            class="w-100 mb-3"
                        />
                        </div>
                        <div class="col-12 col-md-8">
                            <form action="{{ route('owner-transaction-update', $transaction->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
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
                                        <div class="car-title">Supir</div>
                                        <div class="car-subtitle">{{ $transaction->transaction->driver }}</div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="car-title">Denda</div>
                                        <div class="car-subtitle">Rp. {{ number_format($transaction->penalty) }}</div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="car-title">Status</div>
                                            <select
                                                name="status"
                                                id="status"
                                                class="form-control"
                                                v-model="status"
                                            >
                                                <option value="DIBATALKAN">
                                                Dibatalkan
                                                </option>
                                                <option value="BELUM KEMBALI">
                                                Belum Selesai
                                                </option>
                                                <option value="DISEWA">Sedang Disewa</option>
                                                <option value="SELESAI">Selesai</option>
                                            </select>
                                    </div>
                                    <template v-if="status == 'SELESAI'">
                                    <div class="col-md-6">
                                        <div class="car-title">Tanggal Selesai</div>
                                        <input
                                        type="date"
                                        class="form-control"
                                        name="finish_date"
                                        v-model="finish_date"
                                        />
                                    </div>
                                    <div class="col-md-6">
                                        <div class="car-title">Denda</div>
                                        <input
                                        type="text"
                                        class="form-control"
                                        name="penalty"
                                        v-model="penalty"
                                        />
                                    </div>
                                    {{-- <div class="col-md-2">
                                        <button
                                        type="submit"
                                        class="btn btn-success btn-block mt-4"
                                        >
                                        Update
                                        </button>
                                    </div> --}}
                                    </template>
                                    <div class="row mt-5">
                                        <div class="col-12 text-right">
                                        <button
                                            type="submit"
                                            class="btn btn-success btn-lg mt-4"
                                            onclick="return confirm('Yakin ingin menyimpan transaksi?')"
                                        >
                                            Simpan
                                        </button>
                                        <a href="{{ route('owner-transaction-delete', $transaction->id) }}" class="btn btn-danger btn-lg mt-4" onclick="return confirm('Yakin ingin menghapus transaksi?')">Hapus Transaksi</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
          status: "{{ $transaction->status }}",
          tanggalkembali: "{{ $transaction->finish_date }}",
          denda: "{{ $transaction->penalty }}",
        },
      });
    </script>
@endpush
