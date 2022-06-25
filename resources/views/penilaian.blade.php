@extends('layouts.app')
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <section class="section">
                <div class="section-header">
                    <div class="section-header-back">
                        <a href="{{ '/home' }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                    </div>
                    <h1>Penilaian</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="{{ '/home' }}">Dashboard</a></div>
                        <div class="breadcrumb-item">Penilaian</div>
                    </div>
                </div>
                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <x-alert />
                            <div class="card">
                                <div class="card-header">
                                    <h4>Penilaian Mitra</h4>
                                </div>
                                <div class="card-body">

                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                    <form action="{{route('penilaian.store')}}" method="POST">
                                        @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                        <form action="{{route('penilaian.store')}}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="user_id">Nama :</label>
                                                <select name="user_id" id="user_id" class="form-control">
                                                    @foreach($user as $u)
                                                    <option value="{{$u->id}}">{{$u->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @foreach ($kriteria as $cw)
                                            <div class="form-group">
                                                <label for="kriteria[{{$cw->id}}]">{{$cw->namaKriteria}} :</label>
                                                <select class="form-control" id="criteria[{{$cw->id}}]" name="criteria[{{$cw->id}}]">
                                                    @php
                                                    $res = $subkriteria->where('kriteria_id', $cw->id)->all();
                                                    @endphp

                                                    @foreach ($res as $cr)
                                                    <option value="{{$cr->id}}">{{$cr->keterangan}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @endforeach
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Daftar Penilaian</h4>
                                </div>
                                <div class="card-body">
                                    @foreach ($user as $a)
                                    
                                        <h2 class="section-title">{{ $a->name}}</h2>
                                        <div class="row justify-content-start">
                                            <div class="col-6">
                                                @php
                                                $scr = $scores->where('ida', $a->id)->all();
                                                @endphp
                                                @foreach ($kriteria as $c)
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    {{$c->namaKriteria}}
                                                </li>
                                                @endforeach
                                            </div>
                                            <div class="col-6">
                                                @foreach ($scr as $s)
                                                <li class="list-group-item text-center">
                                                    {{$s->rating}}
                                                </li>
                                                @endforeach
                                            </div>
                                        </div>
                                    
                                    @endforeach



                                    <!-- <table id="mytable" class="display nowrap table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            @foreach ($kriteria as $c)
                                            <th>{{$c->namaKriteria}}</th>
                                            @endforeach
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($user as $a)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $a->name}}</td>
                                            @php
                                            $scr = $scores->where('ida', $a->id)->all();
                                            @endphp
                                            @foreach ($scr as $s)
                                            <td>{{$s->rating}}</td>
                                            @endforeach
                                            <td>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </thead>
                                </table> -->


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


        <!-- @push('javascript')
<script>
    $(function() {
        $('#tableTugas').on('click', 'button.btn-delete', function() {
            if (confirm('Yakin hapus penugasan?')) {
                $('#formDeletePenugasan').attr('action', $(this).data('action')).submit();
            }
        });
    });
</script>
@endpush -->