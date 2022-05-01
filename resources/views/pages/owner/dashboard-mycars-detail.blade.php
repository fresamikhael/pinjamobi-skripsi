@extends('layouts.owner')

@section('title')
    Car Detail | Pinjamobi
@endsection

@section('content')
    <div
        class="section-content secetion-dashboard-home"
        data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
            <h2 class="dashboard-title">{{ $car->name }}</h2>
            <p class="dashboard-subtitle">Detail Mobil</p>
            </div>
            <div class="dashboard-content">
            <div class="row">
                <div class="col-12">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('owner-mycars-update', $car->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                    <div class="card">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Nama Mobil</label>
                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                value="{{ $car->name }}"
                            />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Harga Sewa/Hari</label>
                            <input
                                type="number"
                                name="price"
                                class="form-control"
                                value="{{ $car->price }}"
                            />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Kategori</label>
                            <select name="categories_id" class="form-control">
                                <option value="{{ $car->categories_id }}">Tidak diganti ({{ $car->category->name }})</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Denda/Hari</label>
                            <input type="number" name="penalty" class="form-control" value="{{ $car->penalty }}" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                            <label>Deskripsi Mobil</label>
                            <textarea name="description" id="editor">{!! $car->description !!}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Status Tersedia</label>
                            <select name="status" class="form-control">
                                <option value="TERSEDIA">Tersedia</option>
                                <option value="TIDAK TERSEDIA">Tidak Tersedia</option>
                            </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Supir</label>
                            <select name="driver" class="form-control">
                                <option value="1">Tersedia</option>
                                <option value="0">Tidak Tersedia</option>
                            </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>No. Plat</label>
                            <input type="text" name="v_regist_number" class="form-control" value="{{ $car->v_regist_number }}" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Warna</label>
                            <input type="text" name="colour" class="form-control" value="{{ $car->colour }}" />
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col text-right">
                            <button
                            class="btn btn-info px-5 btn-block"
                            type="submit"
                            onclick="return confirm('Yakin ingin menyimpan mobil?')"
                            >
                            Simpan
                            </button>
                            <a href="{{ route('owner-mycars-delete', $car->id) }}" class="btn btn-danger px-5 btn-block" onclick="return confirm('Yakin ingin menghapus mobil?')">Hapus Mobil</a>
                        </div>
                        </div>
                    </div>
                    </div>
                </form>
                </div>
            </div>
            <div class="row mt-2 mb-5">
                <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <div class="row">
                        @foreach ($car->galleries as $gallery)
                            <div class="col-md-4">
                                <div class="gallery-container">
                                    <img
                                    src="{{ Storage::url($gallery->photos ?? '') }}"
                                    alt=""
                                    class="w-100 rounded-lg"
                                    />
                                    <a href="{{ route('owner-mycars-gallery-delete', $gallery->id) }}" class="delete-gallery">
                                        <img src="/images/icon-delee.svg" alt="" />
                                    </a>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-12">
                            <form action="{{ route('owner-mycars-gallery-upload') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="cars_id" value="{{ $car->id }}">
                                <input
                                    type="file"
                                    name="photos"
                                    id="file"
                                    style="display: none"
                                    onchange="form.submit()"
                                />
                                <button
                                    type="button"
                                    class="btn btn-secondary btn-block mt-3"
                                    onclick="thisFileUpload()"
                                >
                                    Tambahkan Foto
                                </button>
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
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
      function thisFileUpload() {
        document.getElementById("file").click();
      }
    </script>
    <script>
      CKEDITOR.replace("editor");
    </script>
@endpush
