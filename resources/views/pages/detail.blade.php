@extends('layouts.app')

@section('title')
    Detail Mobil | Pinjamobi
@endsection

@section('content')
    <div class="page-content page-details">
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
                                <li class="breadcrumb-item active">
                                    Car Details
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>

        <section class="rental-gallery mb-5" id="gallery">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8" data-aos="zoom-in">
                        <transition name="slide-fade" mode="out-in">
                            <img
                                :src="photos[activePhoto].url"
                                :key="photos[activePhoto].id"
                                class="w-100 main-image"
                                alt=""
                            />
                        </transition>
                    </div>
                    <div class="col-lg-2">
                        <div class="row">
                            <div
                                class="col-3 col-lg-12 mt-2 mt-lg-0"
                                v-for="(photo, index) in photos"
                                :key="photo.id"
                                data-aos="zoom-in"
                                data-aos-delay="100"
                            >
                                <a href="#" @click="changeActive(index)">
                                    <img
                                        :src="photo.url"
                                        class="w-100 thumbnail-image"
                                        :class="{ active: index == activePhoto }"
                                        alt=""
                                    />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="rental-details-container" data-aos="fade-up">
            <section class="rental-heading">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <h1>{{ $car->name }}</h1>
                            <div class="owner">By {{ $car->user->rent_name }}</div>
                            <div class="price">Rp. {{ number_format($car->price)}}/Hari</div>
                        </div>
                        <div class="col-lg-2" data-aos="zoom-in">
                            @auth
                                <form action="{{ route('detail-add', $car->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <button
                                        type="submit"
                                        class="btn btn-info px-4 text-white btn-block mb-3"
                                    >
                                        Sewa
                                    </button>
                                </form>
                            @else
                                <a
                                    href="{{ route('login') }}"
                                    class="btn btn-info px-4 text-white btn-block mb-3"
                                >
                                    Masuk untuk Sewa
                                </a>
                            @endauth

                        </div>
                    </div>
                </div>
            </section>

            <section class="rental-description">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-8 mb-3">
                            <h5 class="font-weight-bold">Deskripsi Mobil</h5>
                        </div>

                        <div class="col-12 col-lg-8">
                            {!! $car->description !!}
                        </div>
                        <br>
                        <br>
                        <div class="col-12 col-lg-8 mb-3">
                            <h5 class="font-weight-bold">Informasi Mobil</h5>
                        </div>
                        <br>
                        <br>
                        <div class="col-12 col-lg-8">
                            Denda/Hari : {{ number_format($car->penalty)}}
                        </div>
                        <div class="col-12 col-lg-8">
                            Warna Mobil : {{ $car->colour }}
                        </div>
                        <div class="col-12 col-lg-8">
                            No. Plat : {{ $car->v_regist_number }}
                        </div>
                        <div class="col-12 col-lg-8">
                            Status : {{ $car->status }}
                        </div>
                        <div class="col-12 col-lg-8">
                            Supir :
                            @if($car->driver==1)
                                TERSEDIA
                            @else
                                TIDAK TERSEDIA
                            @endif
                        </div>
                    </div>
                </div>
            </section>
            <section class="rental-owner">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-8 mt-3 mb-3">
                            <h5 class="font-weight-bold">Informasi Rental</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <ul class="list-unstyled">
                                <li class="media">
                                    <img
                                        src="/images/shops.svg"
                                        alt=""
                                        class="mr-3 rounded-circle"
                                    />
                                    <div class="media-body">
                                        <div class="owner">
                                            {{ $car->user->rent_name }}
                                        </div>
                                        @if($car->user->rent_status==1)
                                            <span class="badge badge-pill badge-success">Rental Buka</span>
                                        @else
                                            <span class="badge badge-pill badge-danger">Rental Tutup</span>
                                        @endif
                                    </div>
                                    <a
                                        href="{{ route('rental-detail', $car->users_id ) }}"
                                        class="btn btn-info px-4 text-white mb-3"
                                    >
                                        Lihat Rental
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script>
        var gallery = new Vue({
            el: "#gallery",
            mounted() {
                AOS.init();
            },
            data: {
                activePhoto: 0,
                photos: [
                    @foreach ($car->galleries as $gallery)
                        {
                            id: {{ $gallery->id }},
                            url: "{{ Storage::url($gallery->photos) }}"
                        },
                    @endforeach
                ]
            },
            methods: {
                changeActive(id) {
                    this.activePhoto = id;
                }
            }
        });
    </script>
@endpush
