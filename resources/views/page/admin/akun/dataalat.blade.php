@extends('layouts.base_admin.base_dashboard')

@section('judul', 'barang')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data alat</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('home') }}">Beranda</a>
                        </li>
                        <li class="breadcrumb-item active">data alat</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">nama_alat</th>
                <th scope="col">jenis_alat</th>
                <th scope="col">kode_alat</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>123</td>
                <td>
                    <a href="" class="btn btn-info">Edit</a>
                    <a href="" class="btn btn-danger">Delete</a>
                </td>
              </tr>
             
            </tbody>
          </table>
    </section>
@endsection
