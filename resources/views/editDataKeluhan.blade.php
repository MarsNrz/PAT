<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Data Keluhan PAT</title>
</head>
<body>

    <div class="container mt-4">
        <h1 class="text-center">Edit Data Keluhan</h1>
        <div class="div row justify-content-center">
            <div class="div col-8">
                <div class="card">
                    <div class="card-body">
                        <form action="/updateDataKeluhan/{{$data->id_keluhan}}" method="POST" enctype="multipart/form-data">
                         @csrf
                            <div class="mb-3">
                              <label for="text" class="form-label">Deskripsi Keluhan</label>
                              <input type="text" name="deskripsi_keluhan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->deskripsi_keluhan}}">
                            </div>
                            <div class="mb-3">
                              <label for="text" class="form-label">ID Akun</label>
                              <input type="text" name="id_akun" class="form-control" id="exampleInputPassword1" value="{{$data->id_akun}}">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>