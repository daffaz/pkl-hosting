@extends('layouts.master')
@section('title', 'Tentang')

@section('content')
<!-- Awal Container Tentang Maca Atas -->
<div class="container shadow p-5 gambar2" style="background-color:white;border-radius:50px;">
    <div class="row">
        <div class="col-lg-6 text-justify">
            <h2 class="font-weight-bold heading-size ml-3 mt-2">Tentang Maca</h2>
            <p class="paragraph-size ml-3 mt-4">Maca adalah sebuah website perpustakaan online yang berotorisasikan dari IPB yang di develop oleh tim kami.
            </P>
            <p class="paragraph-size ml-3">
                Pada landing page, mahasiswa dapat melihat berbagai macam buku, dan buku-buku tersebut beberapa dikategorikan menurut yang terbaru ke terlama, dan ada beberapa buku juga akan dikategorikan sebagai buku best seller, buku best seller adalah buku yang paling sering dipinjam oleh mahasiswa.
            </p>
        </div>
        <div class="col-lg-6">
            <img src="{{ asset('images/tentang-1.svg') }}" alt="gambar" class="img-fluid w-75" style="margin-left: 90px;">
        </div>
    </div>
</div>
<!-- Akhir Container Tentang Maca Atas -->

<div class="container shadow p-5 mt-5 mb-5" style="background-color:white;border-radius:50px;">
    <div class="row">
        <div class="col-lg-6 text-justify">
            <p class="paragraph-size ml-3 ">Maca adalah sebuah website perpustakaan online yang berotorisasikan dari IPB yang di develop oleh tim kami.
            </P>
            <p class="paragraph-size ml-3">
                Tujuan dari maca.ipb.ac.id ini adalah memudahkan akses membaca mahasiswa ipb terhadap perpus yang berlokasi di IPB University, sebagaimana pada masa pandemi ini mahasiswa diwajibkan melakukan kuliah online.
            </p>
            <p class="paragraph-size ml-3">
                Sebagaimana definisinya website ini berisi buku-buku dari perpustakan IPB University yang dapat di akses melalui website “maca.ipb.ac.id”, dalam website ini memiliki fitur-fitur seperti :
            </p>
            <div class="row mt-3">
                <div class="col-4">
                    <button type="button" class="btn btn-lg ml-3 shadow button-tentang"><span class="text-button-tentang">Membaca <br> Buku</span></button>
                </div>
                <div class="col-4">
                    <button type="button" class="btn btn-lg ml-3 shadow button-tentang "><span class="text-button-tentang">Meminjam <br> Buku</span></button>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-4">
                    <button type="button" class="btn btn-lg ml-3 shadow button-tentang"><span class="text-button-tentang">Membayar <br> Denda</span></button>
                </div>
                <div class="col-4">
                    <button type="button" class="btn btn-lg ml-3 shadow button-tentang"><span class="text-button-tentang">Melihat <br> Peminjaman</span></button>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <img src="{{ asset('images/tentang-2.svg') }}" alt="gambar" class="img-fluid" style="width:55%;margin-left: 140px;">
        </div>
    </div>
</div>
@endsection