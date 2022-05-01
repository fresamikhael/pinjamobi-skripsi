@extends('layouts.owner')

@section('title')
    Mobil Saya | Pinjamobi
@endsection

@section('content')
    <div
        class="section-content secetion-dashboard-home"
        data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
            <h2 class="dashboard-title">Mobil Saya</h2>
            <p class="dashboard-subtitle">
                Sewakan mobil anda, dan dapatkan keuntungan!
            </p>
            </div>
            <div class="dashboard-content">
            <div class="row">
                <div class="col-12">
                <a
                    href="{{ route('owner-mycars-add') }}"
                    class="btn btn-info"
                    >Tambahkan Mobil</a
                >
                </div>
            </div>
            <div class="row mt-4">
                @foreach ($cars as $car)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <a
                            href="{{ route('owner-mycars-detail', $car->id) }}"
                            class="card card-dashboard-car d-block"
                        >
                            <div class="card-body">
                            <img
                                src="{{ Storage::url($car->galleries->first()->photos ?? '') }}"
                                alt=""
                                class="w-100 mb-2 rounded-lg"
                            />
                            <div class="car-title">{{ $car->name }}</div>
                            <div class="car-category">{{ $car->category->name }}</div>
                            </div></a
                        >
                    </div>
                @endforeach
            </div>
            </div>
        </div>
    </div>
@endsection
