@extends('admin.layouts.master')
@section('title', 'Admin - tambah jurnal')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">Tambah jurnal</div>
                    <div class="card-body">
                        <form action="/administrator/jurnal/store" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input required type="text" name="judul" id="judul" class="form-control">
                                @error('judul')
                                    <div class="mt-1 text-danger">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Abstraksi</label>
                                <textarea required class="form-control" name="deskripsi" id="deskripsi"></textarea>
                                @error('judul')
                                    <div class="mt-1 text-danger">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tahun">Tahun</label>
                                <input required type="text" class="form-control" name="tahun" id="tahun">
                                @error('tahun')
                                    <div class="mt-1 text-danger">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="penerbit">Penerbit</label>
                                <input required type="text" name="penerbit" id="penerbit" class="form-control">
                                @error('penerbit')
                                    <div class="mt-1 text-danger">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="issn">ISSN</label>
                                <input type="text" class="form-control" name="issn" id="issn">
                            </div>
                            <div class="form-group">
                                <label for="bahasa">Bahasa</label>
                                <input type="text" class="form-control" name="bahasa" id="bahasa">
                            </div>
                            <div class="form-group">
                                <label for="tempat_terbit">Tempat terbit</label>
                                <input type="text" class="form-control" name="tempat_terbit" id="tempat_terbit">
                            </div>
                            <div class="form-group">
                                <label for="volume">Volume</label>
                                <input type="text" class="form-control" name="volume" id="volume">
                            </div>
                            <div class="form-group">
                                <label for="edisi">Edisi</label>
                                <input type="text" class="form-control" name="edisi" id="edisi">
                            </div>
                            <div class="form-group">
                                <label for="penulis">Penulis</label>
                                <input required type="text" class="form-control" name="penulis" id="penulis">
                                @error('penulis')
                                    <div class="mt-1 text-danger">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="disabledSelect">Kategori</label>
                                <input required type="text" disabled name="kategori" id="disabledSelect" value="Jurnal"
                                    class="form-control">
                                @error('kategori')
                                    <div class="mt-1 text-danger">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="file">Upload PDF jurnal</label>
                                        <img style="cursor: pointer" src="{{ asset('images/pdf.png') }}"
                                            class="img-fluid">
                                        <input required type="file" style="cursor: pointer" name="pdf"
                                            class="form-control-file" name="pdf" id="pdf">
                                    </div>
                                    @error('pdf')
                                    <div class="mt-1 text-danger">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
