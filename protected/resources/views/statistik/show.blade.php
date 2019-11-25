@extends('template')
@section('title')
  <h1>
    Statistik
    <small>Show</small>
  </h1>
@endsection
@section('content')
<div class="box box-primary">
  <div class="box-body">
    <div class="box-body">
        <h3>Tabel Statistik Bulan {{ $bulan_text }} Tahun {{ $tahun }}</h3>
        <hr>
    	<table class="table table-striped table-condensed table-hover table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Statistik</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                {!! $tabel !!}
            </tbody>
    	</table>
        <br>
        <h3>Statistik</h3>
        <hr>
        <div class="col-md-12">
            <div id="bar-chart" style="height: 300px;"></div>
        </div>
    </div>

    <!-- /.box-body -->
  </div><!-- /.box-body -->
    <div class="box-footer">
        <center>
            <a class="btn btn-info btn-sm btn-flat" href="{{ url('statistik') }}"><i class="fa fa-reply"></i> Back</a>
            <a class="btn btn-warning btn-sm btn-flat" href="{{ url('statistik/'.$bulan.'/'.$tahun.'/edit') }}"><i class="fa fa-edit"></i> Edit</a>
            <!-- <button class="btn btn-danger btn-sm btn-flat" onclick="del_rbac_permissions(1)"><i class="fa fa-times"></i> Delete</button> -->
        </center>
    </div>
</div><!-- /.box-body out -->


@endsection


@section('script')
<script type="text/javascript">
$(document).ready(function(){
    var bar_data = {
      data : [{!! $stats !!}],
      color: '#3c8dbc'
    }
    $.plot('#bar-chart', [bar_data], {
      grid  : {
        borderWidth: 1,
        borderColor: '#f3f3f3',
        tickColor  : '#f3f3f3'
      },
      series: {
        bars: {
          show    : true,
          barWidth: 0.5,
          align   : 'center'
        }
      },
      xaxis : {
        mode      : 'categories',
        tickLength: 0
      }
    })
});
</script>
@endsection