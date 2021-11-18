@extends('admin.layouts.master')
@section('title', 'Admin - tambah buku')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">Tambah buku</div>
                    <div class="card-body">
                        <form action="/administrator/buku/store" method="post" enctype="multipart/form-data">
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
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" id="deskripsi"></textarea>
                                @error('deskripsi')
                                    <div class="mt-1 text-danger">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input required type="number" min="0" class="form-control" name="quantity" id="quantity">
                                @error('quantity')
                                    <div class="mt-1 text-danger">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="penerbit">Penerbit</label>
                                <input required type="text" class="form-control" name="penerbit" id="penerbit">
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
                                <label for="tahun">Tahun</label>
                                <input required type="text" class="form-control" name="tahun" id="tahun">
                                @error('tahun')
                                    <div class="mt-1 text-danger">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
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
                            {{--<div class="form-group">
                                <label for="status">Status</label>
                                <select required class="form-control" name="status" id="status">
                                    <option disabled selected>==== Pilih status ====</option>
                                    <option value="Tersedia">Tersedia</option>
                                    <option value="Tidak Tersedia">Tidak tersedia</option>
                                </select>
                            </div>--}}
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select required class="form-control" name="kategori" id="kategori">
                                    <option disabled selected>==== Pilih kategori ====</option>
                                    <option value="Peternakan">Peternakan</option>
                                    <option value="Bisnis & ekonomi">Bisnis & ekonomi</option>
                                    <option value="Komunikasi">Komunikasi</option>
                                    <option value="Ekowisata">Ekowisata</option>
                                    <option value="Tanaman">Tanaman</option>
                                    <option value="Komputer & teknologi">Komputer & teknologi</option>
                                    <option value="Perikanan">Perikanan</option>
                                    <option value="Veteriner">Veteriner</option>
                                    <option value="Masakan">Gizi & Pangan</option>
                                    <option value="Industri">Industri</option>
                                    <option value="Kimia">Kimia</option>
                                    <option value="Lingkungan">Lingkungan</option>
                                    <option value="Masakan">Masakan</option>
                                    <option value="Akuntansi">Akuntansi</option>
                                    <option value="Perkebunan">Perkebunan</option>
                                    <option value="Masyarakat">Masyarakat</option>
                                    <option value="Tugas akhir">Tugas akhir</option>
                                </select>
                                 @error('kategori')
                                    <div class="mt-1 text-danger">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="gambar">Upload gambar untuk cover buku</label>
                                <div class="row">
                                    <div class="col-2">
                                        <img style="cursor: pointer" src="{{ asset('images/upload.png') }}"
                                            class="img-fluid">
                                        <input required type="file" style="cursor: pointer" name="gambar"
                                            class="form-control-file" id="gambar" accept="image/png, image/jpg, image/jpeg">
                                        @error('gambar')
                                            <div class="mt-1 text-danger">
                                                <small>{{ $message }}</small>
                                            </div>
                                        @enderror
                                    </div>
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
