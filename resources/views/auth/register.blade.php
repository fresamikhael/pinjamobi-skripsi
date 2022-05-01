@extends('layouts.auth')

@section('title')
    Daftar | Pinjamobi
@endsection

@section('content')

<div class="page-content page-auth" id="register">
    <div class="section-rental-auth" data-aos="fade-up">
    <div class="container">
        <div class="row align-items-center justify-content-center row-login">
            <div class="col-lg-4">
                <h2>
                Mulai pesan mobil <br />
                dengan cara terbaru
                </h2>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <label>Nomor Induk Kependudukan (NIK)</label>
                        <input id="nik"
                                v-model="nik"
                                @change="checkForNikAvailability()"
                                type="number"
                                class="form-control @error('nik') is-invalid @enderror"
                                :class="{ 'is-invalid' : this.nik_unavailable }"
                                placeholder="Masukkan No. KTP Anda"
                                name="nik"
                                value="{{ old('nik') }}"
                                required
                                autocomplete="nik"
                                autofocus>

                        @error('nik')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Nama Lengkap (sesuai KTP)</label>
                        <input id="name"
                            v-model="name"
                            type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            placeholder="Masukkan Nama Lengkap Anda"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            autocomplete="name"
                            autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input id="email"
                            v-model="email"
                            type="email"
                            class="form-control @error('email') is-invalid @enderror"
                            placeholder="Masukkan Email Anda"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input id="password"
                            type="password"
                            class="form-control @error('password') is-invalid @enderror"
                            placeholder="Masukkan Password Anda"
                            name="password"
                            required
                            autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Konfirmasi Password</label>
                        <input id="password-confirm"
                            type="password"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            placeholder="Masukkan Password Anda"
                            name="password_confirmation"
                            required
                            autocomplete="new-password">

                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Alamat Lengkap</label>
                        <input id="address"
                                v-model="address"
                                type="text"
                                class="form-control @error('address') is-invalid @enderror"
                                placeholder="Masukkan Alamat Anda"
                                name="address"
                                value="{{ old('address') }}"
                                required
                                autocomplete="address"
                                autofocus>

                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit"
                        class="btn btn-info btn-block mt-4"
                        :disabled="this.nik_unavailable"
                        >Daftar Sekarang</button
                    >
                    <a href="{{ route('login') }}" class="btn btn-signup btn-block mt-2"
                        >Kembali ke Login</a
                    >
                </form>
            </div>
        </div>
    </div>
    </div>
</div>

<div class="container" style="display: none">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
      Vue.use(Toasted);

      var register = new Vue({
        el: "#register",
        mounted() {
          AOS.init();
        },
        methods: {
            checkForNikAvailability: function() {
                var self = this;
                axios.get('{{ route('api-register-check') }}', {
                    params: {
                        nik: this.nik
                    }
                })
                .then(function (response) {

                    if(response.data == 'Available') {
                        self.$toasted.show(
                        "NIK anda tersedia! Silahkan lanjut langkah berikutnya",
                        {
                        position: "top-center",
                        className: "rounded",
                        duration: 1000,
                        }
                    );
                    self.nik_unavailable = false;
                    } else {
                        self.$toasted.error(
                            "Maaf, tampaknya NIK sudah terdaftar pada sistem kami.",
                        {
                        position: "top-center",
                        className: "rounded",
                        duration: 1000,
                        }
                    );
                    self.nik_unavailable = true;

                    }
                    // handle success
                    console.log(response);
                });
            }
        },
        data() {
          return {
            nik: "",
            name: "",
            email: "",
            address: "",
            nik_unavailable: false,
          }
        }
      });
    </script>
@endpush
