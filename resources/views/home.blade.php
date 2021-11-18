@extends('layouts.master')
@section('title', 'Beranda | Perpustakaan Digital | Maca')
@section('content')
<!--Tombol back to top-->
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-caret-up"></i></button>
<!--Akhir tombol back to top-->
    
    <div class="container mb-5">
        <div class="row mt-4">
            <div class="col-lg-8 col-12 col-md-12">
                <div class="bg-white d-flex flex-column flex-md-row flex-lg-row  p-4 montserrat shadow rounded">
                    <div
                        class="d-flex flex-column flex-sm-column flex-md-row flex-lg-row align-items-md-center align-items-lg-center pb-3 pb-md-0 pb-lg-0 pr-0 pr-md-3 pr-lg-5 home-border-right home-border-bottom">
                        <div class="w-60 avatar mx-auto mx-md-0 mx-lg-0 mb-2 mb-md-0 mb-lg-0 mr-md-3 gd-warning"
                            style="font-size: 1rem">
                            <?php
                            $arr = explode(' ', Auth::user()->name);
                            echo count($arr) > 1 ? strtoupper($arr[0][0] . $arr[1][0]) : strtoupper($arr[0][0] .
                            $arr[0][1]);
                            ?>
                        </div>
                        <div class="d-lg-flex flex-lg-column ml-lg-3 ">
                            <div class="text-center text-sm-center text-md-left text-lg-left biru-text-home"
                                style="font-size: 16px">{{ count($arr) > 1 ? $arr[0]." ".$arr[1] : Auth::user()->name }}</div>
                            <div class="text-center text-sm-center text-md-left text-lg-left biru-text-home"
                                style="font-size: 16px">{{ Auth::user()->nim }}</div>
                        </div>
                    </div>
                    <div
                        class="d-flex flex-column text-center pb-3 pb-md-0 pb-lg-0 pr-5 mt-3 mt-sm-3 mt-md-0 mt-lg-0 home-border-right home-border-bottom biru-text-home">
                        <div class="h3 font-weight-bold ml-5">{{ $dikembalikan->count() }}</div>
                        <div class="w-100 ml-4">Buku dikembalikan</div>
                    </div>
                    {{-- <div
                        class="d-flex flex-column text-center pb-3 pb-md-0 pb-lg-0 pr-5 mt-3 mt-sm-3 mt-md-0 mt-lg-0 home-border-right home-border-bottom biru-text-home">
                        <div class="h3 font-weight-bold ml-5">200</div>
                        <div class="ml-5">E-Book dibaca</div>
                    </div> --}}
                    <div class="d-flex flex-column text-center ml-5 pr-5 mt-3 mt-sm-3 mt-md-0 mt-lg-0 biru-text-home">
                        <div class="h3 font-weight-bold">{{ $dipinjam }}</div>
                        <div>Buku dipinjam</div>
                    </div>
                </div>
                <div>
                    {{-- Sedang Dipinjam --}}
                    <div class="d-flex mt-5 justify-content-between">
                        <div class="paragraph-size" style="color: #16325C">
                            <i class="font-italic fas fa-book mr-3 home-text-size"></i> Buku yang sedang dipinjam
                        </div>
                        <div class="paragraph-size" style="color: #16325C">
                            {{-- <a href="buku/sedang-dipinjam" class="biru-unggulan-text">Lihat semua <i class="pl-2 fas fa-arrow-right"></i></a> --}}
                            <a href="sedang-dipinjam" class="biru-text-home mt-1 small">Lihat Semua<i
                                    class="ml-1 fas fa-arrow-right small"></i></a>
                        </div>
                    </div>
                    @if ($peminjaman)
                        {{-- {{ dd(gettype($peminjaman->buku->gambar)) }} --}}
                        {{-- {{ dd(file_exists(public_path() . '/uploaded/gambar/' . $peminjaman->buku->gambar)) }} --}}
                        <div
                            class="d-flex bg-white align-items-start align-items-md-center align-items-lg-center flex-row flex-md-row flex-lg-row shadow my-3">
                            <img src="{{ asset('uploaded/gambar/' . $peminjaman->buku->gambar) }}"
                                class="border gambar-buku-home-atas" alt="buku">
                            

                            <div class="d-flex flex-column my-auto w-100 p-3" style="color: #16325C">
                                <div class="home-text-kotak-h5 text-left text-md-left text-lg-left ">
                                    {{ $peminjaman->buku->penulis }}</div>
                                <div class="home-text-kotak-h4 text-left text-md-left text-lg-left" >
                                    {{ $peminjaman->buku->judul }} </div>
                                {{-- PROGRESS BAR --}}
                                @php
                                    $date1 = new DateTime(date('y-m-d', strtotime($peminjaman->lastreturn)));
                                    $date2 = new DateTime(date('y-m-d'));
                                    $interval = $date1->diff($date2);
                                    // dd($interval->d);
                                    // if (date('d-M', strtotime($peminjaman->lastreturn)) < date('d-M')) {
                                    //     $tenggat = date('j') - date('d', strtotime($peminjaman->lastreturn));
                                    // } else {
                                    //     $tenggat = date('d', strtotime($peminjaman->lastreturn)) - date('j');
                                    // }
                                @endphp
                                <div
                                    class="d-lg-flex justify-content-lg-between  d-md-flex justify-content-md-between mt-3 mt-lg-4">
                                    @if ($interval->d > 0)
                                        <div class="d-flex align-items-home flex-column flex-md-row flex-lg-row w-100">
                                            <div class="progress rounded-pill w-50" style="height: 10px">
                                                <div class="progress-bar rounded-pill" role="progressbar"
                                                    style="width: {{ ($interval->d / 7) * 100 }}%;background-color: #c24747"
                                                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                            </div>
                                            <div class="ml-lg-3 ml-md-3 ml-0 mt-1 mt-md-0 mt-lg-0 progress-text">
                                                {{ $interval->d }} / 7 hari
                                            </div>
                                        </div>
                                    @else
                                        <div
                                            class="ml-lg-3 ml-md-3 ml-0 mt-1 mt-md-0 mt-lg-0 text-danger border border-danger py-1 px-3 rounded">
                                            Anda sudah mencapai batas waktu peminjaman, silahkan kembalikan buku
                                        </div>
                                    @endif
                                    {{-- <button
                                        class="btn biru-unggulan-button ml-home px-home mt-2 mt-lg-0 py-2 my-auto mb-home mr-0 mr-lg-4 text-white align-self-lg-end align-self-md-end align-self-center">Lanjutkan</button> --}}
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="mt-3">
                            Data peminjaman tidak ditemukan
                        </div>
                    @endif
                </div>
                <div class="d-flex mt-5 justify-content-between">
                    <div class="paragraph-size" style="color: #16325C">
                        <i class="font-italic fas fa-book mr-3 home-text-size"></i> Buku yang sudah dikembalikan
                    </div>
                    <div class="paragraph-size" style="color: #16325C">
                        {{-- <a href="buku/sedang-dipinjam" class="biru-text-home"> Lihat semua <i class="pl-2 fas fa-arrow-right"></i></a> --}}
                        <a href="sedang-dipinjam" class="biru-text-home mt-1 small">Lihat Semua<i
                                class="ml-1 fas fa-arrow-right small"></i></a>
                    </div>
                </div>
                <div class="row mt-n3">
                    @if (!$dikembalikan->count())
                        <div class="col mt-5">
                            Data buku tidak ditemukan
                        </div>
                    @else
                        <!-- Awal Item Buku 1 -->
                        @foreach ($dikembalikan as $b)
                            <div class="col-6 col-sm-6 col-md-4 col-lg-3 mt-5">
                                <div class="d-flex flex-column home-card-size-buku">
                                    <!-- Card-->
                                    <a href="/kategori-buku/{{ $b->buku->slug }}" style="text-decoration: none;">
                                        <div class="card rounded shadow-sm border-0">
                                            <img src="{{ asset('uploaded/gambar/' . $b->buku->gambar) }}" alt=""
                                                class="card-img-top img-fluid d-block gambar-buku-home-bawah">

                                            <div class="card-body">
                                                <p class="card-text read-more text-muted small"> {{ $b->buku->kategori }}
                                                </p>
                                                <h5 class="card-title read-more mt-n2 text-dark">
                                                    {{ $b->buku->judul }}
                                                </h5>
                                            </div>

                                            <div
                                                class="card-footer read-more small mt-n4  bg-transparent border-0 text-muted">
                                                {{ $b->buku->penulis }}
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                        <!-- Akhir Item Buku 1 -->
                    @endif
                </div>
                {{-- FAVORIT --}}
                <div class="d-flex mt-5 justify-content-between">
                    <div class="paragraph-size" style="color: #16325C">
                        <i class="font-italic fas fa-book mr-3 home-text-size"></i> Ebook favorit
                    </div>
                    <div class="paragraph-size" style="color: #16325C">
                        {{-- <a href="buku/sedang-dipinjam" class="biru-text-home"> Lihat semua <i class="pl-2 fas fa-arrow-right"></i></a> --}}
                        <a href="{{ url('/favorit') }}" class="biru-text-home mt-1 small">Lihat Semua<i
                                class="ml-1 fas fa-arrow-right small"></i></a>
                    </div>
                </div>
                <div class="row mt-n3">
                    @if (!$favorit->count())
                        <div class="col mt-5">
                            Data favorit tidak ditemukan
                        </div>
                    @else
                        <!-- Awal Item Buku 1 -->
                        @foreach ($favorit as $b)
                            <div class="col-6 col-sm-6 col-md-4 col-lg-3 mt-5">
                                <div class="d-flex flex-column home-card-size-buku">
                                    <!-- Card-->
                                    <a href="/kategori-ebook/{{ $b->ebook->slug }}" style="text-decoration: none;">
                                        <div class="card rounded shadow-sm border-0">
                                            <img src="{{ asset('uploaded/gambar/' . $b->ebook->gambar) }}" alt=""
                                                class="card-img-top img-fluid d-block gambar-buku-home-bawah">

                                            <div class="card-body">
                                                <p class="card-text read-more text-muted small">
                                                    {{ $b->ebook->kategori }}
                                                </p>
                                                <h5 class="card-title read-more mt-n2 text-dark">
                                                    {{ $b->ebook->judul }}
                                                </h5>
                                            </div>

                                            <div
                                                class="card-footer read-more small mt-n4  bg-transparent border-0 text-muted">
                                                {{ $b->ebook->penulis }}
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                        <!-- Akhir Item Buku 1 -->
                    @endif
                </div>
            </div>
            {{-- Aside Content --}}
            <div class="col-12 col-lg-4">
                <h4 class="mt-4 mt-lg-0 mb-3 ml-lg-5">Kalendar</h4>
                <div class="ml-lg-5" id="cal-heatmap"></div>
                <div class="ml-lg-5">
                    <h4 class="mb-3">Riwayat Denda</h4>
                    <div class="border bg-light shadow p-3 home-kotak-denda">
                        <div class="denda small" style="font-size: 18px;"><i class="fas fa-money-bill small"></i>
                            Total dendamu:
                            <br>
                            <div class="d-flex">
                                <span class="denda2 small mt-1"
                                    style="font-size: 18px;">Rp{{ number_format($totalDenda * 500), 2, '.', '' }}-</span>
                                <a href="profil/{{ strtolower(Auth::user()->name) }}"
                                    class="btn biru-unggulan-button ml-auto text-white align-self-end">
                                    Lihat Detil
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript" src="https://d3js.org/d3.v3.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/cal-heatmap.min.js') }}">
    </script>
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
    <script type="text/javascript">
        var cal = new CalHeatMap();

        // var dt = new Date(1580576400000);
        cal.init({
            itemSelector: "#cal-heatmap",
            domain: "month",
            subDomain: "x_day",
            cellSize: 40,
            subDomainTextFormat: "%d",
            range: 1,
            cellRadius: 6,
            displayLegend: false,
            highlight: ['now'],
            tooltip: true,
        });

    </script>
@endsection
@section('heatmap-style')
    <link rel="stylesheet" href="{{ asset('css/cal-heatmap.css') }}" />
@endsection
