@extends('template')
@section('title')
  <h1>
    Master Jenis Libur
    <small>SIMADIR</small>
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
    <h3 class="box-title">Form Jenis Libur</h3>
  </div>
  {!! Form::model($masterJenisLibur, ['route' => ['master_jenis_libur.store'], 'class'=>'', 'files'=>'true']) !!}
  <div class="box-body">
    @include('masterJenisLiburan/form', ['masterJenisLibur'=>$masterJenisLibur])
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