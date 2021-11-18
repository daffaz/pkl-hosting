@extends('layouts.app')
@section('title', 'Daftar Akun | Maca')
@section('content')

<style>
    :root{
  --biru-unggulan:rgb(22, 50, 92);
  --biru-unggulan-button:rgba(22, 50, 92,0.9);
  --biru-text-home:#215D98;
}

.biru-unggulan-button {
  background-color: var(--biru-unggulan-button) !important;
  color: #ffffff;
}

.biru-unggulan-button:hover {
  background-color: rgba(22, 50, 92, 1) !important;
  color: #ffffff;
}

    body {
    color: #000;
    overflow-x: hidden;
    height: 100%;
    background-color: #B0BEC5;
    background-repeat: no-repeat
}

.card0 {
    box-shadow: 0px 4px 8px 0px #757575;
    border-radius: 0px
}

.card2 {
    margin: 0px 40px
}

.logo {
    width: 200px;
    height: 100px;
    margin-top: 20px;
    margin-left: 35px
}

.image {
    width: 360px;
    height: 280px
}

.border-line {
    border-right: 1px solid #EEEEEE
}

.facebook {
    background-color: #3b5998;
    color: #fff;
    font-size: 18px;
    padding-top: 5px;
    border-radius: 50%;
    width: 35px;
    height: 35px;
    cursor: pointer
}

.twitter {
    background-color: #1DA1F2;
    color: #fff;
    font-size: 18px;
    padding-top: 5px;
    border-radius: 50%;
    width: 35px;
    height: 35px;
    cursor: pointer
}

.linkedin {
    background-color: #2867B2;
    color: #fff;
    font-size: 18px;
    padding-top: 5px;
    border-radius: 50%;
    width: 35px;
    height: 35px;
    cursor: pointer
}

.line {
    height: 1px;
    width: 30%;
    background-color: #E0E0E0;
    margin-top: 10px
}

.or {
    width: 10%;
    font-weight: bold
}

.text-sm {
    font-size: 14px !important
}

::placeholder {
    color: #BDBDBD;
    opacity: 1;
    font-weight: 300
}

:-ms-input-placeholder {
    color: #BDBDBD;
    font-weight: 300
}

::-ms-input-placeholder {
    color: #BDBDBD;
    font-weight: 300
}

input,
textarea {
    padding: 10px 12px 10px 12px;
    border: 1px solid lightgrey;
    border-radius: 2px;
    margin-bottom: 5px;
    margin-top: 2px;
    width: 100%;
    box-sizing: border-box;
    color: #2C3E50;
    font-size: 14px;
    letter-spacing: 1px
}

input:focus,
textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid #304FFE;
    outline-width: 0
}

button:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    outline-width: 0
}

a {
    color: inherit;
    cursor: pointer
}

.btn-blue {
    background-color: #1A237E;
    width: 150px;
    color: #fff;
    border-radius: 2px
}

.btn-blue:hover {
    background-color: #000;
    cursor: pointer
}

.bg-blue {
    color: #fff;
    background-color: rgb(22, 50, 92);
}

