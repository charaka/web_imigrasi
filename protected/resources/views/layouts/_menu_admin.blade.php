<li>
  <a href="{{ url('pengajuan') }}">
    <i class="fa fa-th"></i> <span>Pengajuan Izin</span>
    <!-- <span class="pull-right-container">
      <small class="label pull-right bg-green">new</small>
    </span> -->
  </a>
</li>
<li class="treeview">
  <a href="#">
    <i class="fa fa-dashboard"></i> <span>Setting</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu" style="display: none;">
    <li><a href="{{ url('jenisIzin') }}"><i class="fa fa-circle-o"></i> Jenis Izin</a></li>
    <li><a href="{{ url('masterSurat') }}"><i class="fa fa-circle-o"></i> Master Surat</a></li>
  </ul>
</li>
