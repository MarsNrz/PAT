@extends('layouts.base_admin.base_dashboard')

@section('judul', 'barang')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List barang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}">Beranda</a>
                        </li>
                        <li class="breadcrumb-item active">list alat</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        @if(session('status'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> List Alat Berhasil!</h4>
                {{ session('status') }}
            </div>
        @endif
        <form method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-10">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card card-primary">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputnama_alat">nama alat</label>
                                <input
                                    type="text"
                                    id="inputnama_alat"
                                    name="nama_alat"
                                    class="form-control @error('nama_alat') is-invalid @enderror"
                                    placeholder="Masukkan alat"
                                    value="{{ old('nama_alat') }}"
                                    required="required"
                                    autocomplete="nama_alat">
                                @error('nama_alat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputjenis_alat">jenis alat</label>
                                <input
                                    type="text"
                                    id="inputjenis_alat"
                                    name="jenis_alat"
                                    class="form-control @error('jenis_alat') is-invalid @enderror"
                                    placeholder="Masukkan jenis alat"
                                    value="{{ old('jenis_alat') }}"
                                    required="required"
                                    autocomplete="jenis_alat">
                                @error('jenis_alat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="kode_alat">Kode alat</label>
                                <input
                                    id="kode_alat"
                                    type="text"
                                    placeholder="kode_alat"
                                    class="form-control @error('kode_alat') is-invalid @enderror"
                                    name="kode_alat"
                                    required="required"
                                    autocomplete="new-kode_alat">
                                @error('kode_alat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <a href="{{ route('home') }}" class="btn btn-secondary">Cancel</a>
                            <input type="submit" value="simpan" class="btn btn-success float-right">   
                        </div>
                  </div>
                 </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </form>
    </section>
@endsection
