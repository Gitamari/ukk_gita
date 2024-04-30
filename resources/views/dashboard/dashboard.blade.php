<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>

<body style="background-color: rgba(133, 41, 41, 0.737)">

    {{-- Navbar Positioned Top  --}}
    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container bg-light rounded p-2">
            <a class="navbar-brand fw-bold" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        {{-- All Post --}}
                        <a class="nav-link" href="{{ route('guest') }}">Home</a>
                    </li>
                    @guest
                    @else
                        {{-- Dashboard --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                    @endguest
                    {{-- Create Album --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('album') }}">Album</a>
                    </li>
                    {{-- Create Photo --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('foto') }}">Foto</a>
                    </li>
                </ul>
            </div>
            <div class="navbar-nav ms-auto">
                <a href="{{ route('logout') }}" class="btn btn-info text-white">logout</a>
            </div>
        </div>
    </nav>

    {{-- Main Content (Fetch Album and Photo) --}}
    <div class="container">
        <div class="row">
            <div class="col">
                <br>
                <h6>Album : </h6>
                <ul>
                    <li style="list-style-type: none">
                        @foreach ($albums as $album)
                            <a href="{{ route('dashboard.sort', ['album_id' => $album->id]) }}"
                                class="btn btn-secondary">{{ $album->namaAlbum }}</a>
                        @endforeach
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            @foreach ($fotos as $photo)
                <div class="col-md-4 mb-4">
                    <div class="card bg-dark">
                        <div class="position-relative">
                            <form action="{{ route('delete.potos', ['id' => $photo->id]) }}" method="POST"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="btn btn-danger btn-sm position-absolute top-0 start-0 mt-2 ms-2"
                                    onclick="confirmDelete({{ $photo->id }})">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>

                            <img src="{{ asset($photo->lokasifile) }}" class="card-img-top" alt="...">
                        </div>

                        <div class="card-body text-white">
                            <h5 class="card-title text-white">{{ $photo->judulFoto }}</h5>
                            <p class="card-text text-white">{{ $photo->deskripsi }}</p>
                            <div class="col d-flex justify-content-start ">
                                <p class="card-text" style="margin-right: 15px;">{{ $likeCount[$photo->id] }} <i
                                        class="far fa-thumbs-up"></i></p>
                                <p class="card-text">{{ $komentarCount[$photo->id] }} <i class="far fa-comment"></i>
                                </p>
                            </div>
                        </div>
                        <div class="card-footer d-flex ">
                            <form action="{{ route('like', ['id' => $photo->id]) }}" method="POST"
                                style="margin-right: 5px;">
                                @csrf
                                <input type="hidden" name="foto_id" value="{{ $photo->id }}">
                                <button type="submit" class="btn btn-light"><i class="far fa-thumbs-up"></i></button>
                            </form>
                            <a href="{{ route('komentar', ['id' => $photo->id]) }}" class="btn btn-secondary"><i
                                    class="far fa-comment"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
