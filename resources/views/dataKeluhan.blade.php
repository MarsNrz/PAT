<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-1ayKBPh/kMI9T9HAAKn8YMtFT7PVEw9gfs50x/bsLxGGYx/NIu2yA2WjFRTt8h/O" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function() {
            // Inisialisasi DataTables
            $('#tabelKeluhan').DataTable({
                dom: 'Bfrtip', // Menambahkan tombol ekspor
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>
    <title>Data Keluhan PAT</title>
</head>
<body>
    @include('navbar')
    <div class="container mt-4">
        <h1 class="text-center">List Keluhan</h1>
        <a href="/tambahDataKeluhan" type="button" class="btn btn-success mb-3" onclick="tampilkanForm()">Tambah Keluhan</a>
        <table id="tabelKeluhan" class="table display">
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
