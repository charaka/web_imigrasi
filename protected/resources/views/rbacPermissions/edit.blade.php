@extends('template')
@section('title')
  <h1>
    RBAC Permissions
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
    <h3 class="box-title">Edit Permissions</h3>
  </div>
  {!! Form::model($rbacPermissions, ['route' => ['rbac_permissions.update',$rbacPermissions->id], 'class'=>'', 'files'=>'true','method'=>'PUT']) !!}
  <div class="box-body">
    @include('rbacPermissions/form', ['rbacPermissions'=>$rbacPermissions])
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
    var depth = "{{ $rbacPermissions->depth }}";
    if(depth==0){
    }else{
      getSubParent($("#parent").val());
    }
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
    var select = "{{ $rbacPermissions->icon }}";
    var selected = "";
    $.ajax({
      url : '{{ url("getIcon") }}',
      dataType : 'json',
      success : function(data){
        $.each(data, function(index,element) {
          for(var i=1;i<element.length;i++){               
            if("fa "+element[i]==select){
              selected = "selected";
            }else{
              selected = "";
            }
            $("#tmpIcon").append('<option value=' + element[i] + ' data-icon=' + element[i] + ' '+selected+'>' + element[i] + '</option>');
              }
        });
      }

    })
  }
  function getSubParent(parent){
    var sub_parent = "{{ $rbacPermissions->parent?$rbacPermissions->parent:'' }}";
    var depth = "{{ $rbacPermissions->depth }}";
    //alert(sub_parent);
    $.ajax({
      url : '{{ url("get_sub_parent") }}',
      data : {parent:parent},
      type : 'GET',
      dataType : 'html',
      success : function(data){
        $("#sub_parent").html(data).select2();
        if(depth==2){
          $("#sub_parent").val(sub_parent).select2();
        }else{
          
        }
      }
    })
  }
</script>
@endsection