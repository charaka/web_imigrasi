@extends('template')
@section('title')
  <h1>
    Kategori
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
        <a href="javascript:;" class="btn btn-md btn-primary btn-flat pull-right" onclick="show_form()" data-toggle="tooltip" title="Tambah Data"><i class="fa fa-plus"></i></a>
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
          url:'{{ url("kategori_page/update_sort") }}',
          type: 'GET',
          data: serialized,
          /*headers: {
         'X-CSRF-TOKEN': $('input[name="_token"]').val()
      },*/
          dataType: 'json',
          success:function(data){
              if(data.submit=='1'){
                swal("Sukses!", "Data berhasil disimpan", "success");
                show_list_menu();
              }
              else{
                  //alert(data.error);
                  //swal("Gagal!",data.pesan,"error");
                  location.reload();
              }
          }
      });
  }
  


  function show_list_menu(){
    $.ajax({
        type: "GET",
        url: '{{ url("kategori_page/gen_kategori") }}',
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

  function show_form(id = ""){
    if(id == ""){
      url_form = '{{url("kategori_page/create")}}';
      title_form = 'Tambah Data';
    } else {
      url_form = '{{url("kategori_page/")}}/'+id+'/edit';
      title_form = 'Edit Data';
    }

    $.ajax({
      type: "GET",
      url: url_form,
      async:true,
      beforeSend: function(data){
        // replace dengan fungsi loading
        // $('.overlay').show('slow');
      },
      success:  function(html){
        // $('.overlay').hide('slow');

        $("#modal-large .modal-title").html(title_form);
        $("#modal-large .modal-body-content").html(html);

      },
      complete: function(data){
        $("#modal-large").modal("show");
      },
      error: function(data) {
        alert("error ajax occured!");
      }
    });
  }

  function delete_data(id){
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
                      url : '{{ url("kategori_page") }}/'+id,
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
                                location.href = "{{ url('kategori_page') }}";
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