@media screen and (max-width: 991px) {
    .logo {
        margin-left: 0px
    }

    .image {
        width: 300px;
        height: 220px
    }

    .border-line {
        border-right: none
    }

    .card2 {
        border-top: 1px solid #EEEEEE !important;
        margin: 0px 15px
    }
}
</style>
<div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
    <div class="card card0 border-0">
        <div class="row d-flex">
            <div class="col-lg-6 my-auto">
                <div class="card1 pb-5">
                    <div class="row px-3 justify-content-center mt-5 mb-5 border-line"> <img src="{{asset('images/register.svg')}}" class="image"> </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card2 card border-0 px-4 py-5">
                    <div class="row mt-3"> 
                       <div class="line"></div><h4 class="mx-auto"> Daftar Akun </h4><div class="line"></div> 
                    </div>
                    <div class="row px-3 mb-4">

                    </div>
                    @include('admin.layouts.alert')

                    <form method="POST" action="/registerTest">
                    @csrf
                    <div class="row px-3"> 
                        <label class="mb-1">
                            <h6 class="mb-0 text-sm">Nama</h6>
                        </label>    
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required placeholder="Masukkan nama lengkap..." autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="row px-3 mt-2"> 
                        <label class="mb-1">
                            <h6 class="mb-0 text-sm">NIM/NIP/NPI</h6>
                        </label> 
                        <input id="nim" type="text" class="form-control @error('nim') is-invalid @enderror" name="nim" value="{{ old('nim') }}" required placeholder="Masukkan nomor induk mahasiswa/pengajar..." autocomplete="nim" autofocus minlength="6">
                        @error('nim')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="row px-3 mt-2"> 
                        <label class="mb-1">
                            <h6 class="mb-0 text-sm">Program Studi</h6>
                        </label> 
                        <select class="form-control @error('prodi') is-invalid @enderror" name="prodi" value="{{ old('prodi') }}" required autocomplete="prodi" autofocus id="prodi">
                            <option selected disabled value="">==== Pilih program studi ====</option>
                            <option value="Komunikasi">A - Komunikasi</option>
                            <option value="Ekowisata">B - Ekowisata</option>
                            <option value="Manajemen Informatika">C - Manajemen Informatika</option>
                            <option value="Teknik Komputer">D - Teknik Komputer</option>
                            <option value="Supervisor Jaminan Mutu Pangan">E - Supervisor Jaminan Mutu
                                Pangan
                            <option value="Manajemen Industri Jasa Makanan dan Gizi">F - Manajemen Industri
                                Jasa
                                Makanan dan Gizi</option>
                            <option value="Teknologi Industri Benih">G - Teknologi Industri Benih</option>
                            <option value="Teknologi dan Manajemen Ternak">H - Teknologi dan Manajemen
                                Ternak
                            </option>
                            <option value="Teknologi Produksi dan Manajemen Perikanan Budidaya">I -
                                Teknologi
                                Produksi dan Manajemen Perikanan Budidaya</option>
                            <option value="Manajemen Agribisnis">J - Manajemen Agribisnis</option>
                            <option value="Manajemen Industri">K - Manajemen Industri</option>
                            <option value="Analisis Kimia">L - Analisis Kimia</option>
                            <option value="Teknik dan Manajemen Lingkungan">M - Teknik dan Manajemen
                                Lingkungan
                            </option>
                            <option value="Paramedik Veteriner">N - Paramedik Veteriner</option>
                            <option value="Teknologi Produksi dan Manajemen Perkebunan">O - Teknologi
                                Produksi
                                dan
                                Manajemen Perkebunan</option>
                            <option value="Teknologi Produksi dan Pengembangan Masyarakat Pertanian">
                                P - Teknologi
                                Produksi dan Pengembangan Masyarakat Pertanian</option>
                            </option>
                        </select>
                        @error('prodi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="row px-3 mt-2 position-relative"> 
                        <label class="mb-1">
                            <h6 class="mb-0 text-sm">E-mail</h6>
                        </label> 
                        <input id="email" type="text" placeholder="Masukkan username akun IPB..." class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                         <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2" style="position: absolute; right: 16px; top: 23px">@apps.ipb.ac.id</span>
  </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="row px-3 mt-2"> 
                        <label class="mb-1">
                            <h6 class="mb-0 text-sm">Sandi</h6>
                        </label> 
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan kata sandi..." name="password" required autocomplete="new-password" minlength="8" onchange=onChange()>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="row px-3 mt-2"> 
                        <label class="mb-1">
                            <h6 class="mb-0 text-sm">Konfirmasi Sandi</h6>
                        </label> 
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi password..." required autocomplete="new-password" onchange=onChange()>
                    </div>
                   
                    <div class="row mb-3 px-3"> 
                        <button type="submit" class="btn biru-unggulan-button btn-block"
                        style="border: none;">
                        <span style="font-size:1.2rem montserrat">{{ __('DAFTAR') }}</span>
                        </button> 
                    </div>
                    <div class="row mb-4 px-3"> 
                        <p class="font-weight-bold">Sudah punya akun? <a class="text-primary" href="/login"> Masuk </a>
                        </p> 
                    </div>
                </form>
                </div>
            </div>
        </div>
        <div class="bg-blue py-4">
            <div class="row px-3"> <p class="ml-4 ml-sm-5 mb-2">Hak Cipta &copy; Sekolah Vokasi Universitas IPB 2021. All rights reserved.</p>
                <div class="social-contact ml-4 ml-sm-auto"> <span class="fa fa-facebook mr-4 text-sm"></span> <span class="fa fa-google-plus mr-4 text-sm"></span> <span class="fa fa-linkedin mr-4 text-sm"></span> <span class="fa fa-twitter mr-4 mr-sm-5 text-sm"></span> </div>
            </div>
        </div>
    </div>
</div>
<script>
    function onChange() {
      const password = document.querySelector('input[name=password]');
      const confirm = document.querySelector('input[name=password_confirmation]');
      if (confirm.value === password.value) {
        confirm.setCustomValidity('');
      } else {
        confirm.setCustomValidity('Passwords do not match');
      }
    }
</script>
@endsection