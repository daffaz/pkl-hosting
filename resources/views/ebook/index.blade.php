@extends('layouts.master')

@section('title', 'List buku')

@section('content')
    <div class="container">
        <div class="d-flex bukus flex-wrap align-items-center">
            @foreach ($buku as $b)
                <div class="buku-list">
                    <img src="{{ $b->gambar }}" alt="">
                    <div class="d-flexs justify-content-between">
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
    </div>
@endsection
