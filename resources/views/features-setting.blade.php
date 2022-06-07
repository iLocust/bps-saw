@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{'/home'}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
          </div>
      <h1>Settings</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{'/home'}}">Dashboard</a></div>
        <div class="breadcrumb-item">Settings</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-6">
          <div class="card card-large-icons">
            <div class="card-icon bg-primary text-white">
              <i class="fas fa-cog"></i>
            </div>
            <div class="card-body">
              <h4>Profile Setting</h4>

              <a href="{{route('settings.create')}}" class="card-cta">Change Setting <i class="fas fa-chevron-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-6">
          <div class="card card-large-icons">
            <div class="card-icon bg-primary text-white">
              <i class="fas fa-power-off"></i>
            </div>
            <div class="card-body">
              <h4>System</h4>
              <a href="{{'/503'}}" class="card-cta">Change Setting <i class="fas fa-chevron-right"></i></a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
  @endsection
