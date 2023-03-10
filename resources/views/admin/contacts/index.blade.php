@extends('layouts.app')
@section('title', 'Arya Zafri | Data Buku')
@section('content')
    <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                <h3 class="title-5 m-b-35">Daftar Buku</h3>
                                </div>
                            </div>
                        </div>

                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        <div class="col-md-6 mb-3">
                            <form action="/buku" method="GET">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search..." name="search">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Judul Buku</th>
                                                <th>Pengarang</th>
                                                <th>Penerbit</th>
                                                <th>Gambar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($books as $index => $book)
                                            <tr>
                                                <td>{{ $index + 1}}</td>
                                                <td>{{ $book->judul}}</td>
                                                <td>{{ $book->pengarang}}</td>
                                                <td>{{ $book->penerbit}}</td>
                                                <td>
                                                    @if ($book->gambar)
                                                    <img src="{{Storage::url($book->gambar)}}" alt="{{ $book->judul }}" style="max-width: 100px;">
                                                    @else
                                                    No Image
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <a href="{{ route('contacts.edit', $book->id)}}">
                                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                <i class="zmdi zmdi-edit"></i>
                                                            </button>
                                                        </a>
                                                        <a href="{{ route('contacts.destroy', $book->id)}}">
                                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                <i class="zmdi zmdi-delete"></i>
                                                            </button>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{ $books->links() }}

                                <!-- END DATA TABLE -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection