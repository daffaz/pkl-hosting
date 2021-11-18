@extends('layouts.master')
@section('title', 'Katalog Buku Digital | Perpustakaan Digital | Maca')
@section('style')
    <!--Style internal ini diperlukan agar tidak mempengaruhi page lain-->
    <style>
        body {
            overflow-x: hidden;
        }

        a,
        .link-navbar {
            color: white;
        }

        a:hover {
            color: #00BFFF;
        }

        .dropdown-text-link:hover {
            color: black;
        }

        .pembatas {
            border-bottom: grey 1px solid;
            border-top: grey 1px solid;
        }

        .nav-item-2.active a {
            background-color: #219898;
            color: white;
            transition: ease-in 0.4s all;
        }
        .text-lainnya.active{
            background-color: #219898;
            color: white;
            transition: ease-in 0.4s all;
        }

        .text-lainnya:hover{
            color:#00BFFF;
        }
        .btn-lainnya:hover{
            color:#00BFFF;
        }
                 

    </style>
@endsection
@section('content')

    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-caret-up"></i></button>
    <!-- Awal header katalog buku digital -->
    <header>
        <div class="container-fluid mt-n4 pembatas" style="z-index: 99;background-color: #215D98;" id="navKategori">
            <nav class="navbar navbar-expand-lg navbar-dark p-3" id="navbar_top">
                <div class="container-fluid mobile-list">
                    <div class="collapse navbar-collapse d-flex" id="navbarSupportedContent">
                        <ul class="nav nav-pills myUL justify-content-center">
                            <li class="nav-item nav-item-2 ">
                                <a class="nav-link text-uppercase" href="#Akuntansi">Akuntansi</a>
                            </li>
                            <li class="nav-item nav-item-2 ">
                                <a class="nav-link text-uppercase" href="#bisnis">Bisnis</a>
                            </li>
                            <li class="nav-item nav-item-2 ">
                                <a class="nav-link text-uppercase" href="#Ekowisata">Ekowisata</a>
                            </li>
                            <li class="nav-item nav-item-2 ">
                                <a class="nav-link text-uppercase" href="#Industri">Industri</a>
                            </li>
                            <li class="nav-item nav-item-2 ">
                                <a class="nav-link text-uppercase" href="#jurnal">Jurnal</a>
                            </li>
                            <li class="nav-item nav-item-2 ">
                                <a class="nav-link text-uppercase" href="#Kimia">Kimia</a>
                            </li>
                            <li class="nav-item nav-item-2 ">
                                <a class="nav-link text-uppercase" href="#komputer">Komputer</a>
                            </li>
                            <li class="nav-item nav-item-2 ">
                                <a class="nav-link text-uppercase" href="#Komunikasi">Komunikasi</a>
                            </li>
                            <li class="nav-item">
                                <div class="dropdown" style="margin-top: 2px;">
                                    <button class="btn link-navbar btn-transparent dropdown-toggle  border-0 text-uppercase btn-lainnya"
                                        type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Lainnya
                                    </button>
                                    <div class="dropdown-menu dropdown-multicol " aria-labelledby="dropdownMenuButton">
                                        <div class="dropdown-row mx-auto">
                                            <a class="dropdown-item text-center text-uppercase text-lainnya bg-transparent"
                                                href="#Lingkungan">Lingkungan
                                            </a>
                                             <a class="dropdown-item text-center text-uppercase text-lainnya bg-transparent"
                                                href="#Masakan">Gizi & Pangan
                                            </a>
                                            <a class="dropdown-item text-center text-uppercase text-lainnya bg-transparent"
                                                href="#Masyarakat">Masyarakat
                                            </a>
                                            <a class="dropdown-item text-center text-uppercase text-lainnya bg-transparent"
                                                href="#Perkebunan">Perkebunan
                                            </a>
                                               <a class="dropdown-item text-center text-uppercase text-lainnya bg-transparent"
                                                href="#Perikanan">Perikanan
                                            </a>
                                             
                                            <a class="dropdown-item text-center text-uppercase text-lainnya bg-transparent"
                                                href="#Peternakan">Peternakan
                                            </a>
                                              <a class="dropdown-item dropdown-text-link text-uppercase text-center text-lainnya bg-transparent"
                                                href="#Tanaman">Tanaman
                                            </a>
                                              <a class="dropdown-item text-center text-uppercase text-lainnya bg-transparent"
                                                href="#tugas_akhir">Tugas Akhir
                                            </a>
                                            <a class="dropdown-item text-center text-uppercase text-lainnya bg-transparent"
                                                href="#Veteriner">Veteriner
                                            </a>
                                          
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <form action="/kategori-ebook" method="GET" role="search" class="d-flex">
                                <input class="form-control" type="search" name="search" placeholder="Search"
                                    aria-label="Search">
                                <button class="btn btn-outline-success ml-1" type="submit"><i
                                        class="fa fa-search"></i></button>
                            </form>
                        </ul>

                    </div>

            </nav>
        </div>
    </header>
    <!--Akhir header katalog buku digital-->

    <!-- Awal Container kategori terbaru -->
    <!-- #Terbaru -->
    <div class="container mb-5" id="terbaru">
        <div class="row mx-auto">
            <div class="col">
                <div class="d-flex justify-content-between">
                    <h3> <i class="fas fa-book mr-3" style="font-size:28px"></i>Terbaru</h3>
                </div>
            </div>
        </div>


        <div class="row mx-auto mt-n3">

            @if (!$ebook->count())
                <h5 class="ml-5 mt-5">Data buku tidak ditemukan</h5>
            @else
                <!-- Awal Item terbaru -->
                @foreach ($ebook as $eb)
                    <div class="col-6 col-sm-6 col-md-4 col-lg-2 mt-5">
                        <div class="d-flex flex-column card-size-buku">
                            <!-- Card-->
                            <a href="/kategori-ebook/{{ $eb->slug }}" style="text-decoration: none;">
                                <div class="card rounded shadow-sm border-0">
                                    <img src="{{ asset('uploaded/gambar/' . $eb->gambar) }}"
                                        alt="" class="card-img-top img-fluid d-block gambar-ukuran-landing">
                                    {{-- <img src="{{ asset('images/thumbnail-1.jpg') }}" alt=""
                                        class="card-img-top img-fluid d-block gambar-ukuran-landing"> --}}

                                    <div class="card-body">
                                        <p class="card-text text-muted small read-more"> {{ $eb->kategori }} </p>
                                        <h5 class="card-title read-more mt-n2 text-dark">
                                            {{ $eb->judul }}</h5>
                                    </div>

                                    <div class="card-footer read-more small mt-n4  bg-transparent border-0 text-muted">
                                        {{ $eb->penulis }}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
            <!-- Akhir Item terbaru -->
        </div>
    </div>


    <!-- Akhir Container kategori terbaru -->
    
       <!--Awal container kategori buku Akuntansi-->
    <!-- #Akuntansi-->

    <div class="container mt-5 mb-5" id="Akuntansi">
        <div class="row mx-auto">
            <div class="col">
                <div class="d-flex justify-content-between">
                    <h3> <i class="fas fa-book mr-3" style="font-size:28px"></i>Akuntansi</h3>
                </div>
            </div>
        </div>


        <div class="row mx-auto mt-n3">

            @if (!$dataAkuntansi->count())
                <h5 class="ml-5 mt-5">Data buku tidak ditemukan</h5>
            @else
                <!-- Awal Item kategori buku Akuntansi -->
                @foreach ($dataAkuntansi as $b)
                    <div class="col-6 col-sm-6 col-md-4 col-lg-2 mt-5">
                        <div class="d-flex flex-column card-size-buku">
                            <!-- Card-->
                            <a href="/kategori-buku/{{ $b->slug }}" style="text-decoration: none;">
                                <div class="card rounded shadow-sm border-0">
                                    <img src="{{ asset('uploaded/gambar/' . $b->gambar) }}"
                                        class="card-img-top img-fluid d-block gambar-ukuran-landing">

                                    <div class="card-body">
                                        <p class="card-text read-more text-muted small"> {{ $b->kategori }} </p>
                                        <h5 class="card-title read-more mt-n2 text-dark">
                                            {{ $b->judul }}
                                        </h5>
                                    </div>

                                    <div class="card-footer read-more small mt-n4  bg-transparent border-0 text-muted">
                                        {{ $b->penulis }}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
            <!-- Akhir Item kategori buku Akuntansi -->
        </div>

    </div>

    <!-- Akhir Container kategori buku Akuntansi -->
    
    <!-- Awal Container kategori buku bisnis dan ekonomi -->
    <!-- #Bisnis & Ekonomi -->

    <div class="container mt-5 mb-5" id="bisnis">
        <div class="row mx-auto">
            <div class="col">
                <div class="d-flex justify-content-between">
                    <h3> <i class="fas fa-book mr-3" style="font-size:28px"></i>Bisnis & Ekonomi</h3>
                </div>
            </div>
        </div>


        <div class="row mx-auto mt-n3">

            @if (!$dataBisnis->count())
                <h5 class="ml-5 mt-5">Data buku tidak ditemukan</h5>
            @else
                <!-- Awal Item kategori buku bisnis dan ekonomi -->
                @foreach ($dataBisnis as $b)
                    <div class="col-6 col-sm-6 col-md-4 col-lg-2 mt-5">
                        <div class="d-flex flex-column card-size-buku">
                            <!-- Card-->
                            <a href="/kategori-buku/{{ $b->slug }}" style="text-decoration: none;">
                                <div class="card rounded shadow-sm border-0">
                                    <img src="{{ asset('uploaded/gambar/' . $b->gambar) }}"
                                        class="card-img-top img-fluid d-block gambar-ukuran-landing">

                                    <div class="card-body">
                                        <p class="card-text read-more text-muted small"> {{ $b->kategori }} </p>
                                        <h5 class="card-title read-more mt-n2 text-dark">
                                            {{ $b->judul }}
                                        </h5>
                                    </div>

                                    <div class="card-footer read-more small mt-n4  bg-transparent border-0 text-muted">
                                        {{ $b->penulis }}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
            <!-- Akhir Item kategori buku bisnis dan ekonomi -->
        </div>

    </div>
    <!--Akhir container kategori buku bisnis dan ekonomi-->
    
    
    <!-- Awal Container kategori buku ekowisata -->
    <!-- #Ekowisata -->

    <div class="container mt-5 mb-5" id="Ekowisata">
        <div class="row mx-auto">
            <div class="col">
                <div class="d-flex justify-content-between">
                    <h3> <i class="fas fa-book mr-3" style="font-size:28px"></i>Ekowisata</h3>
                </div>
            </div>
        </div>


        <div class="row mx-auto mt-n3">

            @if (!$dataEkowisata->count())
                <h5 class="ml-5 mt-5">Data buku tidak ditemukan</h5>
            @else
                <!-- Awal Item kategori buku ekowisata -->
                @foreach ($dataEkowisata as $b)
                    <div class="col-6 col-sm-6 col-md-4 col-lg-2 mt-5">
                        <div class="d-flex flex-column card-size-buku">
                            <a href="/kategori-buku/{{ $b->slug }}" style="text-decoration: none;">
                                <div class="card rounded shadow-sm border-0">
                                    <img src="{{ asset('uploaded/gambar/' . $b->gambar) }}"
                                        class="card-img-top img-fluid d-block gambar-ukuran-landing">

                                    <div class="card-body">
                                        <p class="card-text read-more text-muted small"> {{ $b->kategori }} </p>
                                        <h5 class="card-title read-more mt-n2 text-dark">
                                            {{ $b->judul }}
                                        </h5>
                                    </div>

                                    <div class="card-footer read-more small mt-n4  bg-transparent border-0 text-muted">
                                        {{ $b->penulis }}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
            <!-- Akhir Item kategori buku ekowisata -->
        </div>

    </div>

    <!-- Akhir Container kategori buku ekowisata -->

    <!-- Awal Container kategori buku Industri -->
    <!-- #Industri -->

    <div class="container mt-5 mb-5" id="Industri">
        <div class="row mx-auto">
            <div class="col">
                <div class="d-flex justify-content-between">
                    <h3> <i class="fas fa-book mr-3" style="font-size:28px"></i>Industri</h3>

                </div>
            </div>
        </div>


        <div class="row mx-auto mt-n3">

            @if (!$dataIndustri->count())
                <h5 class="ml-5 mt-5">Data buku tidak ditemukan</h5>
            @else
                <!-- Awal Item kategori buku Industri -->
                @foreach ($dataIndustri as $b)
                    <div class="col-6 col-sm-6 col-md-4 col-lg-2 mt-5">
                        <div class="d-flex flex-column card-size-buku">
                            <a href="/kategori-buku/{{ $b->slug }}" style="text-decoration: none;">
                                <div class="card rounded shadow-sm border-0">
                                    <img src="{{ asset('uploaded/gambar/' . $b->gambar) }}" alt=""
                                        class="card-img-top img-fluid d-block gambar-ukuran-landing">

                                    <div class="card-body">
                                        <p class="card-text read-more text-muted small"> {{ $b->kategori }} </p>
                                        <h5 class="card-title read-more mt-n2 text-dark">
                                            {{ $b->judul }}
                                        </h5>
                                    </div>

                                    <div class="card-footer read-more small mt-n4  bg-transparent border-0 text-muted">
                                        {{ $b->penulis }}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif

            <!-- Akhir Item kategori buku Industri -->
        </div>

    </div>
    
    <!-- Akhir Container kategori buku Industri -->

     <!-- Awal Container kategori-ebook Katalog E-Journal -->
    <!-- #E-Journal -->

    <div class="container mt-5 mb-5" id="jurnal">
        <div class="row mx-auto">
            <div class="col">
                <div class="d-flex justify-content-between">
                    <h3> <i class="fas fa-book mr-3" style="font-size:28px"></i>Jurnal Digital</h3>
                </div>
            </div>
        </div>


        <div class="row mx-auto mt-n3">

            @if (!$jurnal->count())
                <h5 class="ml-5 mt-5">Data buku tidak ditemukan</h5>
            @else
                <!-- Awal Item e-journal -->
                @foreach ($jurnal as $eb)
                    <div class="col-6 col-sm-6 col-md-4 col-lg-2 mt-5">
                        <div class="d-flex flex-column card-size-buku">
                            <!-- Card-->
                            <a href="/kategori-ebook/{{ $eb->slug }}" style="text-decoration: none;">
                                <div class="card rounded shadow-sm border-0">
                                    <img src="{{ asset('uploaded/gambar/' . $eb->gambar) }}" alt=""
                                        class="card-img-top img-fluid d-block gambar-ukuran-landing">

                                    <div class="card-body">
                                        <p class="card-text text-muted small read-more"> {{ $eb->kategori }} </p>
                                        <h5 class="card-title read-more mt-n2 text-dark">
                                            {{ $eb->judul }}</h5>
                                    </div>

                                    <div class="card-footer read-more small mt-n4  bg-transparent border-0 text-muted">
                                        {{ $eb->penulis }}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
            <!-- Akhir Item e-journal -->
        </div>

    </div>
    <!--Akhir container e-journal -->
    
      <!--Awal container kategori buku Kimia-->
    <!-- #Kimia-->

    <div class="container mt-5 mb-5" id="Kimia">
        <div class="row mx-auto">
            <div class="col">
                <div class="d-flex justify-content-between">
                    <h3> <i class="fas fa-book mr-3" style="font-size:28px"></i>Kimia</h3>
                </div>
            </div>
        </div>


        <div class="row mx-auto mt-n3">

            @if (!$dataKimia->count())
                <h5 class="ml-5 mt-5">Data buku tidak ditemukan</h5>
            @else
                <!-- Awal Item kategori Kimia -->
                @foreach ($dataKimia as $b)
                    <div class="col-6 col-sm-6 col-md-4 col-lg-2 mt-5">
                        <div class="d-flex flex-column card-size-buku">
                            <a href="/kategori-buku/{{ $b->slug }}" style="text-decoration: none;">
                                <div class="card rounded shadow-sm border-0">
                                    <img src="{{ asset('uploaded/gambar/' . $b->gambar) }}"
                                        class="card-img-top img-fluid d-block gambar-ukuran-landing">

                                    <div class="card-body">
                                        <p class="card-text read-more text-muted small"> {{ $b->kategori }} </p>
                                        <h5 class="card-title read-more mt-n2 text-dark">
                                            {{ $b->judul }}
                                        </h5>
                                    </div>

                                    <div class="card-footer read-more small mt-n4  bg-transparent border-0 text-muted">
                                        {{ $b->penulis }}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
            <!-- Akhir Item kategori buku Kimia -->
        </div>

    </div>

    <!-- Akhir Container kategori buku Kimia -->
    
        <!-- Awal Container kategori buku komputer & teknologi -->
    <!-- #Komputer & Teknologi -->

    <div class="container mt-5 mb-5" id="komputer">
        <div class="row mx-auto">
            <div class="col">
                <div class="d-flex justify-content-between">
                    <h3> <i class="fas fa-book mr-3" style="font-size:28px"></i>Komputer & Teknologi</h3>
                </div>
            </div>
        </div>


        <div class="row mx-auto mt-n3">

            @if (!$dataKomputer->count())
                <h5 class="ml-5 mt-5">Data buku tidak ditemukan</h5>
            @else
                <!-- Awal Item kategori buku komputer & teknologi -->
                @foreach ($dataKomputer as $b)
                    <div class="col-6 col-sm-6 col-md-4 col-lg-2 mt-5">
                        <div class="d-flex flex-column card-size-buku">
                            <a href="/kategori-buku/{{ $b->slug }}" style="text-decoration: none;">
                                <div class="card rounded shadow-sm border-0">
                                    <img src="{{ asset('uploaded/gambar/' . $b->gambar) }}"
                                        class="card-img-top img-fluid d-block gambar-ukuran-landing">

                                    <div class="card-body">
                                        <p class="card-text read-more text-muted small"> {{ $b->kategori }} </p>
                                        <h5 class="card-title read-more mt-n2 text-dark">
                                            {{ $b->judul }}
                                        </h5>
                                    </div>

                                    <div class="card-footer read-more small mt-n4  bg-transparent border-0 text-muted">
                                        {{ $b->penulis }}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
            <!-- Akhir Item kategori buku komputer & teknologi -->
        </div>

    </div>

    <!-- Akhir Container kategori buku komputer & teknologi -->
    
    
    <!-- Awal Container kategori buku Katalog Komunikasi -->
    <!-- #Komunikasi -->

    <div class="container mt-5 mb-5" id="Komunikasi">
        <div class="row mx-auto">
            <div class="col">
                <div class="d-flex justify-content-between">
                    <h3> <i class="fas fa-book mr-3" style="font-size:28px"></i>Komunikasi</h3>
                </div>
            </div>
        </div>


        <div class="row mx-auto mt-n3">

            @if (!$dataKomunikasi->count())
                <h5 class="ml-5 mt-5">Data buku tidak ditemukan</h5>
            @else
                <!-- Awal Item kategori buku Komunikasi -->
                @foreach ($dataKomunikasi as $b)
                    <div class="col-6 col-sm-6 col-md-4 col-lg-2 mt-5">
                        <div class="d-flex flex-column card-size-buku">
                            <!-- Card-->
                            <a href="/kategori-buku/{{ $b->slug }}" style="text-decoration: none;">
                                <div class="card rounded shadow-sm border-0">
                                    <img src="{{ asset('uploaded/gambar/' . $b->gambar) }}"
                                        class="card-img-top img-fluid d-block gambar-ukuran-landing">

                                    <div class="card-body">
                                        <p class="card-text read-more text-muted small"> {{ $b->kategori }} </p>
                                        <h5 class="card-title read-more mt-n2 text-dark">
                                            {{ $b->judul }}
                                        </h5>
                                    </div>

                                    <div class="card-footer read-more small mt-n4  bg-transparent border-0 text-muted">
                                        {{ $b->penulis }}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
            <!-- Akhir Item kategori buku Komunikasi -->
        </div>

    </div>
    
    <!-- Akhir Container kategori buku Komunikasi -->

    <!--Awal container kategori buku lingkungan-->
    <!-- #Lingkungan-->

    <div class="container mt-5 mb-5" id="Lingkungan">
        <div class="row mx-auto">
            <div class="col">
                <div class="d-flex justify-content-between">
                    <h3> <i class="fas fa-book mr-3" style="font-size:28px"></i>Lingkungan</h3>
                </div>
            </div>
        </div>


        <div class="row mx-auto mt-n3">

            @if (!$dataLingkungan->count())
                <h5 class="ml-5 mt-5">Data buku tidak ditemukan</h5>
            @else
                <!-- Awal Item kategori buku Lingkungan -->
                @foreach ($dataLingkungan as $b)
                    <div class="col-6 col-sm-6 col-md-4 col-lg-2 mt-5">
                        <div class="d-flex flex-column card-size-buku">
                            <!-- Card-->
                            <a href="/kategori-buku/{{ $b->slug }}" style="text-decoration: none;">
                                <div class="card rounded shadow-sm border-0">
                                    <img src="{{ asset('uploaded/gambar/' . $b->gambar) }}"
                                        class="card-img-top img-fluid d-block gambar-ukuran-landing">

                                    <div class="card-body">
                                        <p class="card-text read-more text-muted small"> {{ $b->kategori }} </p>
                                        <h5 class="card-title read-more mt-n2 text-dark">
                                            {{ $b->judul }}
                                        </h5>
                                    </div>

                                    <div class="card-footer read-more small mt-n4  bg-transparent border-0 text-muted">
                                        {{ $b->penulis }}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
            <!-- Akhir Item kategori buku Lingkungan -->
        </div>

    </div>

    <!-- Akhir Container kategori buku Lingkungan -->
    
   
    <!-- Awal Container kategori buku Gizi & Pangan -->
    <!-- #Gizi & Pangan -->

    <div class="container mt-5 mb-5" id="Masakan">
        <div class="row mx-auto">
            <div class="col">
                <div class="d-flex justify-content-between">
                    <h3> <i class="fas fa-book mr-3" style="font-size:28px"></i>Gizi & Pangan</h3>
                </div>
            </div>
        </div>


        <div class="row mx-auto mt-n3">

            @if (!$dataMasakan->count())
                <h5 class="ml-5 mt-5">Data buku tidak ditemukan</h5>
            @else
                <!-- Awal Item kategori buku Gizi & Pangan -->
                @foreach ($dataMasakan as $b)
                    <div class="col-6 col-sm-6 col-md-4 col-lg-2 mt-5">
                        <div class="d-flex flex-column card-size-buku">
                            <a href="/kategori-buku/{{ $b->slug }}" style="text-decoration: none;">
                                <div class="card rounded shadow-sm border-0">
                                    <img src="{{ asset('uploaded/gambar/' . $b->gambar) }}"
                                        class="card-img-top img-fluid d-block gambar-ukuran-landing">

                                    <div class="card-body">
                                        <p class="card-text read-more text-muted small"> {{ $b->kategori }} </p>
                                        <h5 class="card-title read-more mt-n2 text-dark">
                                            {{ $b->judul }}
                                        </h5>
                                    </div>

                                    <div class="card-footer read-more small mt-n4  bg-transparent border-0 text-muted">
                                        {{ $b->penulis }}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
            <!-- Akhir Item kategori buku Gizi & Pangan -->
        </div>

    </div>

    <!-- Akhir Container kategori buku Gizi & Pangan -->
    
     <!--Awal container buku Masyarakat-->
    <!-- #Masyarakat-->

    <div class="container mt-5 mb-5" id="Masyarakat">
        <div class="row mx-auto">
            <div class="col">
                <div class="d-flex justify-content-between">
                    <h3> <i class="fas fa-book mr-3" style="font-size:28px"></i>Masyarakat</h3>
                </div>
            </div>
        </div>


        <div class="row mx-auto mt-n3">

            @if (!$dataMasyarakat->count())
                <h5 class="ml-5 mt-5">Data buku tidak ditemukan</h5>
            @else
                <!-- Awal Item kategori buku Masyarakat -->
                @foreach ($dataMasyarakat as $b)
                    <div class="col-6 col-sm-6 col-md-4 col-lg-2 mt-5">
                        <div class="d-flex flex-column card-size-buku">
                            <!-- Card-->
                            <a href="/kategori-buku/{{ $b->slug }}" style="text-decoration: none;">
                                <div class="card rounded shadow-sm border-0">
                                    <img src="{{ asset('uploaded/gambar/' . $b->gambar) }}"
                                        class="card-img-top img-fluid d-block gambar-ukuran-landing">

                                    <div class="card-body">
                                        <p class="card-text read-more text-muted small"> {{ $b->kategori }} </p>
                                        <h5 class="card-title read-more mt-n2 text-dark">
                                            {{ $b->judul }}
                                        </h5>
                                    </div>

                                    <div class="card-footer read-more small mt-n4  bg-transparent border-0 text-muted">
                                        {{ $b->penulis }}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
            <!-- Akhir Item kategori buku Masyarakat -->
        </div>

    </div>

    <!-- Akhir Container kategori buku Masyarakat -->
    
      <!--Awal container buku Perkebunan-->
    <!-- #Perkebunan-->

    <div class="container mt-5 mb-5" id="Perkebunan">
        <div class="row mx-auto">
            <div class="col">
                <div class="d-flex justify-content-between">
                    <h3> <i class="fas fa-book mr-3" style="font-size:28px"></i>Perkebunan</h3>
                </div>
            </div>
        </div>


        <div class="row mx-auto mt-n3">

            @if (!$dataPerkebunan->count())
                <h5 class="ml-5 mt-5">Data buku tidak ditemukan</h5>
            @else
                <!-- Awal Item kategori buku Perkebunan -->
                @foreach ($dataPerkebunan as $b)
                    <div class="col-6 col-sm-6 col-md-4 col-lg-2 mt-5">
                        <div class="d-flex flex-column card-size-buku">
                            <!-- Card-->
                            <a href="/kategori-buku/{{ $b->slug }}" style="text-decoration: none;">
                                <div class="card rounded shadow-sm border-0">
                                    <img src="{{ asset('uploaded/gambar/' . $b->gambar) }}"
                                        class="card-img-top img-fluid d-block gambar-ukuran-landing">

                                    <div class="card-body">
                                        <p class="card-text read-more text-muted small"> {{ $b->kategori }} </p>
                                        <h5 class="card-title read-more mt-n2 text-dark">
                                            {{ $b->judul }}
                                        </h5>
                                    </div>

                                    <div class="card-footer read-more small mt-n4  bg-transparent border-0 text-muted">
                                        {{ $b->penulis }}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
            <!-- Akhir Item kategori buku Perkebunan -->
        </div>

    </div>

    <!-- Akhir Container kategori buku Perkebunan -->

    <!-- Awal Container kategori buku Perikanan -->
    <!-- #Perikanan -->

    <div class="container mt-5 mb-5" id="Perikanan">
        <div class="row mx-auto">
            <div class="col">
                <div class="d-flex justify-content-between">
                    <h3> <i class="fas fa-book mr-3" style="font-size:28px"></i>Perikanan</h3>
                </div>
            </div>
        </div>


        <div class="row mx-auto mt-n3">

            @if (!$dataPerikanan->count())
                <h5 class="ml-5 mt-5">Data buku tidak ditemukan</h5>
            @else
                <!-- Awal Item kategori buku Perikanan -->
                @foreach ($dataPerikanan as $b)
                    <div class="col-6 col-sm-6 col-md-4 col-lg-2 mt-5">
                        <div class="d-flex flex-column card-size-buku">
                            <!-- Card-->
                            <a href="/kategori-buku/{{ $b->slug }}" style="text-decoration: none;">
                                <div class="card rounded shadow-sm border-0">
                                    <img src="{{ asset('uploaded/gambar/' . $b->gambar) }}"
                                        class="card-img-top img-fluid d-block gambar-ukuran-landing">

                                    <div class="card-body">
                                        <p class="card-text read-more text-muted small"> {{ $b->kategori }} </p>
                                        <h5 class="card-title read-more mt-n2 text-dark">
                                            {{ $b->judul }}
                                        </h5>
                                    </div>

                                    <div class="card-footer read-more small mt-n4  bg-transparent border-0 text-muted">
                                        {{ $b->penulis }}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
            <!-- Akhir Item kategori buku Perikanan -->
        </div>

    </div>
    
    </div>
    <!-- Akhir Container kategori buku Perikanan -->


    <!-- Awal Container kategori buku Katalog Peternakan -->
    <!-- #Peternakan -->

    <div class="container mt-5 mb-5" id="Peternakan">
        <div class="row mx-auto">
            <div class="col">
                <div class="d-flex justify-content-between">
                    <h3> <i class="fas fa-book mr-3" style="font-size:28px"></i>Peternakan</h3>
                </div>
            </div>
        </div>


        <div class="row mx-auto mt-n3">

            @if (!$dataTernak->count())
                <h5 class="ml-5 mt-5">Data buku tidak ditemukan</h5>
            @else
                <!-- Awal Item kategori buku Peternakan -->
                @foreach ($dataTernak as $b)
                    <div class="col-6 col-sm-6 col-md-4 col-lg-2 mt-5">
                        <div class="d-flex flex-column card-size-buku">
                            <!-- Card-->
                            <a href="/kategori-buku/{{ $b->slug }}" style="text-decoration: none;">
                                <div class="card rounded shadow-sm border-0">
                                    <img src="{{ asset('uploaded/gambar/' . $b->gambar) }}"
                                        class="card-img-top img-fluid d-block gambar-ukuran-landing">

                                    <div class="card-body">
                                        <p class="card-text read-more text-muted small"> {{ $b->kategori }} </p>
                                        <h5 class="card-title read-more mt-n2 text-dark">
                                            {{ $b->judul }}
                                        </h5>
                                    </div>

                                    <div class="card-footer read-more small mt-n4  bg-transparent border-0 text-muted">
                                        {{ $b->penulis }}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
            <!-- Akhir Item kategori buku Peternakan -->
        </div>

    </div>
    <!--Akhir container kategori buku Peternakan-->

    
    <!-- Awal Container kategori buku Tanaman -->
    <!-- #Tanaman -->

    <div class="container mt-5 mb-5" id="Tanaman">
        <div class="row mx-auto">
            <div class="col">
                <div class="d-flex justify-content-between">
                    <h3> <i class="fas fa-book mr-3" style="font-size:28px"></i>Tanaman</h3>
                </div>
            </div>
        </div>


        <div class="row mx-auto mt-n3">

            @if (!$dataTanaman->count())
                <h5 class="ml-5 mt-5">Data buku tidak ditemukan</h5>
            @else
                <!-- Awal Item kategori buku Tanaman -->
                @foreach ($dataTanaman as $b)
                    <div class="col-6 col-sm-6 col-md-4 col-lg-2 mt-5">
                        <div class="d-flex flex-column card-size-buku">
                            <a href="/kategori-buku/{{ $b->slug }}" style="text-decoration: none;">
                                <div class="card rounded shadow-sm border-0">
                                    <img src="{{ asset('uploaded/gambar/' . $b->gambar) }}"
                                        class="card-img-top img-fluid d-block gambar-ukuran-landing">

                                    <div class="card-body">
                                        <p class="card-text read-more text-muted small"> {{ $b->kategori }} </p>
                                        <h5 class="card-title read-more mt-n2 text-dark">
                                            {{ $b->judul }}
                                        </h5>
                                    </div>

                                    <div class="card-footer read-more small mt-n4  bg-transparent border-0 text-muted">
                                        {{ $b->penulis }}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
            <!-- Akhir Item kategori buku Tanaman -->
        </div>

        </div>
        
    </div>
    <!-- Akhir Container kategori buku Tanaman -->

    
    <!--Awal container kategori tugas akhir-->
    <!-- #Tugas Akhir-->

    <div class="container mt-5 mb-5" id="tugas_akhir">
        <div class="row mx-auto">
            <div class="col">
                <div class="d-flex justify-content-between">
                    <h3> <i class="fas fa-book mr-3" style="font-size:28px"></i>Tugas Akhir</h3>
                </div>
            </div>
        </div>


        <div class="row mx-auto mt-n3">

            @if (!$tugas_akhir->count())
                <h5 class="ml-5 mt-5">Data buku tidak ditemukan</h5>
            @else
                <!-- Awal Item kategori tugas akhir -->
                @foreach ($tugas_akhir as $eb)
                    <div class="col-6 col-sm-6 col-md-4 col-lg-2 mt-5">
                        <div class="d-flex flex-column card-size-buku">
                            <!-- Card-->
                            <a href="/kategori-ebook/{{ $eb->slug }}" style="text-decoration: none;">
                                <div class="card rounded shadow-sm border-0">
                                    <img src="{{ asset('uploaded/gambar/' . $eb->gambar) }}" alt=""
                                        class="card-img-top img-fluid d-block gambar-ukuran-landing">

                                    <div class="card-body">
                                        <p class="card-text text-muted small read-more"> {{ $eb->kategori }} </p>
                                        <h5 class="card-title read-more mt-n2 text-dark">
                                            {{ $eb->judul }}</h5>
                                    </div>

                                    <div class="card-footer read-more small mt-n4  bg-transparent border-0 text-muted">
                                        {{ $eb->penulis }}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
            <!-- Akhir Item kategori tugas akhir -->
        </div>

    </div>
    <!-- Akhir Container kategori tugas akhir -->
   
    <!--Awal container kategori buku Veteriner-->
    <!-- #Veteriner-->

    <div class="container mt-5 mb-5" id="Veteriner">
        <div class="row mx-auto">
            <div class="col">
                <div class="d-flex justify-content-between">
                    <h3> <i class="fas fa-book mr-3" style="font-size:28px"></i>Veteriner</h3>
                </div>
            </div>
        </div>


        <div class="row mx-auto mt-n3">

            @if (!$dataVeteriner->count())
                <h5 class="ml-5 mt-5">Data buku tidak ditemukan</h5>
            @else
                <!-- Awal Item kategori buku Veteriner -->
                @foreach ($dataVeteriner as $b)
                    <div class="col-6 col-sm-6 col-md-4 col-lg-2 mt-5">
                        <div class="d-flex flex-column card-size-buku">
                            <!-- Card-->
                            <a href="/kategori-buku/{{ $b->slug }}" style="text-decoration: none;">
                                <div class="card rounded shadow-sm border-0">
                                    <img src="{{ asset('uploaded/gambar/' . $b->gambar) }}"
                                        class="card-img-top img-fluid d-block gambar-ukuran-landing">

                                    <div class="card-body">
                                        <p class="card-text read-more text-muted small"> {{ $b->kategori }} </p>
                                        <h5 class="card-title read-more mt-n2 text-dark">
                                            {{ $b->judul }}
                                        </h5>
                                    </div>

                                    <div class="card-footer read-more small mt-n4  bg-transparent border-0 text-muted">
                                        {{ $b->penulis }}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
            <!-- Akhir Item kategori buku Veteriner -->
        </div>

    </div>

    <!-- Akhir Container kategori buku Veteriner -->
  
  
</div>

@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
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
        window.addEventListener("scroll", function() {
            var header = document.querySelector("header");
            header.classList.toggle("sticky", window.scrollY > 0);
        })

    </script>

    <script type="text/javascript">
        $(document).on('click', '.nav-item-2', function() {
            $(this).addClass('active').siblings().removeClass('active')
        })

    </script>
@endsection