<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="height: auto;position: relative;max-height: calc(100vh - 75px);min-height: 100%;overflow: auto;/*! width: 260px; */z-index: 4;padding-bottom: 100px;padding: 6px;" >
      <!-- Sidebar user panel -->
     <!--  <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ url('assets/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p class="profile_username">{{ Auth::user()->name }}</p>
          <a href="#"><span class="profile_active_role">{{ Auth::user()->is_admin ? 'Administrator' : 'Pengguna' }}</span></a>
        </div>
      </div> -->
      <!-- search form -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        {!! Session::get('navigation') !!}
      </ul>
    </section>
    <div class="sidebar-background" style="background-image: url('{{ url('assets/dist/img/sidebar.jpg') }}'); position: absolute;z-index: 1;height: 100%;width: 100%;display: block;top: 0;left: 0;background-size: cover;background-position: center center;"></div>
    <!-- /.sidebar -->
  </aside>