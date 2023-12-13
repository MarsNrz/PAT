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
    @include('navbar')
    <div class="container mt-4">
        <h1 class="text-center">Data Akun</h1> 
        <a href="/register" type="button" class="btn btn-success mb-3">Tambah Akun</a>
        <table id="tabelAkun" class="table table-bordered yajra-datatables">
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
            </tbody>
        </table>
    </div>

    <!-- Tautan ke file JavaScript Bootstrap dan jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script>
    $(function(){
        var table = $('#tabelAkun').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('dat.dataAkun') !!}',
            columns: [
                { data: 'id_akun', name: 'id_akun' },
                { data: 'nama_lengkap', name: 'nama_lengkap' },
                { data: 'nim', name: 'nim' },
                { data: 'email', name: 'email' },
                { data: 'password', name: 'password' },
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true,
                },
            ]
        });

        $(document).on('click', '.delete', function(){
            var id_akun = $(this).data("id_akun");
            if(confirm("Anda yakin ingin menghapus data akun ini?")) {
                $.ajax({
                  url: "{{ route('deleteDataAkun', ['id_akun' => '__id_akun__']) }}".replace('__id_akun__', id_akun),
                    method: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success:function(data)
                    {
                        $('#tabelAkun').DataTable().ajax.reload();
                        alert('Data berhasil dihapus');
                    }
                });
            }
        });
    });
</script>
    
     {{-- <script>
         $(function(){
             var table = $('#tabelAkun').DataTable({
                 processing: true,
                 serverSide: true,
                 ajax: '{!! route('dat.dataAkun') !!}',
                 columns: [
                     { data: 'id', name: 'id' },
                     { data: 'nama_lengkap', name: 'nama_lengkap' },
                     { data: 'nim', name: 'nim' },
                     { data: 'email', name: 'email' },
                     { data: 'password', name: 'password' },
                     {
                         data: 'action',
                         name: 'action',
                         orderable: true,
                         searchable: true,
                     },
                 ]
             });
         });

          
     </script>  --}}
</body>
</html>
