@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ '/setting' }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>General Settings</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ '/home' }}">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="{{ '/setting' }}">Settings</a></div>
            <div class="breadcrumb-item">General Settings</div>
        </div>
    </div>

    <div class="section-body">
        <div id="output-status"></div>
        <div class="row">
            <div class="col-md-8">
                <x-alert />
                <div class="card" id="settings-card">
                    <div class="card-header">
                        <h4>General Settings</h4>
                    </div>

                    <form action="{{ route('settings.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            @csrf
                            <p class="text-muted">Harap segera melengkapi form biodata dibawah ini.</p>

                            <div class="form-group row align-items-center">

                                <label for="site-title" class="form-control-label col-sm-3 text-md-right">Umur</label>
                                <div class="col-sm-6 col-md-9">
                                    <input type="number" name="umur"
                                        value="{{ old('umur', $user->umur) }}"
                                        class="form-control" id="site-title">
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label for="site-title" class="form-control-label col-sm-3 text-md-right">Tempat
                                    Lahir</label>
                                <div class="col-sm-6 col-md-9">
                                    <input type="text" name="tempat_lahir"
                                        value="{{ old('tempat_lahir', $user->tempat_lahir) }}"
                                        class="form-control" id="site-title">
                                </div>
                            </div>

                            <div class="form-group row align-items-center">
                                <label for="site-title" class="form-control-label col-sm-3 text-md-right">Tanggal
                                    Lahir</label>
                                <div class="col-sm-6 col-md-9">
                                    <input type="date" name="tanggal_lahir"
                                        value="{{ old('tempat_lahir', optional($user->tanggal_lahir)->format('Y-m-d')) }}"
                                        class="form-control" id="site-title">
                                </div>
                            </div>

                            <div class="form-group row align-items-center">
                                <label for="site-title" class="form-control-label col-sm-3 text-md-right">Domisili
                                    Kecamatan</label>
                                <div class="col-sm-6 col-md-9">
                                    <input type="text" name="domisili_kec"
                                        value="{{ old('domisili_kec', $user->domosili_kec) }}"
                                        class="form-control" id="site-title">
                                </div>
                            </div>

                            <div class="form-group row align-items-center">
                                <label for="site-title" class="form-control-label col-sm-3 text-md-right">Domisili
                                    Desa</label>
                                <div class="col-sm-6 col-md-9">
                                    <input type="text" name="domisili_desa"
                                        value="{{ old('domisili_desa', $user->domisili_desa) }}"
                                        class="form-control" id="site-title">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><b>RT / RW</b></span>
                                    </div>
                                    <input type="text"
                                        value="{{ old('domisili_rt', $user->domisili_rt) }}"
                                        class="form-control" name="domisili_rt" placeholder="RT">
                                    <input type="text"
                                        value="{{ old('domisili_rw', $user->domisili_rw) }}"
                                        class="form-control" name="domisili_rw" placeholder="RW">
                                </div>
                            </div>


                            <div class="form-group row align-items-center">
                                <label for="site-title" class="form-control-label col-sm-3 text-md-right">Nama
                                    Jalan</label>
                                <div class="col-sm-6 col-md-9">
                                    <input type="text" name="domisili_jalan"
                                        value="{{ old('domisili_jalan', $user->domisili_jalan) }}"
                                        class="form-control" id="site-title">
                                </div>
                            </div>

                            <div class="form-group row align-items-center">
                                <label for="site-title" class="form-control-label col-sm-3 text-md-right">Kode
                                    Pos</label>
                                <div class="col-sm-6 col-md-9">
                                    <input type="text" name="kode_post"
                                        value="{{ old('kode_post', $user->kode_post) }}"
                                        class="form-control" id="site-title">
                                </div>
                            </div>

                            <div class="form-group row align-items-center">
                                <label for="site-title" class="form-control-label col-sm-3 text-md-right">No. HP</label>
                                <div class="col-sm-6 col-md-9">
                                    <input type="text" name="no_hp"
                                        value="{{ old('no_hp', $user->no_hp) }}"
                                        class="form-control" id="site-title">
                                </div>
                            </div>


                            <div class="text-center card-footer bg-whitesmoke text-md-right">
                                <button class="btn btn-primary" id="save-btn">Save Changes</button>
                                <button class="btn btn-secondary" type="button">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
