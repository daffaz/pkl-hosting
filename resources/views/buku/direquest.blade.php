@extends('layouts.master')
@section('title', 'Direquest | Perpustakaan Digital | Maca')

@section('content')
    <!--Tombol back to top-->
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-caret-up"></i></button>
    <!--Akhir tombol back to top-->
    
    <div class="container mt-5 mb-5">

        {{-- Item 1 --}}
        <div class="mt-5">
            <div class="text-center montserrat mt-5">
                <h1 style="color: #16325C">Buku direquest</h1>
            </div>
            <div class="row mt-5" style="margin-bottom:100px!important;">
                @if (!$direquest->count())
                    <div class="col-12 text-center">
                        <h5 class="my-5">Data buku direquest tidak ditemukan</h5>
                    </div>
                @else
                    @foreach ($direquest as $b)
                        <div class="col-lg-8 col-md-12 col-12 mx-auto">
                            <div class="d-flex bg-white align-items-center justify-content-start shadow my-3 w-100">
                                <img src="{{ asset('uploaded/gambar/' . $b->buku->gambar) }}"  class="gambar-favorit" alt="buku">
                                <div class="pr-lg-5 pr-md-5 d-flex flex-column flex-md-column flex-lg-column flex-fill align-items-lg-start align-items-md-start align-items-center">
                                    <div class="d-flex flex-column p-3" style="color: #16325C">
                                        <div class="home-text-kotak-h5 text-center text-md-left text-lg-left">{{ $b->buku->penulis }}</div>
                                        <div class="home-text-kotak-h4 text-center text-md-left text-lg-left">{{ $b->buku->judul }}</div>
                                    </div>
                                    <a class="mt-lg-4 mt-md-5" href="/kategori-buku/{{ $b->buku->slug }}">
                                        <button class="btn biru-unggulan-button px-lg-4 px-md-4 py-md-2 py-lg-2 ml-lg-3 ml-md-3 text-white align-self-start"
                                            style="margin-bottom: 35px">Selengkapnya
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            {{-- Akhir item 1 --}}

            <div class="row mt-2">
                <div class="col-lg-8 mx-auto">
                    <a href="/home" class="btn rounded-pill shadow px-3 bg-light" style="color: #16325C"><i
                            class="fas fa-arrow-left"></i> Kembali</a>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
<script>
        //Get the button
        var mybutton = document.getElementById("myBtn");
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }
        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }

    </script>

@endsection