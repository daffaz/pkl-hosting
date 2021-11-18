<nav class="navbar navbar-expand-lg navbar-dark p-0 m-0 nav-text-responsive" style="background-color: #215D98;z-index:11;">
    <a class="navbar-brand logo text-white font-weight-bolder py-2 px-3" href="{{ route('home') }}"
        style="font-size: 2rem;background-color: #219898">M</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse nav-responsive" id="navbarSupportedContent">
        <ul class="navbar-nav w-100">

            <li class="nav-item position-relative mt-2" style="font-size: 18px">
                <a class="text-white nav-link nav-utama font-weight-bold" href="/kategori-buku">Buku
                    {!! request()->is('kategori-buku*') ? '<span class="underline"></span>' : '' !!}</a>
            </li>
            <li class="nav-item position-relative mt-2" style="font-size: 18px">
                <a class="text-white nav-link nav-utama font-weight-bold" href="/kategori-ebook">E-Book{!! request()->is('kategori-ebook*')
    ? '<span
                        class="underline"></span>'
    : '' !!}</a>
            </li>
            <li class="nav-item position-relative mt-2" style="font-size: 18px">
                <a class="text-white nav-link nav-utama font-weight-bold " href="/favorit">Favorit
                    {!! request()->is('favorit*') ? '<span class="underline"></span>' : '' !!}</a>
            </li>
            <li class="nav-item position-relative mt-2" style="font-size: 18px">
                <a class="text-white nav-link nav-utama font-weight-bold " href="/bantuan">Bantuan{!! request()->is('bantuan*')
    ? '<span
                        class="underline"></span>'
    : '' !!}</a>
            </li>

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
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
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
                                                    placeholder="Email" name="email" value="{{ old('email') }}" required
                                                    autocomplete="email" autofocus style="background-color: #BFF3F6">

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
                                                <button type="submit" class="btn btn-primary btn-block"
                                                    style="background-color: #2DD9FF; border: none;">
                                                    <span style="font-size:1.2rem">{{ __('Log in') }}</span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @else



                    <li class="nav-item position-relative ml-lg-auto nav-profil-responsive mx-lg-0">
                        <div class="d-flex align-items-center" style="margin-right: 50px;">
                            <div>
                                <button class="btn d-flex text-left btn-nav" type="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    style="outline: none;">
                                    <span class="w-48 avatar gd-warning">
                                        <?php
                                        $arr = explode(' ', Auth::user()->name);
                                        echo count($arr) > 1 ? strtoupper($arr[0][0] . $arr[1][0]) : strtoupper($arr[0][0] .
                                        $arr[0][1]);
                                        ?>
                                    </span>
                                    <div class="d-flex flex-column ml-3 text-white">
                                        <div>{{ count($arr) > 2 ? $arr[0]." ".$arr[1] : Auth::user()->name }}</div>
                                        <div>{{ Auth::user()->nim }}</div>
                                    </div>
                                    {{-- < class="btn btn-transparent ml-2 text-white" href="#" role="button"  style="outline: none"> --}}
                                    <div>
                                        <i style="font-size: 1.6rem" class="fas fa-caret-down text-white ml-3 mt-2"></i>
                                    </div>

                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="/home">Beranda</a>
                                    <a class="dropdown-item"
                                        href="/profil/{{ strtolower(Auth::user()->name) }}">Profil</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        {{ __('Keluar') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>
                @endguest
            </div>
        </ul>
    </div>
</nav>
