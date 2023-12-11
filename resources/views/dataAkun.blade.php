<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <title>Data Akun</title>
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center">Data Akun</h1> 
        <a href="/register" type="button" class="btn btn-success mb-3">Tambah Akun</a>
        <table id="tabelAkun" class="table display">
            <thead class="table-dark">
                <tr>
                    <th>ID akun</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Edit/Delete</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no = 1;
                @endphp
                @foreach ($users as $user)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$user->nama_lengkap}}</td>
                        <td>{{$user->nim}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->password}}</td>
                        
                        <td>
                            <div>
                                <a href="{{ route('editDataAkun', ['id_akun' => $user->id_akun]) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('deleteDataAkun', ['id_akun' => $user->id_akun]) }}" class="btn btn-danger">Delete</a> 
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Tautan ke file JavaScript Bootstrap dan jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tabelAkun').DataTable();
        });
    </script>
</body>
</html>
