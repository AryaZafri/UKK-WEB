<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    @include('partials/css')

</head>
<body>
    <div class="main-content">

        <div class="container">
            <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h3>Buku {{ $book->judul }}</h3>
                </div>
                <div class="card-body">
                    <img src="{{Storage::url($book->gambar)}}" alt="{{ $book->judul }}" class="img-thumbnail"
                        style="max-width: 300px;">
                        <h3 class="mt-3">Judul : {{ $book->judul }}</h3>
                    <p class="mt-3">Pengarang : {{ $book->pengarang }}</p>
                    <p class="mt-3">Penerbit : {{ $book->penerbit}}</p>
                <br>
                <a href="{{ route('buku.public.index') }}" class="btn btn-secondary">Kembali</a>
                
            </div>
            
        </div>
    </div>
    
</div>
</div>
</div>
</body>
</html>