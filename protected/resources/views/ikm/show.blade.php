@extends('template')
@section('title')
  <h1>
    Statistik IKM
    <small>Show</small>
  </h1>
@endsection
@section('content')
<div class="box box-primary">
  <div class="box-body">
    <div class="box-body">
        <h4>INDEKS KEPUASAN MASYARAKAT BULAN {{ $bulan_text }} TAHUN {{ $tahun }}</h4>
        <table class="table table-bordered table-condensed">
          {!! $tabel !!}
        </table>
        <hr>
    </div>

    <!-- /.box-body -->
  </div><!-- /.box-body -->
    <div class="box-footer">
        <center>
            <a class="btn btn-info btn-sm btn-flat" href="{{ url('ikm') }}"><i class="fa fa-reply"></i> Back</a>
            <a class="btn btn-warning btn-sm btn-flat" href="{{ url('ikm/'.$bulan.'/'.$tahun.'/edit') }}"><i class="fa fa-edit"></i> Edit</a>
            <!-- <button class="btn btn-danger btn-sm btn-flat" onclick="del_rbac_permissions(1)"><i class="fa fa-times"></i> Delete</button> -->
        </center>
    </div>
</div><!-- /.box-body out -->


@endsection


@section('script')
<script type="text/javascript">
$(document).ready(function(){
});
</script>
@endsection