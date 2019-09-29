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
    			<td width="10%">Menu</td>
    			<td width="1%">:</td>
    			<td>{{ $rbacPermissions->menu }}</td>
    		</tr>
    		<tr>
    			<td>Slug</td>
    			<td>:</td>
    			<td>{{ $rbacPermissions->slug }}</td>
    		</tr>
    		<tr>
    			<td>Icon</td>
    			<td>:</td>
    			<td><i class="fa {{ $rbacPermissions->icon }}"></i></td>
    		</tr>
    		<tr>
    			<td>Parent</td>
    			<td>:</td>
    			<td>{{ $rbacPermissions->parent?$rbacPermissions->parents->menu:'-' }}</td>
    		</tr>
			<tr>
    			<td>Created At</td>
    			<td>:</td>
    			<td>{{ date('d-m-Y H:i:s',strtotime($rbacPermissions->created_at)) }}</td>
    		</tr>

    	</table>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
		<center>
			<a class="btn btn-info btn-sm btn-flat" href="{{ url('rbac_permissions') }}"><i class="fa fa-reply"></i> Back</a>
			<a class="btn btn-warning btn-sm btn-flat" href="{{ url('rbac_permissions/'.$rbacPermissions->id.'/edit') }}"><i class="fa fa-edit"></i> Edit</a>
			<!-- <button class="btn btn-danger btn-sm btn-flat" onclick="del_rbac_permissions(1)"><i class="fa fa-times"></i> Delete</button> -->
		</center>
    </div>
  </div><!-- /.box-body -->
</div><!-- /.box-body out -->
@endsection

