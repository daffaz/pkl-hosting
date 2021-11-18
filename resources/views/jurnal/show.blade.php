@extends('layouts.master')
@section('title', $buku->judul)
@section('content')

    <div class="container mt-5 mb-5">

    <div class="row ml-5 mr-n5">
{{-- Thumbnail Detil Buku --}}
        <div class="col-6">
            <div class="thumbnail">
                <div class="thumbnail-buku">        
                    <img class="thumbnail-gambar-1" src="{{ $buku->gambar }}" alt="" style="width:500px;height:300px;opacity:0.5">
                    <img class="thumbnail-gambar-2" src="{{ $buku->gambar }}" alt="" style="z-index:2;position:absolute;left:50px;top:120px;">
                </div>
                <div class="kotak-deskripsi-buku shadow-sm" style="width:500px;height:300px;background-color:white;">
                    <div class="judul-buku" style="padding:30px 30px 0px 30px;">
                        <h3 class="font-weight-bold">{{ $buku->judul }}</h3>
                        <h5 class="mb-n1 quantity-text"><label class="bg-danger text-white badge p-1 pr-3 pl-3 rounded-pill">Quantity : {{ $buku->quantity }}</label></h5>
                    </div>
                    <div class="author-buku d-flex justify-content-between mt-1" style="padding:0px 30px 0px 30px;">
                        <h4>{{ $buku->penulis }}</h4>
                        <h4>{{ $buku->kategori }}</h4>
                    </div>
                    <div class="deskripsi-buku text-justify" style="padding:0px 30px 0px 30px;">
                        <p>{{ $buku->deskripsi }}</p>
                    </div>
                    <div class="tombol-pinjam-detil" style="padding:0px 30px 30px 30px;">
                        <button class="btn biru-unggulan-button text-white text-center rounded-pill shadow" data-toggle="modal" data-target="#pinjamModal" style="width:440px">Pinjam</button>
                       
                     <!-- Modal -->
                     <div class="modal fade" id="pinjamModal" tabindex="-1" role="dialog" aria-labelledby="pinjamModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content" style="border-radius: 20px;" >
                            <div class="modal-header">
                            <h5 class="modal-title" id="pinjamModalLabel">Pesan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body" >
                            <div class="row ml-5">
                                <div class="col-5">
                                <h5 class="mt-3">Hai Rizky Aquino!</h5>
                                    <h5 class="font-weight-bold" style="padding-right: 30px;">Anda yakin ingin meminjam (Judul Buku) ?</h5>
                                    <p class="">02/09/2021</p>
                                    <button class="btn mt-1 px-6 rounded-pill bg-warning text-dark font-weight-bold" data-dismiss="modal">Iya</button>
                                    <button class="btn mt-1 px-6 rounded-pill tombol-pinjam-buku ml-3 font-weight-bold" data-dismiss="modal">Tidak</button>
                                </div>
                                <div class="col-5 offset-2">
                                    <img src="{{ asset('images/thumbnail-1.jpg')}}" class="img-fluid ml-5" alt="" style="border-radius: 20px;width:150px;">
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    {{-- Akhir Modal --}}

                    </div>
                </div>
            </div>
        </div>
        {{-- Akhir Thumbnail Detil Buku --}}

        {{-- Awal Daftar Isi --}}
        <div class="col-6">
            <h4>Daftar Isi</h4>
            <div class="kotak-daftar-isi shadow-sm overflow-auto" style="background-color:White;width:350px;height:350px;">
                
                <div class="daftar-isi" style="padding:30px 30px 0px 30px;">
                    <p><i class="fas fa-book mr-2"></i>Bagian Buku 1 <span style="margin-left: 130px">20</span></p>
                    <p><i class="fas fa-book mr-2"></i>Bagian Buku 1 <span style="margin-left: 130px">120</span></p>
                    <p><i class="fas fa-book mr-2"></i>Bagian Buku 1 <span style="margin-left: 130px">220</span></p>
                    <p><i class="fas fa-book mr-2"></i>Bagian Buku 1 <span style="margin-left: 130px">320</span></p>
                    <p><i class="fas fa-book mr-2"></i>Bagian Buku 1 <span style="margin-left: 130px">420</span></p>
                    <p><i class="fas fa-book mr-2"></i>Bagian Buku 1 <span style="margin-left: 130px">520</span></p>
                    <p><i class="fas fa-book mr-2"></i>Bagian Buku 1 <span style="margin-left: 130px">620</span></p>
                    <p><i class="fas fa-book mr-2"></i>Bagian Buku 1 <span style="margin-left: 130px">720</span></p>
                    <p><i class="fas fa-book mr-2"></i>Bagian Buku 1 <span style="margin-left: 130px">720</span></p>
                </div>
            </div>
            <h4 class="mt-4">Tenggat Waktu</h4>
            <div id="myProgress" class="rounded-pill mt-3 bg-light shadow" style="width: 65%;">
                <div id="myBar" class="bg-danger rounded-pill" style="width: 20%;height: 30px;
                text-align: center; /* To center it horizontally (if you want) */
                line-height: 30px; /* To center it vertically */
                color: white;">10 Hari</div>
              </div>
        </div>
        {{-- Akhir Daftar Isi --}}
    </div>

    </div>

@endsection
