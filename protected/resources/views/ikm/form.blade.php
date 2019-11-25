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
      @foreach($statistik AS $row)
      <div class="row">
        <div class="col-md-8">
          <label>Statistik</label>
          <input type="text" name="kategori[]" class="form-control" readonly value="{{ $row->kategori_statistik->kategori_in }}">
          <input type="hidden" name="id[]" class="form-control" value="{{ $row->id }}">
        </div>
        <div class="col-md-2">
          <label>Jumlah</label>
          <input type="text" name="jml[]" class="form-control" value="{{ $row->jml }}">
        </div>
        <div class="col-md-2">
          <label>Responden</label>
          <input type="text" name="total_respon[]" class="form-control" value="{{ $row->total_respon }}">
        </div>
      </div>
      @endforeach
    @elseif($is_edit==0)
      @foreach($kategori_statistik AS $row)
      <div class="row">
        <div class="col-md-8">
          <label>Statistik</label>
          <input type="text" name="kategori[]" class="form-control" readonly value="{{ $row->kategori_in }}">
          <input type="hidden" name="id_kategori[]" class="form-control" value="{{ $row->id }}">
        </div>
        <div class="col-md-2">
          <label>Jumlah</label>
          <input type="text" name="jml[]" class="form-control">
        </div>
        <div class="col-md-2">
          <label>Responden</label>
          <input type="text" name="total_respon[]" class="form-control">
        </div>
      </div>
      @endforeach
    @endif
  </div>
  <!-- /.box-body -->
 