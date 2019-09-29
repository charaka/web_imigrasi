@extends('template')
@section('title')
  <h1>
    Post
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
  {!! Form::model($post, ['route' => ['post.update',$id], 'method'=>'PUT','class'=>'', 'files'=>'true']) !!}
  <div class="box-body">
    @include('post/form', ['post'=>$post])
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
    $('.summernote').summernote({
        height: 300,
        tabsize: 2,
        maximumImageFileSize: 2097152,
        callbacks: {
        onImageUpload: function(files, editor, welEditable) {
          for (var i = files.length - 1; i >= 0; i--) {
            sendFile(files[i], this);
          }
        },
        onInit: function() {
          var noteBtn = '<button id="upload_gambar" type="button" class="btn btn-default btn-sm btn-small" title="Upload Images" data-event="something" tabindex="-1"><i class="fa fa-file-image-o"></i></button>';
          
          var fileGroup = '<div class="note-file btn-group">' + noteBtn + '</div>';

          //$(fileGroup).appendTo($('.note-toolbar'));

          // Button tooltips
          $('#upload_gambar').tooltip({
            container: 'body',
            placement: 'bottom'
          });
          
          // Button events
          $('#upload_gambar').click(function(event) {
            alert('gamaar..');
          });
        },
      },
    });

    /*foto*/   
    $('#foto-fileframe').maxupload({
        url:'',
        maxHeight : 200,
        maxWidth : 320,
        filenameid : 'filename_foto',
        photo: '{{ (!empty($post->cover)?url($post->cover):url("assets/dist/img/news-holder.jpg")) }}',
        ready:function(){
            $('#foto-fileframe #holder a img').addClass('positionStatic');
            $('#foto-fileframe #holder a #edit').hide();
        },
        delete:function(){
            $('#foto-fileframe #holder a img').removeClass('positionStatic');
            $('#foto-fileframe #holder a #edit').show();
        },
        complete:function(ko_data){
            ko_foto = ko_data.x + ";" + ko_data.y + ";" + ko_data.w + ";" + ko_data.h + ';152px;193px';
            $('#ko_foto').val(ko_foto);
        }
    });
    $("#filename_foto").attr("accept","image/jpeg,image/x-png");
    $('#foto-fileframe #holder a #edit').click(function(){
      $('#filename_foto').click();
    });
    /*end foto*/

    getIcon();
    $("#parent").change(function(){
      $.ajax({
        url : '{{ url("get_parent") }}',
        data : {id:$(this).val()},
        type : 'GET',
        success : function(data){
          $("#sub_parent").html(data).select2();
        }
      })
    });

    $('#btn_file').on('click', function() {
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
        $el1         = $row.find('input.tmp_deskripsi_file').eq(0).attr('name', 'deskripsi_file[]').attr('id','deskripsi_file'+index);
        $el2         = $row.find('input.tmp_file_lampiran').eq(0).attr('name', 'file_lampiran[]').attr('id','file_lampiran'+index);
        $row.on('click', '.removeButton', function(e) {
                 
                  $row.remove();
              });
    });
  });
  function getIcon(){
    $.ajax({
      url : '{{ url("getIcon") }}',
      dataType : 'json',
      success : function(data){
        $.each(data, function(index,element) {
               for(var i=1;i<element.length;i++){               
            $("#tmpIcon").append('<option value=' + element[i] + ' data-icon=' + element[i] + '>' + element[i] + '</option>');
               }
          });
      }

    })
  }
  function sendFile(file, el) {
      var form_data = new FormData();
      form_data.append('file', file);

      $.ajax({
        data: form_data,
        type: "POST",
        url: '{{ url("sendFile") }}',
        headers: {
         'X-CSRF-TOKEN': $('input[name="_token"]').val()
      },
        cache: false,
        contentType: false,
        enctype: 'multipart/form-data',
        processData: false,
        success: function(url) {
          $(el).summernote('editor.insertImage', url);
        }
      });
    }
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
                                location.href = "{{ url('post/'.$id.'/edit') }}";
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
    });
    }
</script>
@endsection