<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Data Barang PAT</title>
</head>
<body>
    @include('navbar')
    <div class="container mt-4">
        <h1 class="text-center">Register</h1>
        <div class="div row justify-content-center">
            <div class="div col-8">
                <div class="card">
                    <div class="card-body">
                        <form action="/insertAkun" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <div class="mb-3">
                                    <label for="imageLink" class="form-label">Foto Profil</label>
                                    <input type="url" name="Fotoprofil" class="form-control" id="imageLink" placeholder="Enter Google Drive Image Link">
                                </div>
                              <label for="text" class="form-label">Nama Lengkap</label>
                              <input type="text" name="nama_lengkap" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3">
                                <label for="text" class="form-label">NIM</label>
                                <input type="text" name="nim" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3">
                                <label for="text" class="form-label">Email</label>
                                <input type="text" name="email" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3">
                                <label for="text" class="form-label">Password</label>
                                <input type="text" name="password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3">
                                <label for="imageLink" class="form-label">Foto KTM</label>
                                <input type="url" name="Fotoktm" class="form-control" id="imageLink" placeholder="Enter Google Drive Image Link">
                              
                            </div>
                            {{-- <a href="/login" style="color: black; font-weight:bold;">SIGN IN</a>  --}}
                            <button type="submit" class="btn btn-primary" onclick="window.location.href='/login'">Simpan</button> 
                            </form>
                          </form>
                    </div>
                </div>
            </div>
        </div>
         <!-- Tambahkan tautan ke file JavaScript Bootstrap dan jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-1ayKBPh/kMI9T9HAAKn8YMtFT7PVEw9gfs50x/bsLxGGYx/NIu2yA2WjFRTt8h/O" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    
    <script>
        // JavaScript to update image preview on input change
        document.getElementById('imageLink').addEventListener('input', function () {
            // Get the input value
            var imageUrl = this.value;
    
            // Get the image preview element
            var imagePreview = document.getElementById('imagePreview');
    
            // Update the image source attribute
            imagePreview.src = imageUrl;
        });
    </script>
</body>
</html>
