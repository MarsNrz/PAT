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
        <h1 class="text-center">List Alat</h1>
        <div class="div row justify-content-center">
            <div class="div col-8">
                <div class="card">
                    <div class="card-body">
                        <form action="/insertDataAlat" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                              <label for="text" class="form-label">Nama Alat</label>
                              <input type="nama" name="nama_alat" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                              <label for="text" class="form-label">Jenis Alat</label>
                              <input type="jenis" name="jenis_alat" class="form-control" id="exampleInputPassword1">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>