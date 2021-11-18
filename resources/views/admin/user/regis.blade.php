@extends('admin.layouts.master')
@section('title', 'Admin - Registrasi user')
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
                                    <th>
                                        NIM
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th class="text-right">
                                        Status
                                    </th>
                                </thead>
                                <tbody>
                                    @if (!$user->count())
                                        <tr>
                                            <td colspan="5" class="text-center"><i>Data user kosong</i></td>
                                        </tr>
                                    @else
                                        @foreach ($user as $b)
                                            <tr>
                                                <td>
                                                    <span class="d-inline-flex">
                                                        <a href="/administrator/user/{{ $b->id }}/accregis"
                                                            class="btn btn-primary btn-sm text-capitalize font-weight-normal">Approve
                                                        </a>
                                                        <form action="/administrator/user/{{ $b->id }}/delete"
                                                            method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit"
                                                                onclick="return confirm('Yakin ingin menghapus user?')"
                                                                href="/administrator/user/{{ $b->id }}/delete"
                                                                class="ml-1 btn btn-danger btn-sm text-capitalize font-weight-normal">Reject</button>
                                                        </form>
                                                    </span>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-warning btn-fab btn-icon btn-round" data-toggle="modal" data-target="#pinjamModal<?= $b->id?>">
                                                        <i
                                    class="nc-icon nc-tag-content"></i>
                                                        </button>
                                                    {{ $b->name }}
                                                </td>
                                                <td>
                                                    {{ $b->nim }}
                                                </td>
                                                <td>
                                                    {{ $b->email }}
                                                </td>
                                                <td class="text-right">
                                                    {{ $b->civitas->nama }}
                                                </td>
                                            </tr>
                                            {{-- MODAL SECTION --}}
    <div class="modal fade modal-show-custom" id="pinjamModal<?=$b->id?>" tabindex="-1" role="dialog"
            aria-labelledby="pinjamModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pinjamModalLabel">Detail user</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body d-flex flex-column">
                            {{--PHOTO--}}
                            <div></div>
                            {{--END PHOTO--}}
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input id="nama" readonly type="text" class="form-control" value="<?= $b->name ?>" />
                            </div>
                            <div class="form-group">
                                <label for="nim">NIM</label>
                                <input id="nim" readonly type="text" class="form-control" value={{ $b->nim }} />
                            </div>
                            <div class="form-group">
                                <label for="email">Nama</label>
                                <input id="email" readonly type="text" class="form-control" value={{ $b->email }} />
                            </div>
                            <div class="form-group">
                                <label for="prodi">Program studi</label>
                                <input id="prodi" type="text" class="form-control" readonly value="<?= $b->prodi ?>" />
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <input id="status" readonly type="text" class="form-control" value={{ $b->civitas->nama }} />
                            </div>
                            <div class="form-group">
                                <label for="tgl">Tanggal registrasi</label>
                                <input id="tgl" readonly type="text" class="form-control" value="<?= date("j F Y, g:i a", strtotime($b->created_at))?>" />
                            </div>
                            <div class="form-group d-flex justify-content-center">
                                <h6 class="mt-3">Registrasi pada : {{ $b->created_at->diffForHumans() }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- END MODAL SECTION --}}
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{-- {{ $buku->links() }} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
