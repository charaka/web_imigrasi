@extends('template')
@section('title')
  <h1>
    RBAC Permissions
    <small>SIMADIR</small>
  </h1>
@endsection
@section('content')
<div class="box box-primary">
  <div class="box-body">
    <div class="box-body">
    	<table class="table table-striped table-condensed table-hover table-bordered">
    		<tr>
    			<td width="10%">Jenis Libur</td>
    			<td width="1%">:</td>
    			<td>{{ $masterJenisLibur->jenis_libur }}</td>
    		</tr>
    	</table>
    </div>
    <!-- /.box-body -->
  </div><!-- /.box-body -->
  <div class="box-footer">
      <center>
          <a class="btn btn-info btn-sm btn-flat" href="{{ url('master_jenis_libur') }}"><i class="fa fa-reply"></i> Back</a>
          <a class="btn btn-warning btn-sm btn-flat" href="{{ url('master_jenis_libur/'.$masterJenisLibur->id.'/edit') }}"><i class="fa fa-edit"></i> Edit</a>
          <!-- <button class="btn btn-danger btn-sm btn-flat" onclick="del_rbac_permissions(1)"><i class="fa fa-times"></i> Delete</button> -->
      </center>
  </div>
</div><!-- /.box-body out -->




@endsection

@section('script')
<script type="text/javascript">
    function aktif_role(permission){
        $.ajax({
            url : '{{ url("rbac_role/aktif_role") }}',
            data : 'permission_id='+permission+'&role_id={{ $masterJenisLibur->id }}',
            type : 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            dataType : 'json',
            success : function(data){
                if(data.submit==1){
                    location.reload();
                }else{
                    swal('Gagal','Gagal update','danger');
                }
            }
        })
    }
</script>
@endsection