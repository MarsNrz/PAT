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
        <h1 class="text-center">List Keluhan</h1>
        <a href="/tambahDataKeluhan" type="button" class="btn btn-success mb-3" onclick="tampilkanForm()">Tambah Keluhan</a>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>ID Keluhan</th>
                    <th>Deskripsi Keluhan</th>
                    <th>ID Akun</th>
                    <th>Edit/Delete</th>
                </tr>
            </thead>
            <tbody>
                @php
                 $no = 1;
                @endphp
                @foreach ($data as $item)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$item->deskripsi_keluhan}}</td>
                    <td>{{$item->id_akun}}</td>
                    <td>
                        <div>
                            <a href="/editDataKeluhan/{{$item->id_keluhan}}" class="btn btn-light">Edit</a>
                            <a href="/deleteDataKeluhan/{{$item->id_keluhan}}" class="btn btn-danger">Delete</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
