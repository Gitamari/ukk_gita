<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Foto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body style="background-color: rgba(133, 41, 41, 0.737)">
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-5">
                <h4 class="text-white text-center">Form Foto</h4>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('foto.post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="judulFoto" class="form-label text-white">Judul Foto</label>
                        <input type="text" class="form-control" name="judulFoto" id="judulFoto">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="deskripsi" class="form-label text-white">Deskripsi</label>
                        <input type="text" name="deskripsi" id="deskripsi" class="form-control">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="lokasifile" class="form-label text-white">File Foto <label
                                style="color: rgb(155, 152, 152)">.jpg
                                .png</label></label>
                        <input type="file" class="form-control" name="lokasifile" id="lokasifile" accept=".png,.jpg">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="album_id" class="form-label text-white">Pilih Album</label>
                        <select class="form-select" id="album_id" name="album_id" required>
                            @foreach ($albums as $album)
                                <option value="{{ $album->id }}">{{ $album->namaAlbum }}</option>
                            @endforeach
                        </select>
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
