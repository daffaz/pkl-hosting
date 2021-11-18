@extends('layouts.master')
@section('title', $buku->judul)
@section('content')
@section('script')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.7.570/pdf.min.js"
integrity="sha512-g4FwCPWM/fZB1Eie86ZwKjOP+yBIxSBM/b2gQAiSVqCgkyvZ0XxYPDEcN2qqaKKEvK6a05+IPL1raO96RrhYDQ=="
crossorigin="anonymous"></script> --}}

    <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
        $('.read-more-content').addClass('hide_content')
        $('.read-more-show2, .read-more-hide').removeClass('hide_content')
        // Set up the toggle effect:
        $('.read-more-show2').on('click', function(e) {
            $(this).next('.read-more-content').removeClass('hide_content');
            $(this).addClass('hide_content');
            e.preventDefault();
        });
        // Changes contributed by @diego-rzg
        $('.read-more-hide').on('click', function(e) {
            var p = $(this).parent('.read-more-content');
            p.addClass('hide_content');
            p.prev('.read-more-show2').removeClass('hide_content'); // Hide only the preceding "Read More"
            e.preventDefault();
        });

    </script>
@endsection
<div class="container mt-5 mb-5">
    <div class="row mx-auto ml-lg-4 mr-lg-n5">
        {{-- Thumbnail Detil Buku --}}
        <div class="col-12 col-lg-6 col-md-12 col-sm-12 mr-lg-5">
            <div class="d-flex flex-column">
                <div class="card rounded shadow-sm border-0">
                    <img class="thumbnail-gambar-1" src="{{ asset('uploaded/gambar/' . $buku->gambar) }}" alt="">
                    <img class="thumbnail-gambar-2" src="{{ asset('uploaded/gambar/' . $buku->gambar) }}" alt="">
                    <div class="card-body">
                        <h5 class="card-text mb-3"> {{ $buku->kategori }} </h5>
                            <h4 class="card-title font-weight-bold text-dark"
                                style="white-space:nowrap;overflow:hidden;text-overflow: ellipsis;">{{ $buku->judul }}
                            </h4>
                            
                        <div class="d-flex justify-content-between"
                            <p class="card-text">{{ $buku->penulis }}</p>
                            <h5><span class="badge badge-info text-white p-1">{{ $buku->quantity < 1 ? 'Tidak tersedia' : $buku->status }} : {{$buku->quantity}}</span></h5>
                        </div>
                        <p class="text-justify">
                            @if (strlen($buku->deskripsi) > 40)
                                    {{ substr($buku->deskripsi, 0, 100) }}
                                    <span class="read-more-show2 text-primary hide_content">Baca Selengkapnya<i
                                            class="fa fa-angle-down ml-1"></i></span>
                                    <span class="read-more-content">
                                        {{ substr($buku->deskripsi, 100, strlen($buku->deskripsi)) }}
                                        <span class="read-more-hide text-primary hide_content">Lebih Sedikit<i
                                                class="fa fa-angle-up ml-1"></i></span> </span>
                            @else
                                {{ $buku->deskripsi }}
                            @endif
                        </p>
                    </div>

                    <div class="card-footer small mb-3  mt-n3 bg-transparent border-0 text-muted">
                        <button class="btn biru-unggulan-button btn-baca-sekarang text-center rounded-pill"
                            data-toggle="modal" data-target="#pinjamModal" {{ $buku->quantity < 1 ? "disabled" : ""}}>Pinjam
                        </button>
                    </div>
                </div>

            </div>
        </div>
        {{-- Akhir Thumbnail Detil Buku --}}



        <!-- Modal -->
        <div class="modal fade modal-show-custom" id="pinjamModal" tabindex="-1" role="dialog"
            aria-labelledby="pinjamModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content" style="border-radius: 20px;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="pinjamModalLabel">Pesan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="/kategori-buku/{{ $buku->slug }}/pinjam" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="row ml-lg-5 ml-md-0">
                                <div class="col-lg-4 col-md-4 col-12">
                                    <img src="{{ asset('uploaded/gambar/' . $buku->gambar) }}" class="img-fluid ml-lg-5 ml-md-3"
                                        alt="" style="border-radius: 20px;width:150px;">
                                </div>
                                <div class="col-lg-6 col-md-7 col-11 ml-lg-4 ml-md-3 ml-0">

                                    {{-- KEPERLUAN REQUEST PADA CONTROLLER --}}
                                    <input type="hidden" name="buku-id" value="{{ $buku->id }}">
                                    <input type="hidden" name="civitas-id" value="{{ Auth::user()->civitas_id }}">
                                    <input type="hidden" name="user-id" value="{{ Auth::user()->id }}">
                                    {{-- END KEPERLUAN --}}
                                    <h5 class="mt-3">Hai {{ Auth::user()->name }}</h5>
                                    <h5 class="font-weight-bold" style="padding-right: 5px;font-size:15px;">Anda yakin
                                        ingin
                                        meminjam buku {{ $buku->judul }}</h5>
                                    <p class="">{{ date('d/m/Y') }}</p>
                                    <button
                                        class="btn mt-1 px-6 rounded-pill bg-warning text-dark ml-md-1 font-weight-bold"
                                        type="submit">Iya</button>
                                    <button class="btn mt-1 px-6 rounded-pill tombol-pinjam-buku ml-3 font-weight-bold"
                                        data-dismiss="modal">Tidak</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- Akhir Modal --}}
            </div>
        </div>
        {{-- Akhir Thumbnail Detil Buku --}}


        {{-- Akhir Thumbnail Detil Buku --}}

        {{-- Kotak buku terkait --}}
        {{-- Awal buku terkait --}}
        <div class="col-12 col-lg-5 col-md-12 col-sm-12 kolom-daftar-isi">
            <h5 class="mt-lg-0 mb-lg-0 mt-4 mb-3">Buku Lainnya</h5>

            @foreach ($related as $r)
                <a href="/kategori-buku/{{ $r->slug }}" style="text-decoration: none;">
                    <div
                        class="d-flex bg-white align-items-start align-items-md-center align-items-lg-center flex-row flex-md-row flex-lg-row shadow my-3">
                        <img src="{{ asset('uploaded/gambar/' . $r->gambar) }}" width="100px" height="140px"
                            class="border" alt="buku">
                        <div class="d-flex flex-column my-auto w-75 p-3" style="color: #16325C">
                            <div class="home-text-kotak-h4 text-left text-md-left text-lg-left read-more-show">
                                {{ $r->judul }}</div>
                            <div
                                class="home-text-kotak-h5 text-left text-md-left text-lg-left read-more-show small text-muted">
                                {{ $r->penulis }}</div>
                            <p class="text-lg-justify read-more-show">{{ $r->deskripsi }} Lorem ipsum dolor sit amet,
                                consectetur adipisicing elit. Voluptates earum fugiat ipsam saepe tempora sit sint nihil
                                veritatis ducimus quasi.</p>

                            {{-- <button
                                class="btn biru-unggulan-button ml-home px-home mt-2 mt-lg-0 py-2 my-auto mb-home mr-0 mr-lg-4 text-white align-self-lg-end align-self-md-end align-self-center">
                                Lanjutkan</button> --}}
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        {{-- <h4 class="mt-4">Tenggat Waktu</h4>
                    <div id="myProgress" class="rounded-pill mt-3 bg-light shadow" style="width: 100%;">
                        <div id="myBar" class="bg-danger rounded-pill"
                            style="width: 20%;height: 30px;text-align: center;line-height: 30px;color: white;">
                            10 Hari
                        </div>
                    </div> --}}

        {{-- Akhir buku terkait --}}
    </div>
</div>


@endsection
