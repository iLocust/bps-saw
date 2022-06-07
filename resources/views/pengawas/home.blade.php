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
    <div class="card">
        <div class="card-header">
            <h4>Daftar Pegawai Aktif</h4>
            <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info" href="#"><i class="fas fa-minus"></i></a>
        </div>
        <div class="collapse hide" id="mycard-collapse">

            <div class="card-body">
                <div class="table-responsive-md">
                    <table class="table">
                        <caption>List of users : {{count($data)}}</caption>
                        <thead>
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">NIM</th>
                            </tr>
                        </thead>
                        @foreach($data as $item)
                            <tbody>
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->nim }}</td>
                                </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
