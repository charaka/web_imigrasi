@extends('template')
@section('title')
  <h1>
    Show Slide Show
    <small>Web Imigrasi</small>
  </h1>
@endsection
@section('content')
<div class="box box-primary">
  <div class="box-body">
    <div class="box-body">
    	<table class="table table-striped table-condensed table-hover table-bordered">
    		<tr>
    			<td width="10%">Judul In</td>
    			<td width="1%">:</td>
    			<td>{{ $slide_show->judul_in }}</td>
    		</tr>
    		<tr>
                <td width="10%">Judul En</td>
                <td width="1%">:</td>
                <td>{{ $slide_show->judul_en }}</td>
            </tr>
            <tr>
                <td width="10%">Deskripsi In</td>
                <td width="1%">:</td>
                <td>{!! $slide_show->deskripsi_in !!}</td>
            </tr>
            <tr>
                <td width="10%">Deskripsi En</td>
                <td width="1%">:</td>
                <td>{!! $slide_show->deskripsi_en !!}</td>
            </tr>
            <tr>
                <td width="10%">Slide Show</td>
                <td width="1%">:</td>
                <td>
                    @if(!empty($slide_show->image))
                        <img src="{{ url($slide_show->image) }}" width="60%">
                    @else

                    @endif
                </td>
            </tr>
            
    	</table>
    </div>
    <!-- /.box-body -->
  </div><!-- /.box-body -->
    <div class="box-footer">
        <center>
            <a class="btn btn-info btn-sm btn-flat" href="{{ url('slide_show') }}"><i class="fa fa-reply"></i> Back</a>
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