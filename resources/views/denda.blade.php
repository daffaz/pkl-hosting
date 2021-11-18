@extends('layouts.master')
@section('content')
    <div class="container my-5">
        <div class="border bg-light shadow p-3 w-75 ml-5" style="border-radius:20px;">
            <div class="denda"><i class="fas fa-money-bill"></i> Total dendamu: <span class="denda2">Rp10.000,-</span></div>
        </div>
        <div class="isi2 p-3 my-5"><i class="far fa-clock"></i> Buku Yang Terkena Denda (Overtime)</div>
        <!-- card untuk buku -->
        <!-- buku#1 -->
        <div class="row">
            <div>
                <div class="card border-0 bg-transparent ml-5" style="width: 18rem;">
                    <img class="card-img-top" src="{{ asset('images/hp2.svg') }}" alt="Card image cap"
                        style="border:5px solid white; border-radius:20px;">
                    <div class="card-body bg-white mt-5 shadow" style="border:5px solid white; border-radius:20px;">
                        <div class="card-title">
                            <h5 class="sub3">Harry Poter (2 hari)</h5>
                        </div>
                        <div class="card-text text-center"><span class="isi4 mx-auto">Rp1.000,-</span></div>
                    </div>
                </div>
            </div>
            <!-- buku#2 -->
            <div>
                <div class="card border-0 bg-transparent ml-5" style="width: 18rem;">
                    <img class="card-img-top" src="{{ asset('images/hp1.svg') }}" alt="Card image cap"
                        style="border:5px solid white; border-radius:20px;">
                    <div class="card-body bg-white mt-5 shadow" style="border:5px solid white; border-radius:20px;">
                        <div class="card-title">
                            <h5 class="sub3">Harry Poter (2 hari)</h5>
                        </div>
                        <div class="card-text text-center"><span class="isi4 mx-auto">Rp1.000,-</span></div>
                    </div>
                </div>
            </div>
            <div>
                <div class="card border-0 bg-transparent ml-5" style="width: 18rem;">
                    <img class="card-img-top" src="{{ asset('images/hp2.svg') }}" alt="Card image cap"
                        style="border:5px solid white; border-radius:20px;">
                    <div class="card-body bg-white mt-5 shadow" style="border:5px solid white; border-radius:20px;">
                        <div class="card-title">
                            <h5 class="sub3">Harry Poter (2 hari)</h5>
                        </div>
                        <div class="card-text text-center"><span class="isi4 mx-auto">Rp1.000,-</span></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div>
                <div class="card border-0 bg-transparent ml-5" style="width: 18rem;">
                    <img class="card-img-top" src="{{ asset('images/hp2.svg') }}" alt="Card image cap"
                        style="border:5px solid white; border-radius:20px;">
                    <div class="card-body bg-white mt-5 shadow" style="border:5px solid white; border-radius:20px;">
                        <div class="card-title">
                            <h5 class="sub3">Harry Poter (2 hari)</h5>
                        </div>
                        <div class="card-text text-center"><span class="isi4 mx-auto">Rp1.000,-</span></div>
                    </div>
                </div>
            </div>
            <!-- buku#2 -->
            <div>
                <div class="card border-0 bg-transparent ml-5" style="width: 18rem;">
                    <img class="card-img-top" src="{{ asset('images/hp1.svg') }}" alt="Card image cap"
                        style="border:5px solid white; border-radius:20px;">
                    <div class="card-body bg-white mt-5 shadow" style="border:5px solid white; border-radius:20px;">
                        <div class="card-title">
                            <h5 class="sub3">Harry Poter (2 hari)</h5>
                        </div>
                        <div class="card-text text-center"><span class="isi4 mx-auto">Rp1.000,-</span></div>
                    </div>
                </div>
            </div>
            <div>
                <div class="card border-0 bg-transparent ml-5" style="width: 18rem;">
                    <img class="card-img-top" src="{{ asset('images/hp2.svg') }}" alt="Card image cap"
                        style="border:5px solid white; border-radius:20px;">
                    <div class="card-body bg-white mt-5 shadow" style="border:5px solid white; border-radius:20px;">
                        <div class="card-title">
                            <h5 class="sub3">Harry Poter (2 hari)</h5>
                        </div>
                        <div class="card-text text-center"><span class="isi4 mx-auto">Rp1.000,-</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
