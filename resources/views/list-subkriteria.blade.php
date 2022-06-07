@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{'/home'}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Subkriteria</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{'/home'}}">Dashboard</a></div>
            <div class="breadcrumb-item">Subkriteria</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <x-alert />
                <div class="card">
                    <div class="card-body">
                        <div class="card-header">
                            <h4>Tambah Subkriteria</h4>
                        </div>
                        <form action="{{route('subkriterias.store')}}" method="POST">
                            @csrf
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kriteria</label>
                                <div class="col-sm-12 col-md-7">
                                    <div class="selectric-wrapper selectric-form-control selectric-selectric selectric-below">
                                        <div class="selectric-hide-select">
                                            <select class="form-control selectric" id="kriteria_id" name="kriteria_id">
                                                @foreach($list as $c)
                                                <option value="{{ $c -> id}}" {{old('namaKriteria', $c->namaKriteria) ? 'selected' : ''}}>{{$c->namaKriteria}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nilai</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="nilai" class="form-control" placeholder="e.g. 2.5" value="{{ old('nilai') }}">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Keterangan</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="keterangan" placeholder="e.g. Good" class="form-control" value="{{ old('keterangan') }}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-7 d-flex justify-content-center">
                                <button class="btn btn-primary ">Save Changes</button>
                            </div>
                        </form>
                        <div class="card-header">
                            
                        <h4>List Subkriteria Aktif</h4>
                        <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info" href="#"><i class="fas fa-minus"></i></a>    
                    </div>
                    <div class="collapse hide" id="mycard-collapse">
                        <div class="table-responsive-md">
                            <table class="table" id="tableTugas">
                                <thead>
                                    <tr>
                                        <th>Nama Kriteria</th>
                                        <th scope="col">Nilai</th>
                                        <th scope="col">Keterangan</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $c)
                                    <tr>
                                        <th>{{ $c-> namaKriteria}}</th>
                                        <th>{{ $c-> nilai}}</th>
                                        <th>{{ $c-> keterangan}}</th>
                                        <td><button class="btn btn-outline-primary btn-delete" data-action="{{ route('subkriterias.delete', $c->id) }}"><i class="fas fa-trash"></i> Hapus</button></td>
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
</section>


<form method="POST" id="formDeletePenugasan">
    @method('DELETE')
    @csrf
</form>
@endsection

@push('javascript')
<script>
    $(function() {
        $('#tableTugas').on('click', 'button.btn-delete', function() {
            if (confirm('Yakin hapus penugasan?')) {
                $('#formDeletePenugasan').attr('action', $(this).data('action')).submit();
            }
        });
    });
</script>
@endpush