@extends('template')

@section('title')
    <h1>
        Home
        <small>Index</small>
      </h1>
@endsection

@section('periode')
    
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="callout callout-info">
                <h4>Selamat Datang di SIMADIR!</h4>

                <p></p>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">Daftar Permohonan Izin</h3>
                </div>
                <div class="box-body" id="list-pengajuan">
                    <!-- letakkan disini -->
                </div>
            </div>
        </div>
    </div>

    <style type="text/css">
        .box-item-pengajuan{
            min-height: 140px; position: relative;
        }

        .box-item-pengajuan .small-box-footer{
            position: absolute; bottom: 0; width: 100%;
        }
    </style>
@endsection

@section('script')
    
@endsection