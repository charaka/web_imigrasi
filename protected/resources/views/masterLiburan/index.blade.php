@extends('template')
@section('title')
  <h1>
    Master Liburan
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
  <div class="box-header">
    <div class="row">
      <div class="col-md-6">
        <a href="{{ url('master_jenis_libur/create') }}" class="btn btn-sm bg-maroon btn-flat pull-left">Jenis Libur </a>
      </div>
      <div class="col-md-6">
        <a href="{{ url('master_liburan/create') }}" class="btn btn-md btn-primary btn-flat pull-right" title="Tambah Data"><i class="fa fa-plus"></i></a>
        <a href="" class="btn btn-md btn-info btn-flat pull-right" title="Cari Data"><i class="fa fa-search"></i></a>
      </div>
    </div>
  </div><!-- /.box-header -->
  <div class="box-body">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-condensed table-bordered table-striped" id="tb_rbac_role" style="width: 100%"> 
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Liburan</th>
              <th>Jenis Liburan</th>
              <th>Tanggal</th>
              <th width="10%">Action</th>
            </tr>
          </thead>
          <tbody>
            
          </tbody>
        </table>
      </div>
    </div>
  </div><!-- /.box-body -->
</div><!-- /.box-body out -->
@endsection

@section('script')
<script type="text/javascript">
  var tb_rbac_role = $('#tb_rbac_role').dataTable( {
    processing: true,
        serverSide: true,
        ajax: '{{ url("master_liburan/listing") }}',
        columns: [
            {data: 'no', name: 'no',width:"2%"},
            {data: 'nama_libur', name: 'nama_libur'},
            {data: 'jenis_libur', name: 'jenis_libur'},                         
            {data: 'tgl_libur', name: 'tgl_libur'},                         
            {data: 'action', name: 'id',orderable: false, searchable: false}
        ],
        rowCallback: function( row, data, iDisplayIndex ) {
      var api = this.api();
      var info = api.page.info();
      var page = info.page;
      var length = info.length;
      var index = (page * length + (iDisplayIndex +1));
      $('td:eq(0)', row).html(index);
    }

  } );
        
  $('#tb_rbac_role_filter input').unbind();
  $('#tb_rbac_role_filter input').bind('keyup', function(e) {
    if(e.keyCode == 13) {
      tbperiode.fnFilter(this.value);
     }
  }); 
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
                        url : '{{ url("master_liburan") }}/'+id,
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
                                  location.href = "{{ url('master_liburan') }}";
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