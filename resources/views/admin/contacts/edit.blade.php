@extends('layouts.app')
@section('title', 'Arya Zafri | Edit Buku')
@section('content')
    <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Form Edit</strong> Data Buku
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="{{ route('buku.update', $book->id)}}" method="post" class="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="nf-email" class=" form-control-label">Judul Buku</label>
                                                <input type="text" id="nf-email" name="nama" placeholder="" class="form-control"
                                                value="{{ $book->judul }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="nf-email" class=" form-control-label">Pengarang</label>
                                                <input type="text" id="nf-email" name="pengarang" placeholder="" class="form-control"
                                                value="{{ $book->pengarang }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="nf-email" class=" form-control-label">Penerbit</label>
                                                <input type="text" id="nf-email" name="penerbit" placeholder="" class="form-control"
                                                value="{{ $book->penerbit }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="file-input" class=" form-control-label">Sampul Buku</label>
                                                <input type="file" id="file-input" name="file-input" class="form-control-file">
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-dot-circle-o"></i> Ubah
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection