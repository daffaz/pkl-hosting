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
                                    <option {{ $buku->kategori == 'Pertanian' ? 'selected' : '' }} value="Pertanian">
                                        Pertanian</option>
                                    <option {{ $buku->kategori == 'Seni & desain' ? 'selected' : '' }}
                                        value="Seni & desain">Seni & desain</option>
                                    <option {{ $buku->kategori == 'Bisnis & ekonomi' ? 'selected' : '' }}
                                        value="Bisnis & ekonomi">Bisnis & ekonomi</option>
                                    <option {{ $buku->kategori == 'Anak-anak' ? 'selected' : '' }} value="Anak-anak">
                                        Anak-anak</option>
                                    <option {{ $buku->kategori == 'Novel' ? 'selected' : '' }} value="Novel">Novel
                                    </option>
                                    <option {{ $buku->kategori == 'Komik' ? 'selected' : '' }} value="Komik">Komik
                                    </option>
                                    <option {{ $buku->kategori == 'Komputer & teknologi' ? 'selected' : '' }}
                                        value="Komputer & teknologi">Komputer & teknologi</option>
                                    <option {{ $buku->kategori == 'Pendidikan' ? 'selected' : '' }} value="Pendidikan">
                                        Pendidikan</option>
                                    <option {{ $buku->kategori == 'Fiksi & sastra' ? 'selected' : '' }}
                                        value="Fiksi & sastra">Fiksi & sastra</option>
                                    <option {{ $buku->kategori == 'Finansial' ? 'selected' : '' }} value="Finansial">
                                        Finansial</option>
                                    <option {{ $buku->kategori == 'Sejarah' ? 'selected' : '' }} value="Sejarah">Sejarah
                                    </option>
                                    <option {{ $buku->kategori == 'Agama' ? 'selected' : '' }} value="Agama">Agama
                                    </option>
                                    <option {{ $buku->kategori == 'Romance' ? 'selected' : '' }} value="Romance">Romance
                                    </option>
                                    <option {{ $buku->kategori == 'Sains' ? 'selected' : '' }} value="Sains">Sains
                                    </option>
                                    <option {{ $buku->kategori == 'Masakan' ? 'selected' : '' }} value="Masakan">Masakan
                                    </option>
                                    <option {{ $buku->kategori == 'Pendidikan' ? 'selected' : '' }} value="Pendidikan">
                                        Pendidikan</option>
                                    <option {{ $buku->kategori == 'Self improvemet' ? 'selected' : '' }}
                                        value="Self improvemet">Self improvemet</option>
                                    <option {{ $buku->kategori == 'Tugas akhir' ? 'selected' : '' }} value="Tugas akhir">
                                        Tugas akhir</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="gambar">Upload gambar untuk cover buku</label>
                                <div class="row">
                                    <div class="col-2">
                                        <img style="cursor: pointer" src="{{ asset('images/upload.png') }}"
                                            class="img-fluid">
                                        <input required type="file" value="{{ old('gambar') ?? $buku->gambar }}"
                                            style="cursor: pointer" name="gambar" class="form-control-file" id="gambar">
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
