@extends('admin.layouts.master')
@section('title', 'Admin - Bantuan')
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
                                        Pengirim
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Subyek
                                    </th>
                                    <th class="text-right">
                                        Pesan
                                    </th>
                                </thead>
                                <tbody>
                                    @if (!$bantuan->count())
                                        <tr>
                                            <td colspan="5" class="text-center"><i>Data user kosong</i></td>
                                        </tr>
                                    @else
                                        @foreach ($bantuan as $b)
                                            <tr>
                                                <td>
                                                    {{ $b->pengirim }}
                                                </td>
                                                <td data-toggle="tooltip" data-placement="bottom" title={{ $b->emailAlt ?? "" }}>
                                                    {{ $b->email }}
                                                </td>
                                                <td>
                                                    {{ $b->subjek }}
                                                </td>
                                                <td class="text-right">
                                                    {{ $b->pesan }}
                                                </td>
                                            </tr>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript">
   $(document).ready(function() {
    $("body").tooltip({ selector: '[data-toggle=tooltip]' });
});
    </script>
@endsection
