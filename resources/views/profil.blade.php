@extends('layouts.master')
@section('title', 'Profil | Perpustakaan Digital | Maca')
@section('content')
    <!--Tombol back to top-->
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-caret-up"></i></button>
    <!--Akhir tombol back to top-->
    
    <div class="container my-5 prf">
        <div class="row w-lg-75 w-sm-100 w-md-75 mx-auto mb-4 h2" style="border-bottom: 1px solid rgb(70, 67, 67, .5)">
            <button class="col-6 btn-profil tablinks text-biru-tua" onclick="openCity(event, 'Profil')" id="defaultOpen">
                Profil
            </button>
            <button class="col-6 btn-profil tablinks text-biru-tua" onclick="openCity(event, 'Denda')">Denda</button>
        </div>

        <div id="Profil" class="tabcontent">
            <div class="d-flex flex-column justify-content-center py-5 px-3 align-items-center shadow w-lg-75 w-sm-100 mx-auto bg-white"
                style="border-radius: 40px">
                @include('admin.layouts.alert')
                <div class="avatar mx-auto mx-md-0 mx-lg-0 mb-2 mb-md-0 mb-lg-0 mr-md-3 gd-warning"
                    style="font-size: 1rem; width: 8.8rem; height: 8.8rem;font-size: 3em">
                    <?php
                    $arr = explode(' ', Auth::user()->name);
                    echo count($arr) > 1 ? strtoupper($arr[0][0] . $arr[1][0]) : strtoupper($arr[0][0] . $arr[0][1]);
                    ?>
                </div>
                <div class="h3 montserrat mt-4 mb-2 text-biru-tua" style="font-weight: 600">{{ Auth::user()->name }}</div>
                <div class="h5 montserrat text-biru-tua">{{ Auth::user()->nim }}</div>
                @php
                $title = "";
                if($status == 3 || $status == 4) {
                    $title = "Mahasiswa";
                }elseif($status == 1) {
                    $title = "Admin perpus";
                }else {
                    $title = "Dosen";
                }
                @endphp
                <div class="h5 montserrat text-biru-tua">{{ $title }} Sekolah Vokasi IPB</div>

                {{-- {{ dd($riwayat) }} --}}
                @if ($riwayat >= 1)
                    <div class="position-fixed" style="right: 3px;bottom:3px;">
                        <div class="shadow-lg px-3 py-2 rounded-lg bg-white"
                            style="width:18rem;border-left: 5px solid #d9534f">
                            <span class="text-justify" >Anda belum
                            bisa request Surat Bebas Pustaka karena anda masih memiliki buku yang belum dikembalikan / denda
                            yang belum dibayar</span></div>
                    </div>
                    <form>
                        <button name="button" disabled type="submit" class="btn btn-success">Request Surat Bebas
                            Pustaka</button>
                    </form>
                @else
                    @if (!$data)
                        <form action="/{{ Auth::user()->nim }}/request" id="button_surat" method="get">
                            @csrf
                            <input name="nama" type="hidden" value="{{ Auth::user()->name }}">
                            <input name="id" type="hidden" value="{{ Auth::user()->id }}">
                            <button name="button" type="submit" class="btn btn-success">Request Surat Bebas Pustaka</button>
                        </form>
                    @else
                        @if ($data->status == 0)
                            <div class="bg-warning py-2 px-3 rounded-pill mt-3">Masih menunggu persetujuan dari admin</div>
                        @else
                            <a href="/profil/{{ strtolower(Auth::user()->name) }}/cetak"
                                class="btn btn-info text-white mt-3 font-weight-bold">Download
                                Surat
                                Bebas Pustaka</a>
                        @endif
                    @endif
                @endif
            </div>
        </div>

        <div id="Denda" class="tabcontent">
            <div class="border bg-light shadow p-3 mx-auto w-total-denda ml-5" style="border-radius:20px;">
                <div class="denda"><i class="fas fa-money-bill"></i> Total dendamu: <span
                        class="denda2">Rp{{ number_format($totalDenda * 500), 2, '.', '' }}-</span>
                </div>
            </div>
            <div class="isi2 p-3 my-5 mt-5 ml-lg-4 ml-md-4"><i class="far fa-clock"></i> Buku Yang Terkena Denda (Overtime)</div>
            <!-- card untuk buku -->
            <div class="row" style="margin-bottom:200px!important;">
                @foreach ($denda as $d)
                    @php
                        // $tenggat = date('d', strtotime($d->lastreturn)) - date('j');
                        $date1 = new DateTime(date('y-m-d', strtotime($d->lastreturn)));
                        $date2 = new DateTime(date('y-m-d'));
                        $interval = $date1->diff($date2);
                    @endphp
                    <div>
                        <div class="card border-0 bg-transparent ml-lg-5 ml-md-5 ml-4 card-denda">
                            <img class="card-img-top gambar-denda" src="{{ asset('uploaded/gambar/' . $d->buku->gambar) }}"
                                alt="Card image cap" style="border:5px solid white; border-radius:20px;">
                            <div class="card-body bg-white mt-3 mb-5 shadow" style="border:5px solid white; border-radius:20px;">
                                <div class="card-title">
                                    <h5 class="sub3" >{{ $d->buku->judul }} ({{ $interval->d + 1 }} hari)</h5>
                                </div>
                                <div class="card-text text-center"><span
                                        class="isi4 mx-auto">Rp{{ number_format(($interval->d + 1) * 500, 0, '.', ',') }}-</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
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
        }
        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();

    </script>
@endsection
