@extends('layouts.master')
@section('title', 'Bantuan | Perpustakaan Digital } Maca')
@section('content')
     <!--Tombol back to top-->
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-caret-up"></i></button>
    <!--Akhir tombol back to top-->
    
    <div class="container mt-5 mb-5">
        <div class="row ml-lg-5">
            <div class="col-lg-6 col-12">
                <p class="judul2 text-lg-left text-md-center text-center">Apa yang dapat kami bantu?</p>
                <p class="isi2 text-lg-left text-md-center text-center">Jawaban untuk FAQ.</p>
                <p class="isi2 text-lg-left text-md-center text-center">Jika Anda membutuhkan bantuan, periksalah jika pertanyaan Anda telah di jawab.</p>
            </div>
            <div class="col-lg-6 col-md-12 col-12">
                <img class="gambar-bantuan ml-lg-5 ml-md-5 ml-4" src="images/vector1.svg" alt="" >
            </div>
        </div>
        <div class="card bg-light shadow my-5" style="border-radius:50px;">
            <p class="sub2 mt-5"><img src="{{ asset('images/icon1.svg') }}" height="45px" width="50px" alt="">FAQ</p>
            <div class="row">
                <div class="col-lg col-md col-12 ml-lg-5">
                    <ul style="color: #215D98; font-size:18px; font-weight:medium;">
                        <li class="text-center text-md-left text-lg-left pr-5 pr-md-0 pr-lg-0">Lupa kata sandi</li>
                    </ul>

                    <div class="card-body mt-n4">
                        <div class="card bg-transparent border-0 text-center text-md-left text-lg-left">
                            Silahkan, logout terlebih dahulu dan click tulisan "Lupa Password" di halaman login atau kamu bisa minta bantuan kepada pengurus perpustakaan secara langsung.
                        </div>
                    </div>

                </div>
                <div class="col-lg col-md-12 col-12 mr-lg-5">
                    <ul style="color: #215D98; font-size:18px; font-weight:medium;">
                        <li class="pr-5 pr-md-0 pr-lg-0 text-center text-md-left text-lg-left">Halaman tidak ditampilkan dengan benar.</li>
                    </ul>
                    <div class="card-body mt-n4">
                        <div class="card bg-transparent border-0 text-center text-md-left text-lg-left">
                            Silahkan ketik saran dan kritikmu pada form di halaman ini. Kami akan segera memeriksanya.
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg col-md-12 col-12 mx-lg-5 ">
                    <ul style="color: #215D98; font-size:18px; font-weight:medium;">
                        <li class="pr-5 pr-md-0 pr-lg-0 text-center text-md-left text-lg-left">Apakah ada tim pendukung yang dapat membantu ketika saya perlu bertanya mengenai materi
                            pelajaran?</li>
                    </ul>

                    <div class="card-body mt-n4">
                        <div class="card bg-transparent border-0 text-center text-md-left text-lg-left">
                            Jika ada yang ingin ditanyakan tentang fitur kamu bisa memasukan pertanyaanmu pada formulir di halaman ini.
                        </div>
                    </div>
                </div>

            </div>
            <div class="p">
                <p class="sub2 mt-5 gambar"><img src="{{ asset('images/icon1.svg') }}" height="45px" width="50px"
                        alt="">Saran &
                    Pertanyaan</p>
                    @include('admin.layouts.alert')

                <form method="POST" action="/bantuan/post">
                    @csrf
                           <div class="row ml-lg-5 ml-3">
                        <div class="col-12 col-lg">
                            <label class="judulkotak" for="fname">Nama</label><br>
                            <input required class="kotak" type="text" id="fname" name="nama" value=""><br>
                        </div>
                        <div class="col-12 col-lg ml-lg-5 mt-lg-0 mt-md-3 mt-3">
                            <label class="judulkotak" for="lname">Email</label><br>
                            <input required class="kotak" type="text" id="lname" name="email" value=""><br><br>
                        </div>

                    </div>
                    <div class="row ml-lg-5 ml-3">
                        <div class="col-12">
                            <label class="judulkotak" for="fname">Subjek</label><br>
                            <input required class="kotak2" type="text" id="fname" name="subjek" value=""><br>
                        </div>
                    </div>
                    <div class="row ml-lg-5 ml-3 mt-lg-3 mt-md-3 mt-3">
                        <div class="col-12">
                            <label class="judulkotak" for="fname">Pesan</label><br>
                            <textarea required class="txta" id="fname" name="pesan" style=""></textarea><br>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mr-lg-5 mr-md-5 mr-4">
                        <input class="btn biru-unggulan-button mt-3 mb-5" type="submit" value="Kirim" style="margin-right:10px;">
                    </div>
            </div>
        </div>


        </form>
    </div>
    </div>
    
    <style>
        input:focus, textarea:focus {
            outline: none;
        }
    </style>

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

