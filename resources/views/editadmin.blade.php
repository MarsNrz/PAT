<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Data Barang PAT</title>
</head>
<body>

    <div class="container mt-4">
        <h1 class="text-center">Edit Data Akun</h1>
        <div class="div row justify-content-center">
            <div class="div col-8">
                <div class="card">
                    <div class="card-body">
                        <form action="/updateadmin/{{$data->id_admin}}" method="POST" enctype="multipart/form-data">
                         @csrf
                            <div class="mb-3">
                              <label for="text" class="form-label">Username</label>
                              <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->username}}">
                            </div>
                            <div class="mb-3">
                              <label for="text" class="form-label">Nama Lengkap</label>
                              <input type="text" name="nama_lengkp" class="form-control" id="exampleInputPassword1" value="{{$data->nama_lengkp}}">
                            </div>
                            <div class="mb-3">
                                <label for="text" class="form-label">Nim</label>
                                <input type="text" name="nim" class="form-control" id="exampleInputPassword1" value="{{$data->nim}}">
                              </div>
                              <div class="mb-3">
                                <label for="text" class="form-label">Email</label>
                                <input type="text" name="email" class="form-control" id="exampleInputPassword1" value="{{$data->email}}">
                              </div>
                              <div class="mb-3">
                                <label for="text" class="form-label">Password</label>
                                <input type="text" name="password" class="form-control" id="exampleInputPassword1" value="{{$data->password}}">
                              </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>