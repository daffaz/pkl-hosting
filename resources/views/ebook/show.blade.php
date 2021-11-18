@extends('layouts.master')
@section('title', 'Buku ' . $ebook->judul)
@section('style')
    <style>
        .bawaan {
            color: rgba(0, 0, 0, .2)
        }

    </style>
@endsection
@section('content')
    <div class="container mt-5 mb-5 ">
        <div class="row mx-auto ml-lg-4 mr-lg-n5">
            <div class="modal fade " id="bacaEbook" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
            </div>
            <div class="position-fixed" style="right: 1px;bottom:1px;z-index:99;">
                        <div class="alert alert-dismissible fade show shadow-lg px-3 py-2 pr-5 rounded-lg bg-white" role="alert"
                            style="width:21rem;border-left: 5px solid #d9534f">
                            <span class="text-justify">
                            Sebelum klik tombol "Baca Sekarang", 
                            pastikan Anda telah mematikan extension 
                            Internet Download Manager pada 
                            browser.</span>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
            </div>
            {{-- Thumbnail Detil Buku --}}
            <div class="col-12 col-lg-6 col-md-12 col-sm-12 mr-lg-5">
                @include('admin.layouts.alert')
                <div class="d-flex flex-column">
                    <div class="card rounded shadow-sm border-0">
                        <img class="thumbnail-gambar-1" src="{{ asset('uploaded/gambar/' . $ebook->gambar) }}" alt="">
                        <img class="thumbnail-gambar-2" src="{{ asset('uploaded/gambar/' . $ebook->gambar) }}" alt="">
                        <div class="card-body">
                            <h5 class="card-text mb-3"> {{ $ebook->kategori }} </h5>
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title font-weight-bold text-dark "
                                    style="white-space:nowrap;overflow:hidden;text-overflow: ellipsis;">
                                    {{ $ebook->judul }}
                                </h5>
                                <div>
                                    {{-- <a class="text-decoration-none text-secondary" href="#" type="submit"><i
                                            class="fas fa-heart h1"></i></a> --}}
                                    <form method="POST" action="{{ url('/clickfavorite') }}">
                                        @csrf
                                        <input type="hidden" name="status" id="status" value="{{ $status == null ? '0' : $status->status }}">
                                        <input type="hidden" name="ebook_id" value="{{ $ebook->id }}">
                                        @if ($status == null)
                                            <button type="submit" id="favorit" style="border: none; background: none"> <i class="fas fa-heart h1 bawaan"></i>
                                            </button>
                                        @else
                                            <button type="submit" id="favorit" style="border: none; background: none"> <i class="fas fa-heart h1 {{ $status->status == '1' ? 'text-danger' : 'bawaan' }}"></i>
                                            </button>
                                        @endif
                                    </form>
                                </div>
                            </div>
                            <p class="card-text">{{ $ebook->penulis }}</p>
                            <p class="text-justify">
                                @if (strlen($ebook->deskripsi) > 40)
                                    {{ substr($ebook->deskripsi, 0, 100) }}
                                    <span class="read-more-show2 text-primary hide_content">Baca Selengkapnya<i
                                            class="fa fa-angle-down ml-1"></i></span>
                                    <span class="read-more-content">
                                        {{ substr($ebook->deskripsi, 100, strlen($ebook->deskripsi)) }}
                                        <span class="read-more-hide text-primary hide_content">Lebih Sedikit<i
                                                class="fa fa-angle-up ml-1"></i></span>
                                @else
                                    {{ $ebook->deskripsi }}
                                @endif
                            </p>
                        </div>

                        <div class="card-footer small mb-3  mt-n3 bg-transparent border-0 text-muted">
                            <a href="/read?file={{ asset('uploaded/pdf/' . $ebook->pdf) }}"
                                class="btn biru-unggulan-button btn-baca-sekarang text-center rounded-pill">
                                Baca Sekarang
                            </a>
                        </div>
                    </div>
                    {{-- <h4 class="mt-4">Progress Baca</h4>
            <div id="myProgress" class="rounded-pill mt-3 bg-light shadow myProgress">
                <div id="test" class="rounded-pill myBar"><span id="page_num_progress"></span> / <span id="page_max"></span>
                </div>
            </div> --}}
                </div>
                {{-- Akhir Daftar Isi --}}
            </div>
            <div class="col-12 col-lg-5 col-md-12 col-sm-12 kolom-daftar-isi">
                <h5 class="mt-lg-0 mb-lg-0 mt-4 mb-3"><i>E-book</i> Lainnya</h5>

                @foreach ($related as $r)
                    <a href="/kategori-ebook/{{ $r->slug }}" style="text-decoration: none;">
                        <div
                            class="d-flex bg-white align-items-start align-items-md-center align-items-lg-center flex-row flex-md-row flex-lg-row shadow my-3">
                            <img src="{{ asset('uploaded/gambar/' . $r->gambar) }}" width="100px" height="140px"
                                class="border" alt="buku">
                            <div class="d-flex flex-column my-auto w-75 p-3" style="color: #16325C">
                             
                                <div class="home-text-kotak-h4 text-left text-md-left text-lg-left read-more-show">
                                    {{ $r->judul }}
                                </div>
                                <div class="home-text-kotak-h5 text-left text-md-left text-lg-left read-more-show small text-muted">
                                    {{ $r->penulis }}
                                </div>
                                <p class="text-lg-justify read-more-show">
                                    {{ $r->deskripsi }}
                                </p>
                            </div>
                        </div>
                    </a>
                @endforeach

            </div>
        </div>
    </div>
@endsection

{{-- Akhir Daftar Isi --}}

@section('script')
    <script src="{{ asset('js/pdf.js') }}"></script>
    <script src="{{ asset('js/viewer.js') }}"></script>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.7.570/pdf.min.js"
        integrity="sha512-g4FwCPWM/fZB1Eie86ZwKjOP+yBIxSBM/b2gQAiSVqCgkyvZ0XxYPDEcN2qqaKKEvK6a05+IPL1raO96RrhYDQ=="
        crossorigin="anonymous">
    </script>
    {{-- AJAX BUAT FAVORIT --}}
    {{-- <script>
        console.log(document.getElementById('status').value);
        $(function() {
            $("#favorit").click(function(e) {
                e.preventDefault()
                $.ajax({
                    url: "{{ url('/clickfavorite') }}",
                    type: 'POST',
                    data: $("#status").val(),
                    success: function() {
                        if ($("#status").val() == '1') {
                            $("#favorit").addClass("text-danger");
                            $("#favorit").removeClass("bawaan");
                        } else {
                            $("#favorit").addClass("bawaan");
                            $("#favorit").removeClass("text-danger");
                        }
                    }
                });
            });
        });

    </script> --}}
    {{-- END AJAX BUAT FAVORIT --}}
    <script>
        document.addEventListener('contextmenu', event => event.preventDefault());
        window.oncontextmenu = function() {
            // showCustomMenu();
            return false; // cancel default menu
        }

    </script>
@endsection
