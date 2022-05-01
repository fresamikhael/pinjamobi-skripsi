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
            <h2 class="dashboard-title">Tambahkan Mobil</h2>
            <p class="dashboard-subtitle">Tambahkan Mobil Anda</p>
            </div>
            <div class="dashboard-content">
            <div class="row mb-5">
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
                <form action="{{ route('owner-mycars-store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                    <div class="card">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Nama Mobil</label>
                            <input type="text" class="form-control" name="name"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Harga Sewa/Hari</label>
                            <input type="number" class="form-control" name="price"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Kategori</label>
                            <select name="categories_id" class="form-control">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Denda/Hari</label>
                            <input type="number" class="form-control" name="penalty"/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                            <label>Deskripsi Mobil</label>
                            <textarea name="description" id="editor"></textarea>
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
                                <option value="TERSEDIA">Tersedia</option>
                                <option value="TIDAK TERSEDIA">Tidak Tersedia</option>
                            </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>No. Plat</label>
                            <input type="text" class="form-control" name="v_regist_number" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Warna</label>
                            <input type="text" class="form-control" name="colour" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Tanggal Iklan</label>
                            <input type="date" class="form-control" name="start_date" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Akhir Iklan</label>
                            <input type="date" class="form-control" name="end_date" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Gambar</label>
                            <input type="file" name="photo" class="form-control" />
                            <p class="text-muted">
                                Kamu dapat memilih lebih dari satu file
                            </p>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col text-right">
                            <button class="btn btn-info px-5" type="submit">
                            Simpan
                            </button>
                        </div>
                        </div>
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
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
      CKEDITOR.replace("editor");
    </script>
@endpush
