@extends('admin.layouts.master')
@section('title', 'Admin dashboard')
@section('content-atas')

    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-book-bookmark text-primary"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Buku</p>
                                <p class="card-title">{{ $countBuku }}
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <a href="/administrator" class="text-secondary" style="text-decoration: none">
                            <i class="fa fa-refresh"></i>
                            Update Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-tv-2 text-danger"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Ebook</p>
                                <p class="card-title">{{ $countEbook }}
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <a href="/administrator" class="text-secondary" style="text-decoration: none">
                            <i class="fa fa-clock-o"></i>
                            Update Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-success">
                                <i class="nc-icon nc-bullet-list-67 text-success"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Peminjaman</p>
                                <p class="card-title">{{ $countPeminjaman }}
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <a href="/administrator" class="text-secondary" style="text-decoration: none">
                            <i class="fa fa-refresh"></i>
                            Update Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-send text-warning"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Jurnal</p>
                                <p class="card-title">{{ $countJurnal }}
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <hr>
                    <div class="stats">
                        <a href="/administrator" class="text-secondary" style="text-decoration: none">
                            <i class="fa fa-calendar-o"></i>
                            Update Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">List buku fisik</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        Judul
                                    </th>
                                    <th>
                                        Kategori
                                    </th>
                                    <th>
                                        Penulis
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th class="text-right">
                                        Kuantitas
                                    </th>
                                </thead>
                                <tbody>
                                    @if (!$buku->count())
                                        <tr>
                                            <td colspan="5" class="text-center"><i>Data buku kosong</i></td>
                                        </tr>
                                    @else
                                        @foreach ($buku as $b)
                                            <tr>
                                                <td>
                                                    {{ $b->judul }}
                                                </td>
                                                <td>
                                                    {{ $b->kategori }}
                                                </td>
                                                <td>
                                                    {{ $b->penulis }}
                                                </td>
                                                <td>
                                                    {{ $b->quantity < 1 ? 'Tidak tersedia' : $b->status }}
                                                </td>
                                                <td class="text-right">
                                                    {{ $b->quantity }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif

                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{ $buku->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="content">
        <div class="row">
            <div class="col">
                <div class="card pb-5">
                    <div class="card-header">
                        <h4 class="card-title">Perbandingan buku, ebook dan jurnal</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-start">
                            <div id="chart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header position-relative">
                        <h4 class="card-title">Pengguna Maca</h4>
                        <img src="{{ asset('images/logo.svg') }}" class="position-absolute" style="top: 50%; right: 21rem;transform:translateY(-20%);width: 2em;">
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        Nama
                                    </th>
                                    <th>
                                        NIM
                                    </th>
                                    <th class="text-right">
                                        Email
                                    </th>
                                </thead>
                                <tbody>
                                    @if (!$user->count())
                                        <tr>
                                            <td colspan="3" class="text-center"><i>Data user kosong</i></td>
                                        </tr>
                                    @else
                                        @foreach ($user as $b)
                                            <tr>
                                                <td>
                                                    {{ $b->name }}
                                                </td>
                                                <td>
                                                    {{ $b->nim }}
                                                </td>
                                                <td class="text-right">
                                                    {{ $b->email }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        var options = {
          series: [{{$countBuku}}, {{$countEbook}}, {{$countJurnal}}],
          chart: {
          width: 450,
          type: 'pie',
        },
        labels: ['Buku', 'E-book', 'Jurnal'],
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>
@endsection
