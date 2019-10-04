@extends('template')
@section('title')
  <h1>
    Galeri
    <small>Edit</small>
  </h1>
  <!-- <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Kelengkapan PKKMB</a></li>
    <li class="active">Atribut PKKMB</li>
  </ol> -->
@endsection
@section('content')
<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Tambah Permissions</h3>
  </div>
  {!! Form::model($galeri, ['route' => ['galeri.update',$id], 'method'=>'PUT','class'=>'', 'files'=>'true']) !!}
  <div class="box-body">
    @include('galeri/form', ['galeri'=>$galeri])
  </div><!-- /.box-body -->
  <div class="box-footer">
    <button type="submit" class="btn btn-primary flat">Submit</button>
    <button type="reset" class="btn btn-danger flat">Reset</button>
  </div>  
  {!! Form::close() !!}
</div><!-- /.box-body out -->
@endsection

@section('script')
<script type="text/javascript">
  $(document).ready(function(){


    $('#btn_galeri').on('click', function() {
      var index = $(this).data('index');
      if (!index) {
        index = 1;
        $(this).data('index', 1);
      }
      index++;
      $(this).data('index', index);

      var template     = $(this).attr('data-template'),
        $templateEle = $('#' + template + 'Template'),
        $row         = $templateEle.clone().attr('id','ele_wrap'+index).insertBefore($templateEle).removeClass('hide'),
        $el1         = $row.find('input.tmp_galeri_lampiran').eq(0).attr('name', 'galeri_lampiran[]').attr('id','galeri_lampiran'+index);
        $row.on('click', '.removeButton', function(e) {
                 
                  $row.remove();
              });
    });
    /*foto*/   

    /*end foto*/

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
                                location.href = "{{ url('galeri/'.$id.'/edit') }}";
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