@extends('layouts.app')
@section('title', 'Arya Zafri | Tambah Data Buku')
@section('content')
    <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                @if ($errors->any())
                                <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endif
                                <div class="card">

                                    <div class="card-header">
                                        <strong>Form Tambah</strong> Data Buku
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="{{ route('buku.store')}}" enctype="multipart/form-data" method="post">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <label for="nf-email" class=" form-control-label">Judul Buku</label>
                                                <input type="text" id="inputjudul" name="judul" placeholder="" class="form-control" value="{{ old('judul') }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="nf-email" class=" form-control-label">Pengarang</label>
                                                <input type="text" id="inputpengarang" name="pengarang" placeholder="" class="form-control" value="{{ old('pengarang') }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="nf-email" class=" form-control-label">Penerbit</label>
                                                <input type="text" id="inputpenerbit" name="penerbit" placeholder="" class="form-control" value="{{ old('penerbit') }}">
                                            </div>
                                            <div class="form-group">
                                                <div class="col col-md-3">
                                                    <label for="image" class=" form-control-label">File input</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" id="gambar" name="gambar" class="form-control">
                                                </div>
                                            </div>

                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary btn-sm ">
                                                    <i class="fa fa-dot-circle-o"></i> Tambah
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
@endsection