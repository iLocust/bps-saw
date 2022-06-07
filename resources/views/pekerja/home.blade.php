@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Hi, {{ auth()->user()->name }}</div>
            </div>
            <div class="alert alert-danger alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>×</span>
                    </button>
                    Harap segera melengkapi data diri <br> anda pada bagian <a
                        href="{{ '/setting-details' }}" class="alert-link">Profile Settings</a>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <x-alert />

            <div class="card">
                <div class="card-header">
                    <h4>Daftar Pengguna</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive-md">
                        <table class="table" id="tabelPekerjaan">
                            <caption>Daftar Pekerjaan Aktif : {{ count($penugasan) }}</caption>
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Pekerjaan</th>
                                    <th scope="col">Surat Tugas</th>
                                    <th scope="col">Tgl. Penugasan</th>
                                    <th scope="col">Tgl. Selesai</th>
                                    <th scope="col">Tgl. Diselesaikan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($penugasan as $tugas)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td><a style="color: #495057"
                                                data-action-url="{{ route('pekerja.pekerjaan.selesai', $tugas->id) }}"
                                                class="showModal">{{ $tugas->suratTugas->pekerjaan->nama }}</a>
                                        </td>
                                        <td>{{ $tugas->suratTugas->nomor }}</td>
                                        <td>{{ $tugas->created_at->format('d/m/Y') }}</td>
                                        <td>{{ $tugas->suratTugas->tgl_selesai->format('d/m/Y') }}
                                        </td>
                                        <td>{{ $tugas->realisasi ? $tugas->realisasi->tgl_selesai->format('d/m/Y') : '-' }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Selesaikan perkerjaan </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Selesaikan pekerjaan?</p>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="btnSubmit">Lanjutkan</button>
            </div>
            <form id="formPengguna" class="d-none" method="POST">
                @csrf
            </form>
        </div>
    </div>
</div>
</div>
@endsection

@push('javascript')
    <script>
        $(function () {
            $('#tabelPekerjaan').on('click', 'a.showModal', function (e) {
                e.preventDefault();
                $('#modal').modal('toggle');
                $('#formPengguna').attr('action', $(this).data('actionUrl'));
                $('#btnSubmit').click(function () {
                    console.log('clicked')
                    $('#formPengguna').submit();
                })
            })
        });

    </script>
@endpush
