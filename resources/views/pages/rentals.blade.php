@extends('layouts.app')

@section('title')
    Daftar Rental | Pinjamobi
@endsection

@section('content')
    <div class="page-content page-home">
      <section class="rental-top-rent">
        <div class="container">
          <div class="row">
            <div class="col-12" data-aos="fade-up">
              <h5>Semua Rental</h5>
            </div>
          </div>
          <div class="row">
              @php $incrementCar = 0 @endphp
              @forelse ($users as $user)
                <div
                    class="col-6 col-md-3 col-lg-2"
                    data-aos="fade-up"
                    data-aos-delay="{{ $incrementCar+= 100 }}"
                    >
                    <a href="{{ route('rental-detail', $user->id)}}" class="component-top-rental d-block">
                        <div class="top-rental">
                        <img src="/images/rental-car.svg" alt="" class="w-100" />
                        </div>
                        <p class="top-rental-text">{{ $user->rent_name }}</p>
                    </a>
                </div>
              @empty
                <div class="col-12 text-center py-5"
                        data-aos="fade-up"
                        data-aos-delay="100">
                        No Rental Found
                </div>
              @endforelse
          </div>
        </div>
      </section>
    </div>
@endsection
