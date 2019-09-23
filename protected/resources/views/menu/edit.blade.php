@extends('template')
@section('title')
  <h1>
    RBAC Permissions
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
    <h3 class="box-title">Tambah Permissions</h3>
  </div>
  {!! Form::model($menu, ['route' => ['menu.update',$id], 'method'=>'PUT','class'=>'', 'files'=>'true']) !!}
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


  getPosting();
    getSubMenu();
$("#model").change(function(){
        $.ajax({
          url : '{{ url("menu/getModel") }}?id='+$(this).val(),
          dataType : 'html',
          success : function(data){
            $("#id_element").html(data).select2();
          }
        }) 
      })
      $("#posisi").change(function(){
        $.ajax({
          url : '{{ url("menu/getSubhead") }}?id='+$(this).val(),
          dataType : 'html',
          success : function(data){
            $("#submenu").html(data).select2();
          }
        })
      })
  })
 function getPosting(){
      $.ajax({
        url : '{{ url("menu/getModel") }}?id='+$("#model").val(),
        dataType : 'html',
        success : function(data){
          $("#id_element").html(data).select2();
          $("#id_element").val(<?=$menu->id_element?>).select2();
        }
      }) 
    }    
    function getSubMenu(){
      $.ajax({
        url : '{{ url("menu/getSubhead") }}?id='+$("#posisi").val(),
        dataType : 'html',
        success : function(data){
          $("#submenu").html(data).select2();
          $("#submenu").val(<?=$menu->parent_id?>).select2();
        }
      })
    }
</script>
@endsection