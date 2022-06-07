@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{'/home'}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
          </div>
      <h1>Credits</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{'/home'}}">Dashboard</a></div>
        <div class="breadcrumb-item">Credits</div>
      </div>
    </div>

    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <p>Kami ingin mengucapkan terima kasih kepada pihak-pihak yang telah membantu kami menyelesaikan project ini</p>
            </div>
            <div class="card-body">
              <div class="list-unstyled list-unstyled-border mt-4">
                <div class="media">
                    <div class="media-icon"><i class="far fa-circle"></i></div>
                    <div class="media-body">
                      <h6>Universitas Negeri Surabaya</h6>
                      <p>Surabaya</p>
                    </div>
                  </div>
                <div class="media">
                    <div class="media-icon"><i class="far fa-circle"></i></div>
                    <div class="media-body">
                      <h6>Badan Pusat Statistik</h6>
                      <p>Jember</p>
                    </div>
                  </div>
                  <div class="media">
                    <div class="media-icon"><i class="far fa-circle"></i></div>
                    <div class="media-body">
                      <h6>Dida Arda</h6>
                      <p>PT. TATI</p>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>
  @endsection
