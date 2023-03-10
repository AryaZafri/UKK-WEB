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
    <title>Perpustakaan</title>

    @include('partials/css')

  </head>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
          <a class="navbar-brand" href="">Perpustakaan</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                  <a class="nav-link" href="{{route ('login')}}">Login</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{route ('register')}}">Register</a>
              </li>
          </ul>
          </div>
      </div>
  </nav>

<div class="main-content">

  <div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Daftar Buku</h1>
            <hr>

            <!-- Display search form -->
            <form action="{{ route('buku.public.index') }}" method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari judul, pengarang, atau penerbit..."
                        name="search">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Cari</button>
                    </div>
                  </div>
                </form>
                
                <!-- Display list of books -->
                <div class="row">
                @foreach ($books as $b)
                <div class="col-md-4 mb-3">
                  <div class="card">
                    @if ($b->gambar)
                        <img src="{{Storage::url($b->gambar)}}" alt="{{ $b->judul }}" class="card-img-top">
                        @endif
                        <div class="card-body">
                          <h5 class="card-title">Judul : {{ $b->judul }}</h5>
                          <p class="card-text mb-3">Pengarang : {{ $b->pengarang }}</p>
                          <a href="{{ route('buku.public.show', $b->id) }}" class="btn btn-info">Lihat Detail</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Display pagination links -->
            <div class="mt-3">
                {{ $books->appends(request()->query())->links() }}
              </div>
        </div>
      </div>
</div>
</div>
</body>

</html>
