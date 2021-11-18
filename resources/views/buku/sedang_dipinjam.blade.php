@extends('layouts.master')
@section('title', 'Buku - Sedang Dipinjam')

@section('content')
   <!--Tombol back to top-->
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-caret-up"></i></button>
    <!--Akhir tombol back to top-->
    
    <div class="container mt-5  mb-5">

        {{-- Carousel --}}
        <div class="row mt-3 w-lg-75 w-md-100 w-sm-100 mx-lg-auto mx-md-auto mx-auto mb-4 h3" style="border-bottom: 1px solid rgb(70, 67, 67, .5)">
            <button class="btn-profil col-6 tablinks text-biru-tua" onclick="openCity(event, 'Dipinjam')" id="defaultOpen">
                Dipinjam
            </button>
            <button class="btn-profil col-6 tablinks text-biru-tua"
                onclick="openCity(event, 'Dikembalikan')">Dikembalikan</button>
        </div>

        {{-- Akhir Carousel --}}

        {{-- List Buku Lihat Semua yang Sedang Dipinjam --}}
        {{-- Item 1 --}}
        <div id="Dipinjam" class="tabcontent" >
            <div class="row mt-5" style="margin-bottom:200px!important;">
                @if (!$bukuPinjam->count())
                    <div class="col-12 text-center">
                        <h5 class="my-5">Data peminjaman tidak ditemukan</h5>
                    </div>
                @else
                    @foreach ($bukuPinjam as $b)
                        @php
                            // $tenggat = date('d', strtotime($b->lastreturn)) - date('d');
                            // die(date('d-m-y', strtotime($b->lastreturn)));
                            // var_dump($tenggat);die();
                            $date1 = new DateTime(date('y-m-d', strtotime($b->lastreturn)));
                            $date2 = new DateTime(date('y-m-d'));
                            $interval = $date1->diff($date2);
                        @endphp
                        <div class="col-lg-8 col-md-12 col-12 mx-auto">
                            <div class="d-flex bg-white align-items-center shadow my-3">
                                <img src="{{ asset('uploaded/gambar/' . $b->buku->gambar) }}" class="gambar-dipinjam" alt="buku">
                                <div class="d-flex flex-column p-3 w-lg-100" style="color: #16325C">
                                    <div class="home-text-kotak-h5 text-center text-md-left text-lg-left">{{ $b->buku->penulis }}</div>
                                    <div class="home-text-kotak-h4 text-center text-md-left text-lg-left">{{ $b->buku->judul }}</div>
                                    {{-- PROGRESS BAR --}}
                                    <div class="mt-3 d-flex align-items-center">
                                        @if ($interval->d > 0)
                                            <div class="progress rounded-pill w-50" style="height: 10px">
                                                <div class="progress-bar bg-danger rounded-pill" role="progressbar"
                                                    style="width: {{ ($interval->d / 7) * 100 }}%" aria-valuenow="100"
                                                    aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                            </div>
                                            <div class="ml-3">
                                                {{ $interval->d }} / 7 hari
                                            </div>
                                        @else
                                            <div class="ml-3 text-danger border border-danger py-1 px-3 rounded">
                                                Anda sudah mencapai batas waktu peminjaman, silahkan kembalikan buku
                                            </div>
                                        @endif
                                    </div>
                                     <a href="/kategori-buku/{{ $b->buku->slug }}" class="mx-auto mx-md-0 mx-lg-0 ml-md-0 ml-lg-0">
                                        <button class="btn biru-unggulan-button px-4 py-2 text-white align-self-end"
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
                <div class="col-lg-8 col-md-12 col-12 mx-lg-auto">
                    <a href="/home" class="btn rounded-pill shadow px-3 bg-light" style="color: #16325C"><i
                            class="fas fa-arrow-left"></i> Kembali</a>
                </div>
            </div>
        </div>
        {{-- Akhir List --}}
        <div id="Dikembalikan" class="tabcontent" >
            {{-- Item --}}
            <div class="row mt-5" style="margin-bottom:200px!important;">
                @if (!$bukuKembali->count())
                    <div class="col-12 text-center">
                        <h5 class="my-5">Data peminjaman tidak ditemukan</h5>
                    </div>
                @else
                    @foreach ($bukuKembali as $b)
                        @php
                            // $tenggat = date('d', strtotime($b->lastreturn)) - date('d');
                            // die(date('d-m-y', strtotime($b->lastreturn)));
                            // var_dump($tenggat);die();
                            $date1 = new DateTime(date('y-m-d', strtotime($b->lastreturn)));
                            $date2 = new DateTime(date('y-m-d'));
                            $interval = $date1->diff($date2);
                        @endphp
                        <div class="col-lg-8 col-md-12 col-12 mx-auto">
                            <div class="d-flex bg-white align-items-center shadow my-3">
                                <img src="{{ asset('uploaded/gambar/' . $b->buku->gambar) }}" class="gambar-dipinjam" alt="buku">
                                <div class="d-flex flex-column p-3 w-lg-100" style="color:#16325C;">
                                    <div class="home-text-kotak-h5 text-center text-md-left text-lg-left">{{ $b->buku->penulis }}</div>
                                    <div class="home-text-kotak-h4 text-center text-md-left text-lg-left">{{ $b->buku->judul }}</div>
                                     <a href="/kategori-buku/{{ $b->buku->slug }}" class="mx-auto mx-md-0 mx-lg-0 ml-md-0 ml-lg-0">
                                        <button class="btn biru-unggulan-button px-4 py-2 text-white align-self-end"
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
                <div class="col-lg-8 col-md-12 col-12 mx-lg-auto">
                        <a href="/home" class="btn rounded-pill shadow px-3 bg-light" style="color: #16325C"><i
                                class="fas fa-arrow-left"></i> Kembali</a>
                    </div>
                </div>
            </div>
            {{-- Akhir List Vuku --}}
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
    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" garis-bawah", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " garis-bawah";
            // evt.currentTarget.className += " btn-profil-underline";
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();

    </script>
@endsection
