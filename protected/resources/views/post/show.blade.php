@extends('template')
@section('title')
  <h1>
    Post
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
    			<td>{{ $post->judul_in }}</td>
    		</tr>
    		<tr>
                <td width="10%">Judul En</td>
                <td width="1%">:</td>
                <td>{{ $post->judul_en }}</td>
            </tr>
            <tr>
                <td width="10%">Kategori</td>
                <td width="1%">:</td>
                <td>{{ $post->kategori->kategori_in }}</td>
            </tr>
            <tr>
                <td width="10%">Konten In</td>
                <td width="1%">:</td>
                <td>{!! $post->konten_in !!}</td>
            </tr>
            <tr>
                <td width="10%">Konten En</td>
                <td width="1%">:</td>
                <td>{!! $post->konten_en !!}</td>
            </tr>
            <tr>
                <td width="10%">File Lampiran</td>
                <td width="1%">:</td>
                <td>
                    @if(count($file)>0)
                    <table class="table table-striped table-bordered table-hover table-condensed">
                        <thead>
                            <tr>
                                <th>File</th>
                                <th>Deskripsi</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($file as $fLampiran)
                            <tr>
                                <td>
                                    @if($fLampiran->file)
                                    <a href="{{ url($fLampiran->file) }}" target="_blank"><i class="fa fa-cloud-download"></i> Download</a>
                                    @else
                                    No File
                                    @endif
                                </td>
                                <td>{{ $fLampiran->deskripsi }}</td>
                                <td><a href="javascript:;" onclick="del_file({{ $fLampiran->id }})"><i class="fa fa-times"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <i><b>Tidak Ada File</b></i>
                    @endif
                </td>
            </tr>
            <tr>
                <td width="10%">Video</td>
                <td width="1%">:</td>
                <td>
                @if(count($video)>0)
                    @foreach($video AS $video)
                    <div class="col-md-5">
                        <a href="{{ url($video->file) }}" rel="facebox">
                            <div>
                            <div class="pull-right">
                                <a href="javascript:;" onclick="del_file({{ $video->id }})"><i class="fa fa-times"></i></a>
                            </div>
                                <div class="col-md-3" style="padding: 0"><iframe width="320" height="213" src="https://www.youtube.com/embed/{!! $video->file !!}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></div>
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
            <a class="btn btn-info btn-sm btn-flat" href=""><i class="fa fa-reply"></i> Back</a>
            <a class="btn btn-warning btn-sm btn-flat" href="{{ url('post/'.$post->id.'/edit') }}"><i class="fa fa-edit"></i> Edit</a>
            <!-- <button class="btn btn-danger btn-sm btn-flat" onclick="del_rbac_permissions(1)"><i class="fa fa-times"></i> Delete</button> -->
        </center>
    </div>
</div><!-- /.box-body out -->


@endsection

@section('script')
<script type="text/javascript">
$(document).ready(function(){

});
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
                      url : '{{ url("post_file") }}/'+id,
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
                                location.href = "{{ url('post/'.$post->id) }}";
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