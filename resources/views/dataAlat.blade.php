<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

    <title>Data Barang PAT</title>
</head>
<body>
    @include('navbar')
    <div class="container mt-4">
        <a href="home">
            <img
              src="/image/home_.png"
              alt="Description of the image"
              class="img-fluid custom-image"
              style="float: left; margin-left: -100px; width: 50px; height: auto;"
              onclick="window.location.href='home';"
              >
          </a>
        <h1 class="text-center">List Alat</h1>
        <a href="/tambahDataAlat" type="button" class="btn btn-success mb-3" onclick="tampilkanForm()">Tambah Alat</a>
        <table id="tabelAlat" class="table display">
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
                            {{-- <a href="/editDataAlat/{{$item->id_alat}}" class="btn btn-light">Edit</a>
                            <a href="/deleteDataAlat/{{$item->id_alat}}" class="btn btn-danger">Delete</a> --}}

                              <a href="{{ route('editDataAlat', ['id_alat' => $item->id_alat]) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('deleteDataAlat', ['id_alat' => $item->id_alat]) }}" class="btn btn-danger">Delete</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Tambahkan tautan ke file JavaScript Bootstrap dan jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-1ayKBPh/kMI9T9HAAKn8YMtFT7PVEw9gfs50x/bsLxGGYx/NIu2yA2WjFRTt8h/O" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    
    <script>
        $(document).ready(function() {
            $('#tabelAlat').DataTable();
        });


    </script>
</body>
</html>
