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
    getIcon();
    getPosting();
    getSubMenu();
    $("#posisi").change(function(){
      $.ajax({
        url : '{{ url("menu/getSUbhead") }}?id='+$(this).val(),
        dataType : 'html',
        success : function(data){
          $("#submenu").html(data).select2();
        }
      })
    })

    $("#model").change(function(){
      $.ajax({
        url : '{{ url("menu/getModel") }}?id='+$(this).val(),
        dataType : 'html',
        success : function(data){
          $("#posting").html(data).select2();
        }
      }) 
    })
  });
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
  function getIcon(){
    var sel = '';
    var icon = '{{ $menu->icon }}';
    $.ajax({
      url : '{{ url("menu/getIcon") }}',
      dataType : 'json',
      success : function(data){
        $.each(data, function(index,element) {
            if(element==icon){
              sel = 'selected';
            }else{
              sel = '';
            }
            $("#tmpIcon").append('<option value=' + element + ' data-icon="si ' + element + '" '+sel+'>' + element +'</option>');
          
        });
      }

    })
  }
</script>
@endsection