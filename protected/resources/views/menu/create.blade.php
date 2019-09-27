@extends('template')
@section('title')
  <h1>
    Menu
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
  {!! Form::model($menu, ['route' => ['menu.store'], 'class'=>'', 'files'=>'true']) !!}
  <div class="box-body">
    @include('menu/form', ['menu'=>$menu])
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
    $("#posisi").change(function(){
      $.ajax({
        url : 'getSUbhead?id='+$(this).val(),
        dataType : 'html',
        success : function(data){
          $("#submenu").html(data).select2();
        }
      })
    })

    $("#model").change(function(){
      $.ajax({
        url : 'getModel?id='+$(this).val(),
        dataType : 'html',
        success : function(data){
          $("#posting").html(data).select2();
        }
      }) 
    })

  });
  function getIcon(){
    var sel = '';
    $.ajax({
      url : '{{ url("menu/getIcon") }}',
      dataType : 'json',
      success : function(data){
        $.each(data, function(index,element) {

            $("#tmpIcon").append('<option value=' + element + ' data-icon="si ' + element + '">' + element +'</option>');
          
        });
      }

    })
  }
</script>
@endsection