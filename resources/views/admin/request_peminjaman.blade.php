@extends('admin.layouts.master')
@section('title', 'Admin - Request Peminjaman')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                @include('admin.layouts.alert')
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        Aksi
                                    </th>
                                    <th>
                                        @sortablelink('civitas_id', 'Title')
                                    </th>
                                    <th>
                                        @sortablelink('buku_id', 'Buku')
                                    </th>
                                    <th>
                                        @sortablelink('user_id', 'Nama')
                                    </th>
                                    <th>
                                        @sortablelink('status')
                                    </th>
                                    <th class="text-center">
                                        Barcode
                                    </th>
                                </thead>
                                <tbody>
                                    @if (!$peminjaman->count())
                                        <tr>
                                            <td colspan="5" class="text-center"><i>Data peminjaman kosong</i></td>
                                        </tr>
                                    @else
                                    @php
                                            $nomor = 1;
                                        @endphp
                                        @foreach ($peminjaman as $b)
                                            <tr>
                                                <td>
                                                    <span class="d-inline-flex">
                                                    <button class="btn btn-primary btn-sm text-capitalize font-weight-normal"
                                                        data-toggle="modal" data-target="#pinjamModal">Aprove
                                                    </button>
                                                    
                                                        
                                                        <form action="/administrator/peminjaman/request/{{ $b->id }}/delete"
                                                            method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                onclick="return confirm('Yakin ingin menghapus peminjaman?')"
                                                                href="/administrator/peminjaman/request/{{ $b->id }}/delete"
                                                                class="ml-1 btn btn-danger btn-sm text-capitalize font-weight-normal">Reject</button>
                                                        </form>
                                                    </span>
                                                </td>
                                                <td>
                                                    {{ $b->civitas->nama }}
                                                </td>
                                                <td>
                                                    {{ $b->buku->judul }}
                                                </td>
                                                <td>
                                                    {{ $b->user->name }}
                                                </td>
                                                <td>
                                                    {{ $b->status }}
                                                </td>
                                                <td class="text-right">
                                                    <span id="printable{{ $nomor }}"><img
                                                            src="data:image/png;base64,{{ DNS1D::getBarcodePNG($b->id, 'C39') }}"
                                                            alt="barcode" />
                                                    </span>
                                                   
                                                    <input type="button" class="btn btn-danger btn-fab p-2"
                                                        onclick="printDiv(`printable{{ $nomor }}`)" value="Print">
                                                    
                                                </td>
                                            </tr>
                                            @php
                                                $nomor++;
                                            @endphp
                                            <div class="modal fade modal-show-custom" id="pinjamModal" tabindex="-1" role="dialog"
                                                aria-labelledby="pinjamModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content" style="border-radius: 20px;">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="pinjamModalLabel">Scan Barcode</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                        <div class="row ml-lg-5 ml-md-0">
                                            <form action="/administrator/peminjaman/accept" method="POST">
                                            @csrf
                                             <input type="text" value="" name="id_pinjam" class="mt-n1" style="height:40px;">
                                            <button type="submit" class="btn btn-primary btn-sm text-capitalize font-weight-normal mt-n1 ml-3" style="height:40px;">Approve
                                            </button>
                                            </form>
                                                        </div>
                                                 </div>
                                                        
                                            </div>

                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{-- {{ $ebook->links() }} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;
            console.log(printContents);
            window.print();

            document.body.innerHTML = originalContents;
        }

    </script>
@endsection
