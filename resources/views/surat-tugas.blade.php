@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ '/home' }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Surat Tugas</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ '/home' }}">Dashboard</a></div>
            <div class="breadcrumb-item">Surat Tugas</div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <x-alert />

                <div class="card">
                    <div class="card-header">
                        <h4>Input Surat Tugas</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('surat-tugas.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nomor_surat">Nomor Surat</label>
                                <input type="text" name="nomor_surat" id="nomor_surat" class="form-control"
                                    value="{{ old('nomor_surat') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="pekerjaan">Pekerjaan</label>
                                <select name="pekerjaan_id" id="pekerjaan" class="form-control selectric">
                                    @foreach ($pekerjaan as $id => $nama)
                                        <option value="{{$id}}">{{$nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tgl_mulai">Tgl. Mulai</label>
                                <input type="date" name="tgl_mulai" id="tgl_mulai" class="form-control"
                                    value="{{ old('tgl_mulai') }}" required>
                            </div>

                            <div class="form-group">
                                <label for="tgl_selesai">Tgl. Selesai</label>
                                <input type="date" name="tgl_selesai" id="tgl_selesai" class="form-control"
                                    value="{{ old('tgl_selesai') }}" required>
                            </div>

                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection
