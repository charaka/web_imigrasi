   <div class="box-body">
    <div class="row">
      <div class="col-md-12">
        <label>Bulan/Tahun</label>
        <!-- {!! $tgl = "" !!} -->
        @if($is_edit==1)
          <!-- {!! $tgl = $bulan."/".$tahun !!} -->
        @elseif($is_edit==0)
          <!-- {!! $tgl = "" !!} -->
        @endif
        <input type="text" name="bln_thn" class="form-control datetimepicker_bulantahun" required="" value="{{ $tgl }}">
      </div>
    </div>
    <hr>
    @if($is_edit==1)
      {!! $frm !!}
    @elseif($is_edit==0)
      {!! $frm !!}
    @else
    @endif
  </div>
  <!-- /.box-body -->
 