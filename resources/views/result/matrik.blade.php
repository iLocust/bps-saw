@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{'/home'}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Penilaian</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{'/home'}}">Dashboard</a></div>
            <div class="breadcrumb-item">Penilaian</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <x-alert />
                <div class="card">
                    <div class="card-header">
                        <h4>Alternatif & Nilai</h4>
                    </div>
                        <div class="card-body">
                            


                        </div>
                    </div>
                </div>
            </div>

        </div>
</section>

@endsection

@push('stylesheet')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/select2/dist/css/select2.min.css">
@endpush

@push('javascript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        let url = new URL('{{url()->current()}}');
        $('#pekerjaan').change(function() {
            url.searchParams.set('pekerjaan', $(this).val())
            window.location.href = url.toString();
        });

        $(".select2").select2();
    });
</script>
@endpush