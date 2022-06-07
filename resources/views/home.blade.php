@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Hi, {{auth()->user()->name}}</div>



            </div>
            <div class="alert alert-danger alert-dismissible show fade">
                <div class="alert-body">
                  <button class="close" data-dismiss="alert">
                    <span>×</span>
                  </button>
                  Harap segera melengkapi data diri <br> anda pada bagian  <a href="{{'/setting-details'}}" class="alert-link">Profile Settings</a>
                </div>
            </div>
        </div>

    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header"><h4>Daftar Pengguna</h4></div>
                <div class="card-body">
                    <div class="table-responsive-md">

                        @unless (auth()->user()->isPekerja())
                        <table class="table">
                            <caption>List of users</caption>
                            <thead>
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Role</th>
                                <th scope="col">Edit</th>
                            </tr>
                            </thead>
                            @foreach ($data as $item)
                            <tbody>
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->role_string}}</td>
                                <td><a href="#" class="btn btn-outline-primary">Edit</a></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @endif

                        @if (auth()->user()->isPekerja())
                        <table class="table">
                            <caption>Daftar Pekerjaan Aktif</caption>
                            <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Pekerjaan</th>
                                <th scope="col">Tanggal Selesai</th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                    <td><a style="color: #495057" href="{{'/pekerjaan'}}">Kerang Sampel Area</a></td>
                                    <td>23/12/2021</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td><a style="color: #495057" href="{{'/pekerjaan'}}">Ubinan</a></td>
                                <td>12/01/2021</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td><a style="color: #495057" href="{{'/pekerjaan'}}">Industri</a></td>
                                <td>01/01/2022</td>
                            </tr>
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
