@extends('template')
@section('title')
  <h1>
    Master Liburan
    <small>SIMADIR</small>
  </h1>
@endsection
@section('content')
<div class="box box-primary">
  <div class="box-body">
    <div class="box-body">
    	<table class="table table-striped table-condensed table-hover table-bordered">
    		<tr>
    			<td width="10%">Nama Liburan</td>
    			<td width="1%">:</td>
    			<td>{{ $nama_libur }}</td>
    		</tr>
    		<tr>
                <td width="10%">Jenis Liburan</td>
                <td width="1%">:</td>
                <td>{{ $jenis_libur }}</td>
            </tr>
            <tr>
                <td width="10%">Tanggal Liburan</td>
                <td width="1%">:</td>
                <td>{{ $tgl_libur }}</td>
    		</tr>
    	</table>
    </div>
    <!-- /.box-body -->
  </div><!-- /.box-body -->
    <div class="box-footer">
        <center>
            <a class="btn btn-info btn-sm btn-flat" href="{{ url('master_liburan') }}"><i class="fa fa-reply"></i> Back</a>
            <a class="btn btn-warning btn-sm btn-flat" href=""><i class="fa fa-edit"></i> Edit</a>
            <!-- <button class="btn btn-danger btn-sm btn-flat" onclick="del_rbac_permissions(1)"><i class="fa fa-times"></i> Delete</button> -->
        </center>
    </div>
</div><!-- /.box-body out -->


@endsection

@section('script')
<script type="text/javascript">

</script>
@endsection