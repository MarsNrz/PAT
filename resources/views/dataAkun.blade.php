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
            $('#tabelAkun').DataTable({
                dom: 'Bfrtip', // Menambahkan tombol ekspor
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>
    <title>Data Akun</title>
</head>
<body>
    @include('navbar')
    <div class="container mt-4">
        <h1 class="text-center">Data Akun</h1> 
        <a href="/register" type="button" class="btn btn-success mb-3">Tambah Akun</a>
        <table id="tabelAkun" class="table table-bordered yajra-datatables">
            <thead class="table-dark">
                <tr>
                    <th>ID akun</th>
                    <th>Fotoprofil</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Fotoktm</th>
                    <th>Edit/Delete</th>
                </tr>
            </thead>
            </tbody>
        </table>
    </div>

    <!-- Tautan ke file JavaScript Bootstrap dan jQuery -->
<script>

$(function () {
    var table = $('#tabelAkun').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('dat.dataAkun') !!}',
        columns: [
            { data: 'id_akun', name: 'id_akun' },
            { data: 'Fotoprofil', name: 'Fotoprofil' },
            { data: 'nama_lengkap', name: 'nama_lengkap' },
            { data: 'nim', name: 'nim' },
            { data: 'email', name: 'email' },
            { data: 'password', name: 'password' },
            { data: 'Fotoktm', name: 'Fotoktm' },
            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true,
            },
        ]
    });

    // Delete button click event
    $('#tabelAkun tbody').on('click', '.delete', function () {
        var id = $(this).data('id');
        var token = $("meta[name='csrf-token']").attr("content");

        // Ajax request to delete data
        $.ajax({
            url: '/delete-data/' + id,
            type: 'DELETE',
            data: {
                "id": id,
                "_token": token,
            },
            success: function (response) {
                if (response.success) {
                    // Reload the DataTable or perform other actions
                    table.ajax.reload();
                    alert(response.message);
                } else {
                    alert(response.message);
                }
            },
            error: function (xhr) {
                console.log(xhr.responseText);
            }
        });
    });
});


   

</script>
    
   
</body>
</html>
