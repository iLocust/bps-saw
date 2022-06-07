@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ '/home' }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Pekerjaan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ '/home' }}">Dashboard</a></div>
            <div class="breadcrumb-item">Pekerjaan</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                            <div class="col-sm-12 col-md-7">
                                <div
                                    class="selectric-wrapper selectric-form-control selectric-selectric selectric-below">
                                    <div class="selectric-hide-select"><select class="form-control selectric"
                                            tabindex="-1">
                                            <option>Survei SITASI</option>
                                            <option>Survei KSA Padi</option>
                                            <option>Survei KSA Jagung</option>
                                            <option>Survei Ubinan</option>
                                            <option>Susenas</option>
                                            <option>Sakernas</option>
                                        </select></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Petugas 1</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control">
                            </div>
                        </div>

                        <div class="text-center col-sm-12 col-md-7">
                            <button class="btn btn-success">Selesai</button>
                        </div>

                    </div>

                </div>

            </div>
</section>

@endsection
