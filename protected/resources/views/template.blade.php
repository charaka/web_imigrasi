<!DOCTYPE html>
<html>
@include('/layouts/header')
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{ url('home') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>W</b>IM</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>WEB</b>IMIGRASI</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>

          <li class="dropdown notifications-menu user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ url('/assets/dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu" style="overflow: hidden; width: 100%; height: 200px;">
                  @foreach(Session::get('user_role') AS $value)
                  <li id="">
                      <a href="#" style="padding:0px;">
                      <div class="radio" style="margin: 0px;">
                      <label style="width: 100%; padding: 10px 10px 10px 38px;">
                        <input onclick="change_role({{ $value->id }})" name="role_active" value="{{ $value->id }}" data-name="{{ $value->role_title }}" data-mode_handle="1" type="radio" {{ (Session::get('user_role_active')==$value->id?"checked":"") }}>{{ $value->role_title }}
                      </label>
                      </div>
                      </a>
                  </li>
                  @endforeach
              </ul>
              </li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <!-- User Account: style can be found in dropdown.less -->
          
          <!-- Control Sidebar Toggle Button -->
          <li>
            <!-- <a href="#" data-toggle="control-sidebar" onclick="logout()"><i class="fa fa-power-off"></i></a> -->
            <a href="#" onclick="logout()"><i class="fa fa-power-off"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  @include('/layouts/sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      @yield('title')
      <!-- <h1>
        Dashboard
        <small>Control panel</small>
      </h1> -->
      <ol class="breadcrumb">
        <!-- di dalam header buat beginian -->
        <!-- <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li> -->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">USDI Udayana</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

@include('/layouts/footer')
@include('/layouts/modal')

@yield('script')
<script type="text/javascript">
  $(document).ready(function(){
    
  })
  function logout(){
    y = confirm('Apakah anda yakin untuk keluar dari Web Imigrasi?');
    if(y){
      $("#logout-form").submit();
    }
  }
  function iformat(icon) {
        var originalOption = icon.element;
        return $('<span><i class="fa ' + $(originalOption).data('icon') + '"></i> ' + icon.text + '</span>');
    }
    $('.select2').select2({
        width: "100%",
        templateSelection: iformat,
        templateResult: iformat,
        allowHtml: true
    });
  function change_role(id){
    $.ajax({
      url : '{{ url("change_role") }}',
      headers: {
        'X-CSRF-TOKEN': $('input[name="_token"]').val()
      },
      type : 'POST',
      data : {id:id},
      dataType : 'json',
      success:function(data){
        if(data.submit==1) {
          location.reload();
        }else{

        }
      }
    })
  }
</script>

<form id="logout-form" action="{{url('logout')}}" method="POST" style="display: none;"><input type="hidden" name="_token" value="{{csrf_token()}}"></form>
</body>
</html>
