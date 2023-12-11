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
                      <form action="{{ route('updateDataAkun', ['id_akun' => $user->id_akun]) }}" method="POST" enctype="multipart/form-data">
                         @csrf

                                <div class="mb-3">
                                  <label for="text" class="form-label">Nama Lengkap</label>
                                  <input type="text" name="nama_lengkap" class="form-control" id="exampleInputPassword1" value="{{$user->nama_lengkap}}">
                                </div>                         <div class="mb-3">
                                <label for="text" class="form-label">Nim</label>
                                <input type="text" name="nim" class="form-control" id="exampleInputPassword1" value="{{$user->nim}}">
                              </div> 
                              <div class="mb-3">
                                <label for="text" class="form-label">Email</label>
                                <input type="text" name="email" class="form-control" id="exampleInputPassword1" value="{{$user->email}}">
                              </div>
                              <div class="mb-3">
                                <label for="text" class="form-label">Password</label>
                                <input type="text" name="password" class="form-control" id="exampleInputPassword1" value="{{$user->password}}">
                              </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>