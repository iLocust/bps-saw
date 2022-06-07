@extends('layouts.app')
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h4>Menambahkan Kriteria</h4>
                    </div>
                    <div class="card-body">
                        <form id="form" method="POST" action="{{ route('kriterias.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="nomor_surat">Nama kriteria :</label>
                                <input type="text" name="namaKriteria" id="namaKriteria" placeholder="e.g. Kecepatan Pengumpulan" class="form-control" value="{{ old('nomor_surat') }}" required>
                            </div>
                            <div class="form-group">
                                    <label for="type">Type :</label>
                                    <select class="form-control" id="type" name="type">
                                        <option value="benefit">Benefit</option>
                                        <option value="cost">Cost</option>
                                    </select>
                                </div>
                            <div class="form-group">
                                <label for="nomor_surat">Bobot</label>
                                <input type="text" name="bobot" id="bobot" class="form-control" value="{{ old('nomor_surat') }}" placeholder="e.g. 2.5" required>
                            </div>

                            <div class="panel-bottom">
                                <button type="submit" id="buttonsimpan" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                <button type="reset" id="buttonreset" class="btn btn-danger">Reset</button>
                            </div>
                        </form>
                    </div>



                    <div class="card-header">
                        <h4>Daftar Kriteria Aktif</h4>
                        
                    </div>
                    
                        <div class="card-body">
                            <div class="table-responsive-md">
                                <table class="table" id="tableTugas">
                                    <caption>List of criterias : {{count($data)}}</caption>
                                    <thead>
                                        <tr>
                                            <th scope="col">Nama Kriteria</th>
                                            <th scope="col">Sifat</th>
                                            <th scope="col">Bobot</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    @foreach($data as $item)
                                    <tbody>
                                        <tr>
                                            <td>{{ $item->namaKriteria }}</td>
                                            <td>{{ $item->type }}</td>
                                            <td>{{ $item->bobot }}</td>
                                            <td><button class="btn btn-outline-primary btn-delete" data-action="{{ route('kriterias.delete', $item->id) }}"><i class="fas fa-trash"></i> Hapus</button></td>
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
</div>
</section>
@if (\Session::has('success'))
<div class="alert alert-success">
    <ul>
        <li>{!! \Session::get('success') !!}</li>
    </ul>
</div>
@endif

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