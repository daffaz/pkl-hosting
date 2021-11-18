@extends('admin.layouts.master')
@section('title', 'Admin - Request Surat Bebas Pustaka')
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
                                        Nama
                                    </th>

                                    <th class="text-right">
                                        Status
                                    </th>
                                </thead>
                                <tbody>
                                    @if (!$sbp->count())
                                        <tr>
                                            <td colspan="5" class="text-center"><i>Data request kosong</i></td>
                                        </tr>
                                    @else
                                        @foreach ($sbp as $b)
                                            <tr>
                                                <td>
                                                    <span class="d-inline-flex">
                                                        <a href="/administrator/sbp/{{ $b->id }}/accept"
                                                            class="btn btn-primary btn-sm text-capitalize font-weight-normal">Approve
                                                        </a>
                                                        <form action="/administrator/sbp/{{ $b->id }}/delete"
                                                            method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                onclick="return confirm('Yakin ingin menghapus request SBP?')"
                                                                href="/administrator/sbp/{{ $b->id }}/sbp"
                                                                class="ml-1 btn btn-danger btn-sm text-capitalize font-weight-normal">Reject</button>
                                                        </form>
                                                    </span>
                                                </td>
                                                <td>
                                                    {{ $b->requester }}
                                                </td>
                                                <td class="text-right">
                                                    @if ($b->status == 0)
                                                        Belum diterima
                                                    @else
                                                        Diterima
                                                    @endif
                                                </td>
                                            </tr>
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
