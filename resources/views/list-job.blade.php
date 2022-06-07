@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ '/home' }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>List Tugas Aktif</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ '/home' }}">Dashboard</a></div>
            <div class="breadcrumb-item">List Tugas Aktif</div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <x-alert />
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive-md">
                        <table class="table" id="tableTugas">
                            <thead>
                                <tr>
                                    <th>Pekerja</th>
                                    <th scope="col">Nama Pekerjaan</th>
                                    <th scope="col">Surat Tugas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $item)
                                    <tr>
                                        <th>{{ $item->name }}</th>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->nomor }}</td>
                                        <td><button class="btn btn-outline-primary btn-delete"
                                                data-action="{{ route('list-job.delete', $item->id) }}"><i
                                                    class="fas fa-trash"></i> Hapus</button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $data->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<form method="POST" id="formDeletePenugasan">
    @method('DELETE')
    @csrf
</form>
@endsection

@push('javascript')
    <script>
        $(function () {
            $('#tableTugas').on('click', 'button.btn-delete', function () {
                if (confirm('Yakin hapus penugasan?')) {
                    $('#formDeletePenugasan').attr('action', $(this).data('action')).submit();
                }
            });
        });

    </script>
@endpush
