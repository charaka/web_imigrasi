@extends('template')
@section('title')
  <h1>
    Slide Show
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
    <h3 class="box-title"></h3>
  </div>
  {!! Form::model($slide_show, ['route' => ['slide_show.update',$id], 'method'=>'PUT','class'=>'', 'files'=>'true']) !!}
  <div class="box-body">
    @include('slideshow/form', ['slide_show'=>$slide_show])
  </div><!-- /.box-body -->
  <div class="box-footer">
    <a href="{{ url('slide_show') }}" class="btn btn-warning flat">Back</a>
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
      height: 320,
      minHeight: null,
      maxHeight: null,
      focus: false,
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
      toolbar: [
        ['fontname', ['fontname']],
        ['fontsize', ['fontsize']],
        ['font', ['style','bold', 'italic', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        //['height', ['height']],
        ['table', ['table']],
        ['insert', ['link','picture']],
        ['view', ['fullscreen', 'codeview']],
        //['misc', ['undo','redo']]
      ]
    });

    /*foto*/   
    $('#foto-fileframe').maxupload({
        url:'',
        maxHeight : 200,
        maxWidth : 320,
        filenameid : 'filename_foto',
        photo: '{{ (!empty($slide_show->cover)?url($slide_show->cover):"/dualbahasa/assets/dist/img/news-holder.jpg") }}',
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
    })
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
</script>
@endsection