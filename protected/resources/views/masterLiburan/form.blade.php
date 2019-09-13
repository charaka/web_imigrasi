<div class="box-body">
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        {!! Form::label('nama_libur', 'Nama Liburan*') !!}
        {!! Form::text('nama_libur', null, ['class' => 'form-control', 'placeholder' => 'Nama Liburan','required'=>'required','id'=>'nama_libur']) !!}
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        {!! Form::label('role_slug', 'Role Slug*') !!}
        <select class="form-control select2" id="jenis_libur" name="jenis_libur">
            <option value="">Pilih...</option>
            @foreach($jenis_libur AS $key=>$value)
              <option value="{{ $value->id }}" {{ $value->id==$masterLiburan->jenis_libur?"selected":''}}>{{ $value->jenis_libur }}</option>
            @endforeach
        </select>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        {!! Form::label('tgl_libur', 'Nama Liburan*') !!}
        {!! Form::text('tgl_libur', !empty($masterLiburan)?date("d/m/Y",strtotime($masterLiburan->tgl_libur)):"", ['class' => 'form-control datepicker_input', 'placeholder' => 'Nama Liburan','required'=>'required','id'=>'tgl_libur']) !!}
      </div>
    </div>
  </div>
</div>
<!-- /.box-body -->
