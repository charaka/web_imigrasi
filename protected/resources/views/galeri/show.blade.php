@extends('template')
@section('title')
  <h1>
    Galeri
    <small>Show</small>
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
    			<td>{{ $galeri->judul_in }}</td>
    		</tr>
    		<tr>
                <td width="10%">Judul En</td>
                <td width="1%">:</td>
                <td>{{ $galeri->judul_en }}</td>
            </tr>
            <tr>
                <td width="10%">Deskripsi In</td>
                <td width="1%">:</td>
                <td>{{ $galeri->konten_in }}</td>
            </tr>
            <tr>
                <td width="10%">Deskripsi En</td>
                <td width="1%">:</td>
                <td>{{ $galeri->konten_en }}</td>
            </tr>
            <tr>
                <td width="10%">Detail Galeri</td>
                <td width="1%">:</td>
                <td>
                @if(count($details)>0)
                    @foreach($details AS $detail)
                    <div class="col-md-2">
                        <a href="{{ url($detail->file) }}" rel="facebox">
                            <div>
                            <div class="pull-right">
                                <a href="javascript:;" onclick="del_file({{ $detail->id }})"><i class="fa fa-times"></i></a>
                            </div>
                                <img src="{{ url($detail->file) }}" width="100%">
                            </div>
                        </a>
                    </div>
                    @endforeach
                @else
                <i><b>Tidak Ada File</b></i>
                @endif
                </td>
            </tr>
    	</table>
    </div>
    <!-- /.box-body -->
  </div><!-- /.box-body -->
    <div class="box-footer">
        <center>
            <a class="btn btn-info btn-sm btn-flat" href="{{ url('galeri') }}"><i class="fa fa-reply"></i> Back</a>
            <a class="btn btn-warning btn-sm btn-flat" href="{{ url('galeri/'.$galeri->id.'/edit') }}"><i class="fa fa-edit"></i> Edit</a>
            <!-- <button class="btn btn-danger btn-sm btn-flat" onclick="del_rbac_permissions(1)"><i class="fa fa-times"></i> Delete</button> -->
        </center>
    </div>
</div><!-- /.box-body out -->


@endsection

@section('script')
<script type="text/javascript">
function del_file(id){
      $.confirm({
        title: 'Hapus Data',
        type: 'red',
        icon: 'fa fa-warning',
        escapeKey: true, // close the modal when escape is pressed.
        content: 'Apakah anda yakin akan menghapus data ini ?',
        backgroundDismiss: true, // for escapeKey to work, backgroundDismiss should be enabled.
        buttons: {
            okay: {
                keys: [
                    'enter'
                ],
                action: function () {
                  $.ajax({
                      url : '{{ url("detail_galeri") }}/'+id,
                      headers: {
                          'X-CSRF-TOKEN': '{{ csrf_token() }}'
                      },
                      type : 'DELETE',
                      dataType : 'json',
                      success:function(data){
                              if(data.submit=='1'){
                                $.alert({
                                  title: 'Hapus Data',
                                  type : 'green',
                                  content :data.msg
                                });   
                                location.href = "{{ url('galeri/'.$galeri->id) }}";
                              }else{
                                $.alert({
                                  title: 'Hapus Data',
                                  type : 'red',
                                  content :data.msg
                                });                  
                              }
                          }
                  })
                }
            },
            cancel: {
                keys: [
                    'ctrl',
                    'shift'
                ],
                action: function () {
                    $.alert({
                      title: 'Hapus Data',
                      type : 'red',
                      content : '<strong>Proses dibatalkan</strong>.'
                    });
                }
            }
        },
    })
    }
</script>
@endsection