@extends('template')
@section('title')
  <h1>
    Statistik TPI
    <small>Create</small>
  </h1>
  <!-- <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Kelengkapan PKKMB</a></li>
    <li class="active">Atribut PKKMB</li>
  </ol> -->
@endsection
@section('content')
<div class="box box-primary">
  {!! Form::model($statistik, ['route' => ['tpi.store'], 'class'=>'', 'files'=>'true']) !!}
  <div class="box-body">
    @include('tpi/form', ['tpi'=>$statistik])
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
    });;

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

    $('#btn_video').on('click', function() {
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
        $el1         = $row.find('input.tmp_deskripsi_video').eq(0).attr('name', 'deskripsi_video[]').attr('id','deskripsi_video'+index);
        $row.on('click', '.removeButton', function(e) {
                 
                  $row.remove();
              });
    });

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
</script>
@endsection