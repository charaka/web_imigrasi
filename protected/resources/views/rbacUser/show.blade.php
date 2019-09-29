@extends('template')
@section('title')
  <h1>
    RBAC User
    <small>Index</small>
  </h1>
@endsection
@section('content')
<div class="box box-primary">
  <div class="box-body">
    <div class="box-body">
    	<table class="table table-striped table-condensed table-hover table-bordered">
    		<tr>
                <td width="10%">Nama</td>
                <td width="1%">:</td>
                <td>{{ $rbac_user->name }}</td>
            </tr>
            <tr>
                <td width="10%">Email</td>
                <td width="1%">:</td>
                <td>{{ $rbac_user->email }}</td>
            </tr>
            <tr>
    			<td width="10%">Role</td>
    			<td width="1%">:</td>
    			<td>
                    <ul>
                        @foreach($rbac_user->role_user AS $role)    
                            <li>{{ $role->role->role_title }}</li>
                        @endforeach
                    </ul>         
                </td>
    		</tr>
    	</table>
    </div>
    <!-- /.box-body -->
  </div><!-- /.box-body -->
</div><!-- /.box-body out -->




@endsection

@section('script')
<script type="text/javascript">

</script>
@endsection