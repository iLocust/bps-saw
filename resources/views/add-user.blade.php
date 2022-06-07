@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ '/home' }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Editor</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ '/home' }}">Dashboard</a></div>
            <div class="breadcrumb-item">Editor</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <x-alert />
                <div class="card">
                    <div class="card-header">
                        <h4>Menambahkan Pegawai</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pegawai.store') }}" method="POST">
                            @csrf
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">E-Mail</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="email" value="{{ old('email') }}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="password" name="password" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Peran</label>
                                <div class="col-sm-12 col-md-7">
                                    <div class="selectric-wrapper selectric-form-control selectric-selectric selectric-below">
                                        <div class="selectric-hide-select">
                                            <select class="form-control selectric" name="role" tabindex="-1">

                                                @if(auth()->user()->isAdmin())
                                                <option value="{{ \App\Models\User::ROLE_PENGAWAS }}">
                                                    Pengawas
                                                </option>
                                                <option value="{{ \App\Models\User::ROLE_PEKERJA }}">Pekerja
                                                </option>
                                                @elseif(auth()->user()->isPengawas())
                                                <option value="{{ \App\Models\User::ROLE_PEKERJA }}">Pekerja
                                                </option>
                                                @endif

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
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