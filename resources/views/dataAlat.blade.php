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
        <a href="/tambahDataAlat" type="button" class="btn btn-success mb-3" onclick="tampilkanForm()">Tambah Alat</a>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>ID Alat</th>
                    <th>Nama Alat</th>
                    <th>Jenis Alat</th>
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
                    <td>{{$item->nama_alat}}</td>
                    <td>{{$item->jenis_alat}}</td>
                    <td>
                        <div>
                            <a href="/editDataAlat/{{$item->id_alat}}" class="btn btn-light">Edit</a>
                            <a href="/deleteDataAlat/{{$item->id_alat}}" class="btn btn-danger">Delete</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
