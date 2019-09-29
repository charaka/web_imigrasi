@extends('template')
@section('title')
  <h1>
    RBAC Permissions
    <small>Index</small>
  </h1>
  <!-- <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Kelengkapan PKKMB</a></li>
    <li class="active">Atribut PKKMB</li>
  </ol> -->
@endsection
@section('content')
<div class="box box-primary">
  <div class="box-header">
    <div class="row">
      <div class="col-md-12">
        <a href="{{ url('rbac_permissions/create') }}" class="btn btn-sm btn-primary btn-flat">Tambah Menu <i class="fa fa-plus"></i></a>
        <hr/>
      </div>
    </div>
  </div><!-- /.box-header -->
  <div class="box-body">
    <div class="row">
      <div class="col-md-12">
        <div id="list-menu"></div>
      </div>
    </div>
  </div><!-- /.box-body -->
</div><!-- /.box-body out -->
@endsection

@section('script')
<script type="text/javascript">
  $(document).ready(function(){
    show_list_menu();
  })
  function load_sorting_menu(){
        serialized = $('ol.sortable').nestedSortable('serialize');
        //alert(serialized);

        $.ajax({
            url:'{{ url("rbac_permissions/update_sort") }}',
            type: 'GET',
            data: serialized,
            /*headers: {
           'X-CSRF-TOKEN': $('input[name="_token"]').val()
        },*/
            dataType: 'json',
            success:function(data){
                if(data.submit=='1'){
                  $.alert({
                        title: 'Berhasil Mengupdate Data',
                        type : 'green',
                        content : data.pesan
                      });
                  show_list_menu();
                }
                else{
                    //alert(data.error);
                    swal("Gagal!",data.pesan,"error");
                    location.reload();
                }
            }
        });
    }
  


   function show_list_menu(){
        $.ajax({
            type: "GET",
            url: '{{ url("gen_menu_admin") }}',
            data:'',
            /*headers: {
           'X-CSRF-TOKEN': $('input[name="_token"]').val()
        },*/
            success: function(data){
                $("#list-menu").html(data);

                $('ol.sortable').nestedSortable({
                    forcePlaceholderSize: true,
                    handle: 'div',
                    helper: 'clone',
                    items: 'li',
                    opacity: .9,
                    placeholder: 'placeholder',
                    revert: 250,
                    tabSize: 25,
                    tolerance: 'pointer',
                    toleranceElement: '> div',
                    maxLevels: 4,

                    isTree: true,
                    expandOnHover: 700,
                    startCollapsed: true,
                    update : function() {
                        load_sorting_menu();
                    }
                });
            },
            error:function(XMLHttpRequest){
                alert(XMLHttpRequest.responseText);
            }
        });
    }

    function del_menu(id){
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
                        url : '{{ url("rbac_permissions") }}/'+id,
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
                                  location.href = "{{ url('rbac_permissions') }}";
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