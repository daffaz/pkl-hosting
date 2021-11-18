@extends('admin.layouts.master')
@section('title', 'Admin - update ebook')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">Update ebook <u>{{ $ebook->judul }}</u></div>
                    <div class="card-body">
                        <form action="/administrator/ebook/{{ $ebook->slug }}/edit" method="post"
                            enctype="multipart/form-data">
                            @method('patch')
                            @csrf
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input required type="text" value="{{ old('judul') ?? $ebook->judul }}" name="judul"
                                    id="judul" class="form-control">
                                @error('judul')
                                    <div class="mt-1 text-danger">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi"
                                    id="deskripsi">{{ old('deskripsi') ?? $ebook->deskripsi }}</textarea>
                                @error('deskripsi')
                                    <div class="mt-1 text-danger">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="penerbit">Penerbit</label>
                                <input required type="text" value="{{ old('penerbit') ?? $ebook->penerbit }}"
                                    class="form-control" name="penerbit" id="penerbit">
                                @error('penerbit')
                                    <div class="mt-1 text-danger">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="issn">ISSN</label>
                                <input type="text" value="{{ $ebook->issn }}" class="form-control" name="issn" id="issn">
                            </div>
                            <div class="form-group">
                                <label for="bahasa">Bahasa</label>
                                <input type="text" value="{{ $ebook->bahasa }}" class="form-control" name="bahasa"
                                    id="bahasa">
                            </div>
                            <div class="form-group">
                                <label for="tempat_terbit">Tempat terbit</label>
                                <input type="text" class="form-control" value="{{ $ebook->tempat_terbit }}"
                                    name="tempat_terbit" id="tempat_terbit">
                            </div>
                            <div class="form-group">
                                <label for="volume">Volume</label>
                                <input type="text" class="form-control" value="{{ $ebook->volume }}" name="volume"
                                    id="volume">
                            </div>
                            <div class="form-group">
                                <label for="edisi">Edisi</label>
                                <input type="text" class="form-control" value="{{ $ebook->edisi }}" name="edisi"
                                    id="edisi">
                            </div>
                            <div class="form-group">
                                <label for="tahun">Tahun</label>
                                <input required type="text" value="{{ old('tahun') ?? $ebook->tahun }}"
                                    class="form-control" name="tahun" id="tahun">
                                @error('tahun')
                                    <div class="mt-1 text-danger">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="penulis">Penulis</label>
                                <input required type="text" value="{{ old('penulis') ?? $ebook->penulis }}"
                                    class="form-control" name="penulis" id="penulis">
                                @error('penulis')
                                    <div class="mt-1 text-danger">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select required class="form-control" name="kategori" id="kategori">
                                    <option disabled selected>==== Pilih kategori ====</option>
                                    <option {{ $ebook->kategori == 'Peternakan' ? 'selected' : '' }} value="Peternakan">Peternakan</option>
                                    <option {{ $ebook->kategori == 'Bisnis & ekonomi' ? 'selected' : '' }} value="Bisnis & ekonomi">Bisnis & ekonomi</option>
                                    <option {{ $ebook->kategori == 'Komunikasi' ? 'selected' : '' }} value="Komunikasi">Komunikasi</option>
                                    <option {{ $ebook->kategori == 'Ekowisata' ? 'selected' : '' }} value="Ekowisata">Ekowisata</option>
                                    <option {{ $ebook->kategori == 'Tanaman' ? 'selected' : '' }} value="Tanaman">Tanaman</option>
                                    <option {{ $ebook->kategori == 'Komputer & teknologi' ? 'selected' : '' }} value="Komputer & teknologi">Komputer & teknologi</option>
                                    <option {{ $ebook->kategori == 'Perikanan' ? 'selected' : '' }} value="Perikanan">Perikanan</option>
                                    <option {{ $ebook->kategori == 'Veteriner' ? 'selected' : '' }} value="Veteriner">Veteriner</option>
                                    <option {{ $ebook->kategori == 'Masakan' ? 'selected' : '' }} value="Masakan">Gizi & Pangan</option>
                                    <option {{ $ebook->kategori == 'Industri' ? 'selected' : '' }} value="Industri">Industri</option>
                                    <option {{ $ebook->kategori == 'Kimia' ? 'selected' : '' }} value="Kimia">Kimia</option>
                                    <option {{ $ebook->kategori == 'Lingkungan' ? 'selected' : '' }} value="Lingkungan">Lingkungan</option>
                                    <option {{ $ebook->kategori == 'Akuntansi' ? 'selected' : '' }} value="Akuntansi">Akuntansi</option>
                                    <option {{ $ebook->kategori == 'Perkebunan' ? 'selected' : '' }} value="Perkebunan">Perkebunan</option>
                                    <option {{ $ebook->kategori == 'Masyarakat' ? 'selected' : '' }} value="Masyarakat">Masyarakat</option>
                                    <option {{ $ebook->kategori == 'Tugas akhir' ? 'selected' : '' }} value="Tugas akhir">Tugas akhir</option>
                                    <option {{ $ebook->kategori == 'Jurnal' ? 'selected' : '' }} value="Jurnal">
                                        Jurnal</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="file">Upload PDF ebook</label>
                                        <img style="cursor: pointer" src="{{ asset('images/pdf.png') }}"
                                            class="img-fluid">
                                        <input type="file" value="" style="cursor: pointer"
                                            name="pdf" class="form-control-file" name="pdf" id="pdf">
                                            <small id="thepdf">{{$ebook->pdf}}</small>
                                        @error('pdf')
                                            <div class="mt-1 text-danger">
                                                <small>{{ $message }}</small>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="gambar">Upload gambar untuk cover ebook</label>
                                        <img style="cursor: pointer" src="{{ asset('images/upload.png') }}"
                                            class="img-fluid">
                                        <input type="file" value="" style="cursor: pointer"
                                            name="gambar" class="form-control-file" id="gambar">
                                            <small>{{$ebook->gambar}}</small>
                                        @error('gambar')
                                            <div class="mt-1 text-danger">
                                                <small>{{ $message }}</small>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
