<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Album</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body style="background-color: rgba(133, 41, 41, 0.737)">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-5">
                <br>
                <a href="{{ route('dashboard') }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
                <h1 class="text-center text-white">Form Album</h1>
                <br>
                @if (session('succes'))
                    <div class="alert alert-success">
                        {{ session('succes') }}
                    </div>
                @endif
                <form action="{{ route('album.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="namaAlbum" class="form-label text-white">Nama Album</label>
                        <input type="text" name="namaAlbum" id="namaAlbum" class="form-control">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="deskripsi" class="form-label text-white">Deskripsi</label>
                        <input type="text" name="deskripsi" id="deskripsi" class="form-control">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary w-100">Simpan</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
