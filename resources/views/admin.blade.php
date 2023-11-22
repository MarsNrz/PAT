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
        <a href="/tambahadmin" type="button" class="btn btn-success mb-3" onclick="tampilkanForm()">Tambah Akun</a>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>ID akun</th>
                    <th>Username</th>
                    <th>Nama Lengkap</th>
                    <th>Lengkap</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Edit/Delete</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no = 1;
               @endphp
                @foreach ($data as $row)
                 <tr>
                    <th>{{$no++ }}</th>
                    <td>{{$row->username}}</td>
                    <td>{{$row->nama_lengkp}}</td>
                    <td>{{$row->nim}}o</td>
                    <td>{{$row->email}}</td>
                    <td>{{$row->password}}</td>
                    
                    <td>
                        <div>
                            <a href="/editadmin/{{$row->id_admin}}" class="btn btn-primary">Edit</a>
                            <a href="/deleteadmin/{{$row->id_admin}}" class="btn btn-danger">Delete</a>
                        </div>
                    </td>
                </tr>
             @endforeach
              
            </tbody>
        </table>
    </div>
</body>
</html>
