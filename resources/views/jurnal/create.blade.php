@extends('layouts.master')
@section('title', 'Tambah buku baru')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">Tambah buku</div>
                    <div class="card-body">
                        <form action="/buku/store" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" name="judul" id="judul" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" id="deskripsi"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input type="number" class="form-control" name="quantity" id="quantity">
                            </div>
                            <div class="form-group">
                                <label for="penerbit">Penerbit</label>
                                <input type="text" class="form-control" name="penerbit" id="penerbit">
                            </div>
                            <div class="form-group">
                                <label for="tahun">tahun</label>
                                <input type="text" class="form-control" name="tahun" id="tahun">
                            </div>
                            <div class="form-group">
                                <label for="penulis">Penulis</label>
                                <input type="text" class="form-control" name="penulis" id="penulis">
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" name="status" id="status">
                                    <option value="Dipinjam">Dipinjam</option>
                                    <option value="Tersedia">Tersedia</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select class="form-control" name="kategori" id="kategori">
                                    <option value="Pertanian">Pertanian</option>
                                    <option value="Anak-anak">Anak-anak</option>
                                    <option value="Novel">Novel</option>
                                    <option value="Masakan">Masakan</option>
                                    <option value="Pendidikan">Pendidikan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="file">Gambar</label>
                                <input type="file" name="gambar" class="form-control-file" name="file" id="file">
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
