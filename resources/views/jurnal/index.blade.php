@extends('layouts.master')

@section('title', 'List buku')

@section('content')
    <div class="container">
        <div>
            <a href="/buku/create" class="btn btn-primary">Tambah buku</a>
        </div>
        @if ($buku->count())
            <div class="d-flex bukus flex-wrap align-items-center">
                @foreach ($buku as $b)
                    <div class="buku-list">
                        {{-- <img src="{{ asset('uploaded/' . $b->gambar) }}" class="img-fluid" width="400" height="400" alt=""> --}}
                        <img src="{{ $b->gambar }}" alt="">
                        <div class="d-flex justify-content-between">
                            <a href="/buku/{{ $b->slug }}" class="btn btn-warning">Detail</a>
                            <a href="" class="btn btn-primary">Pinjam</a>
                        </div>
                        {{-- <div>Published on {{ $b->created_at->format('d F, Y') }}</div> --}}
                        <div>Diposting {{ $b->created_at->diffForHumans() }}</div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center">
                {{ $buku->links() }}
            </div>
        @else
            <div class="my-4 alert alert-danger">Tidak ada buku</div>
        @endif
    </div>
@endsection
