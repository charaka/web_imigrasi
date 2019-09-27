@extends('template')
@section('title')
  <h1>
    RBAC User
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
      <div class="col-md-12">
        <a href="{{ url('rbac_user/create') }}" class="btn btn-md btn-primary btn-flat pull-right" data-toggle="tooltip" title="Tambah Data"><i class="fa fa-plus"></i></a>
      </div>
    </div>
  </div><!-- /.box-header -->
  <div class="box-body">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-condensed table-bordered table-striped" id="tb_rbac_user" style="width: 100%"> 
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Email</th>
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
  var tb_rbac_user = $('#tb_rbac_user').dataTable( {
    processing: true,
        serverSide: true,
        ajax: '{{ url("rbac_user/listing") }}',
        columns: [
            {data: 'no', name: 'no',width:"2%"},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},                         
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
        
  $('#tb_rbac_user_filter input').unbind();
  $('#tb_rbac_user_filter input').bind('keyup', function(e) {
    if(e.keyCode == 13) {
      tbperiode.fnFilter(this.value);
     }
  }); 
</script>
@endsection