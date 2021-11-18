<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Selamat datang di Maca</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Montserrat:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    {{-- FONTAWESOME --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />
</head>

<body>
    <script src="{{ asset('js/app.js') }}"></script>

    <nav class="navbar navbar-expand-lg navbar-dark p-0 m-0" style="background-color: #215D98">
        <a class="navbar-brand logo text-white font-weight-bolder py-2 px-3" href="{{ route('landing') }}"
            style="font-size: 2rem;background-color: #219898">M</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav w-100">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item ml-auto mr-5">
                            {{-- TRIGGET MODAL --}}
                            <a href="#" class="nav-link text-white" data-toggle="modal" data-target="#exampleModal"
                                style="font-size: 18px">Login</a>
                            {{-- <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a> --}}
                        </li>
                    @endif
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Log in</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="d-flex flex-column justify-content-center">
                                        <img src="{{ asset('images/sv.svg') }}" alt="SV" class="img-fluid mx-auto my-2"
                                            width="300" height="300">
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="form-group row mx-3 mt-4">
                                                <div class="col-md">
                                                    <input id="email" type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        placeholder="Email" name="email" value="{{ old('email') }}"
                                                        required autocomplete="email" autofocus
                                                        style="background-color: #BFF3F6">

                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row mx-3 mt-3">
                                                <div class="col-md">
                                                    <input id="password" type="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        name="password" placeholder="Password" required
                                                        autocomplete="current-password" style="background-color: #BFF3F6">

                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row mx-3 mt-4 mb-5">
                                                <div class="col-md">
                                                    <button type="submit" class="btn biru-unggulan-button btn-block"
                                                        style="border: none;">
                                                        <span style="font-size:1.2rem">{{ __('Log in') }}</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endguest
                </div>
            </ul>
        </div>
    </nav>
    '<div class="container montserrat">
        <section class="min-vh-100 mt-4">
            <h3 class="heading-size font-weight-bold w-25 mx-auto text-center" style="color: #16325C">Lorem ipsum dolor
                sit
                amet
            </h3>
            <div class="text-center mt-3 mb-4">
                <span class="heading-size font-weight-bold">100</span>&nbsp;&nbsp;Buku fisik &nbsp;&nbsp;&nbsp; <span
                    class="heading-size font-weight-bold">100</span>&nbsp;&nbsp;E-Book
                <span class="heading-size font-weight-bold">100</span>&nbsp;&nbsp;Jurnal
            </div>
            <div class="d-flex justify-content-center mt-3">
                <a href="#" class="nav-link text-white" data-toggle="modal" data-target="#exampleModal">
                    <button class="btn py-2 px-5 mt-n2 biru-unggulan-button text-white mx-auto"
                        style="border: none">Mulai
                        sekarang
                    </button>
                </a>
            </div>
            <h3 class="heading-size font-weight-bold text-center w-50 mx-auto mt-5" style="color: #16325C">Baca e-book
                dan jurnal dengan mudah disini
            </h3>
            <div class="my-5 d-flex justify-content-center"><img class="w-75 img-fluid"
                    src="{{ asset('images/landing_hero2.svg') }}" alt="hero2">
            </div>
            <h3 class="heading-size font-weight-bold text-center mt-5" style="color: #16325C">
                Pinjam Buku Fisik
            </h3>
            <p class="text-center mx-auto my-4 paragraph-size w-75" style="color: #16325C">Melalui sistem pencatatan dan
                pengingat
                di
                website ini, kamu
                ga perlu lagi untuk
                takut kelupaan mengembalikan buku.</p>
            <div class="my-5 d-flex justify-content-center"><img class="w-75 img-fluid"
                    src="{{ asset('images/landing_hero3.svg') }}" alt="hero2">
            </div>
            <h3 class="heading-size font-weight-bold text-center mt-5" style="color: #16325C">
                Tidak Bajakan
            </h3>
            <p class="text-center mx-auto my-4 paragraph-size w-50" style="color: #16325C">Buku fisik, e-book, maupun
                jurnal
                yang terdapat di website ini bukanlah bajakan dan mempunyai legalitas hukum yang kuat</p>
            <div class="my-5 d-flex justify-content-center"><img class="w-75 img-fluid"
                    src="{{ asset('images/landing_hero4.svg') }}" alt="hero2">
            </div>

            <h3 class="heading-size font-weight-bold text-center mt-5" style="color: #16325C">
                Hak Cipta
            </h3>
            <p class="text-center mx-auto my-4 paragraph-size w-50" style="color: #16325C">Segala jenis pembajakan
                terhadap
                website ini akan kami tindak tegas dengan hukum yang berlaku</p>
            <div class="my-5 d-flex justify-content-center"><img class="w-75 img-fluid"
                    src="{{ asset('images/landing_hero5.svg') }}" alt="hero2">
            </div>

            <h3 class="heading-size font-weight-bold text-center mt-5" style="color: #16325C">
                Mulai membaca
            </h3>
            <p class="text-center mx-auto my-4 paragraph-size w-50" style="color: #16325C">Ilmu dan wawasan yang luas
                dimulai dari membaca buku dan mengolah informasi secara benar</p>
            <div class="d-flex justify-content-center mt-3 mb-5">
                <a href="#" class="nav-link text-white" data-toggle="modal" data-target="#exampleModal">
                    <button class="btn py-2 px-5 mt-n2 biru-unggulan-button text-white mx-auto"
                        style="border: none">Mulai
                        sekarang</button>
                </a>
            </div>
        </section>
    </div>
    <footer>
        <br>
        <div class="container">

            <div class="row">
                <div class="col-sm">

                    <p><img src="{{ asset('images/M.svg') }}" alt=""> maca</p>
                    <br>
                    <br>
                    <br>
                    <br>
                    <p class="copy">&copy; 2021 IPB University</p>
                </div>
                <div class="col-sm">
                    <p>LAYANAN<br>
                        <a class="link" href="#">Buku</a><br>
                        <a class="link" href="#">E-Book</a><br>
                        <a class="link" href="#">Dashboard</a><br>
                        <a class="link" href="#">Denda</a><br>
                        <a class="link" href="#">Bantuan</a>
                    </p>
                </div>
                <div class="col-sm">
                    <p>DUKUNGAN<br>
                        <a class="link" href="#">Tentang Maca</a><br>
                        <a class="link" href="#">Ketentuan</a><br>
                        <a class="link" href="#">Kebijakan Privasi</a><br>
                    </p>
                </div>
                <div class="col-sm">
                    <p>IKUTI KAMI DI<br>
                        <a class="link" href="#">Facebook</a><br>
                        <a class="link" href="#">Instagram</a><br>
                        <a class="link" href="#">Twitter</a><br>
                    </p>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
