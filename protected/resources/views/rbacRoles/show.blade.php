@extends('template')
@section('title')
  <h1>
    RBAC Permissions
    <small>Show</small>
  </h1>
@endsection
@section('content')
<div class="box box-primary">
  <div class="box-body">
    <div class="box-body">
    	<table class="table table-striped table-condensed table-hover table-bordered">
    		<tr>
    			<td width="10%">Role Title</td>
    			<td width="1%">:</td>
    			<td>{{ $rbac_role->role_title }}</td>
    		</tr>
    		<tr>
    			<td>Description</td>
    			<td>:</td>
    			<td>{{ $rbac_role->description }}</td>
    		</tr>
    	</table>
    </div>
    <!-- /.box-body -->
  </div><!-- /.box-body -->
</div><!-- /.box-body out -->

<div class="box box-primary">
    <div class="box-header with-border">
        Permissions
    </div>
    <div class="box-body">
        <div class="row">
        @foreach($rbac_permission AS $key=>$value) 
            <div class="col-md-4">
                <div class="col-md-3 form-group">
                   <label class="switch"><input type="checkbox" onclick="aktif_role({!! $value->id !!})" <?=($value->role_id==$id?"checked":"")?>><span class="slider" ></span></label> 
                </div>
                <div class="col-md-6 form-group" style="padding: 3px 0px 0px 0px;">
                    <label>{{ $value->menu }}</label>  
                </div>
            </div>
        @endforeach
        </div>
    </div>
    <div class="box-footer">
        <center>
            <a class="btn btn-info btn-sm btn-flat" href="{{ url('rbac_role') }}"><i class="fa fa-reply"></i> Back</a>
            <!-- <button class="btn btn-danger btn-sm btn-flat" onclick="del_rbac_permissions(1)"><i class="fa fa-times"></i> Delete</button> -->
        </center>
    </div>
</div>


@endsection

@section('script')
<script type="text/javascript">
    function aktif_role(permission){
        $.ajax({
            url : '{{ url("rbac_role/aktif_role") }}',
            data : 'permission_id='+permission+'&role_id={{ $id }}',
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