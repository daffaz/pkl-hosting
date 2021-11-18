@extends('admin.layouts.master')
@section('title', 'Admin - Update user')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">Update user <u>{{ $user->name }}</u></div>
                    <div class="card-body">
                        <form action="/administrator/user/{{ $user->id }}/edit" method="post">
                            @method('patch')
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input required type="text" value="{{ $user->name }}" name="name" id="name"
                                    class="form-control">
                                @error('nama')
                                    <div class="mt-1 text-danger">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nim">NIM</label>
                                <textarea class="form-control" name="nim" id="nim">{{ $user->nim }}</textarea>
                                @error('nim')
                                    <div class="mt-1 text-danger">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <select required class="form-control" name="title" id="title">
                                    <option disabled>==== Pilih title ====</option>
                                    <option {{ $user->civitas->nama == 'Admin' ? 'selected' : '' }} value="Admin">Admin
                                    </option>
                                    <option {{ $user->civitas->nama == 'Dosen' ? 'selected' : '' }} value="Dosen">Dosen
                                    </option>
                                    <option {{ $user->civitas->nama == 'Mahasiswa Akhir' ? 'selected' : '' }}
                                        value="Mahasiswa Akhir">
                                        Mahasiswa Akhir
                                    </option>
                                    <option {{ $user->civitas->nama == 'Mahasiswa' ? 'selected' : '' }} value="Mahasiswa">
                                        Mahasiswa
                                    </option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
