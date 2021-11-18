@extends('admin.layouts.master')
@section('title', 'Admin - update buku')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">Update buku <u>{{ $buku->judul }}</u></div>
                    <div class="card-body">
                        <form action="/administrator/buku/{{ $buku->slug }}/edit" method="post"
                            enctype="multipart/form-data">
                            @method('patch')
                            @csrf
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input required type="text" value="{{ old('judul') ?? $buku->judul }}" name="judul"
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
                                    id="deskripsi">{{ old('deskripsi') ?? $buku->deskripsi }}</textarea>
                                @error('deskripsi')
                                    <div class="mt-1 text-danger">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input required type="number" value="{{ old('quantity') ?? $buku->quantity }}" min="0"
                                    class="form-control" name="quantity" id="quantity">
                                @error('quantity')
                                    <div class="mt-1 text-danger">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="penerbit">Penerbit</label>
                                <input required type="text" value="{{ old('penerbit') ?? $buku->penerbit }}"
                                    class="form-control" name="penerbit" id="penerbit">
                                @error('penerbit')
                                    <div class="mt-1 text-danger">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="issn">ISSN</label>
                                <input type="text" value="{{ $buku->issn }}" class="form-control" name="issn" id="issn">
                            </div>
                            <div class="form-group">
                                <label for="bahasa">Bahasa</label>
                                <input type="text" value="{{ $buku->bahasa }}" class="form-control" name="bahasa"
                                    id="bahasa">
                            </div>
                            <div class="form-group">
                                <label for="tempat_terbit">Tempat terbit</label>
                                <input type="text" class="form-control" value="{{ $buku->tempat_terbit }}"
                                    name="tempat_terbit" id="tempat_terbit">
                            </div>
                            <div class="form-group">
                                <label for="volume">Volume</label>
                                <input type="text" class="form-control" value="{{ $buku->volume }}" name="volume"
                                    id="volume">
                            </div>
                            <div class="form-group">
                                <label for="edisi">Edisi</label>
                                <input type="text" class="form-control" value="{{ $buku->edisi }}" name="edisi"
                                    id="edisi">
                            </div>
                            <div class="form-group">
                                <label for="tahun">Tahun</label>
                                <input required type="text" value="{{ old('tahun') ?? $buku->tahun }}"
                                    class="form-control" name="tahun" id="tahun">
                                @error('tahun')
                                    <div class="mt-1 text-danger">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="penulis">Penulis</label>
                                <input required type="text" value="{{ old('penulis') ?? $buku->penulis }}"
                                    class="form-control" name="penulis" id="penulis">
                                @error('penulis')
                                    <div class="mt-1 text-danger">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select required class="form-control" name="status" id="status">
                                    <option disabled>==== Pilih status ====</option>
                                    <option {{ $buku->status == 'Dipinjam' ? 'selected' : '' }} value="Dipinjam">Dipinjam
                                    </option>
                                    <option {{ $buku->status == 'Tersedia' ? 'selected' : '' }} value="Tersedia">Tersedia
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select required class="form-control" name="kategori" id="kategori">
                                    <option disabled selected>==== Pilih kategori ====</option>
                                    <option {{ $buku->kategori == 'Peternakan' ? 'selected' : '' }} value="Peternakan">Peternakan</option>
                                    <option {{ $buku->kategori == 'Bisnis & ekonomi' ? 'selected' : '' }} value="Bisnis & ekonomi">Bisnis & ekonomi</option>
                                    <option {{ $buku->kategori == 'Komunikasi' ? 'selected' : '' }} value="Komunikasi">Komunikasi</option>
                                    <option {{ $buku->kategori == 'Ekowisata' ? 'selected' : '' }} value="Ekowisata">Ekowisata</option>
                                    <option {{ $buku->kategori == 'Tanaman' ? 'selected' : '' }} value="Tanaman">Tanaman</option>
                                    <option {{ $buku->kategori == 'Komputer & teknologi' ? 'selected' : '' }} value="Komputer & teknologi">Komputer & teknologi</option>
                                    <option {{ $buku->kategori == 'Perikanan' ? 'selected' : '' }} value="Perikanan">Perikanan</option>
                                    <option {{ $buku->kategori == 'Veteriner' ? 'selected' : '' }} value="Veteriner">Veteriner</option>
                                    <option {{ $buku->kategori == 'Masakan' ? 'selected' : '' }} value="Masakan">Gizi & Pangan</option>
                                    <option {{ $buku->kategori == 'Industri' ? 'selected' : '' }} value="Industri">Industri</option>
                                    <option {{ $buku->kategori == 'Kimia' ? 'selected' : '' }} value="Kimia">Kimia</option>
                                    <option {{ $buku->kategori == 'Lingkungan' ? 'selected' : '' }} value="Lingkungan">Lingkungan</option>
                                    <option {{ $buku->kategori == 'Akuntansi' ? 'selected' : '' }} value="Akuntansi">Akuntansi</option>
                                    <option {{ $buku->kategori == 'Perkebunan' ? 'selected' : '' }} value="Perkebunan">Perkebunan</option>
                                    <option {{ $buku->kategori == 'Masyarakat' ? 'selected' : '' }} value="Masyarakat">Masyarakat</option>
                                    <option {{ $buku->kategori == 'Tugas akhir' ? 'selected' : '' }} value="Tugas akhir">Tugas akhir</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="gambar">Upload gambar untuk cover buku</label>
                                <div class="row">
                                    <div class="col-2">
                                        <img style="cursor: pointer" src="{{ asset('images/upload.png') }}"
                                            class="img-fluid">
                                        <input type="file" style="cursor: pointer" name="gambar" class="form-control-file" id="gambar">
                                            <small>{{$buku->gambar}}</small>
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
