<div class="box-body">
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        {!! Form::label('judul_in', 'Judul In*') !!}
        {!! Form::text('judul_in', null, ['class' => 'form-control', 'placeholder' => 'Judul In','id'=>'judul_in','required'=>'required']) !!}
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        {!! Form::label('konten_in', 'Konten In*') !!}
        {!! Form::textarea('konten_in', null, ['class' => 'form-control', 'placeholder' => 'Konten In','id'=>'konten_in', 'style' => 'width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;']) !!}
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        {!! Form::label('judul_en', 'Judul En*') !!}
        {!! Form::text('judul_en', null, ['class' => 'form-control', 'placeholder' => 'Judul En','id'=>'judul_en','required'=>'required']) !!}
      </div>
    </div>  
    <div class="col-md-12">
      <div class="form-group">
      {!! Form::label('konten_en', 'Konten En*') !!}
      {!! Form::textarea('konten_en', null, ['class' => 'form-control', 'placeholder' => 'Konten In','id'=>'konten_en', 'style' => 'width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;']) !!}
      </div>
    </div>      
  </div>
</div>

<div class="box-body">  
  <fieldset>
    <legend>Detail</legend>
    @if(!empty($details))
    <div class="row">
      <div class="col-md-12">
          @if(count($details)>0)
            @foreach($details as $detail)
              @if($detail->file)
              <div class="col-md-3">
                <a href="javascript:;" onclick="del_file({{ $detail->id }})" class="pull-right" style="padding-left: 4px"><i class="fa fa-times"></i></a>
                <div style="height: 123px;overflow: hidden">
                  <img src="{{ url($detail->file) }}" width="100%">
                </div>
              </div>
              @else
              No File
              @endif
            @endforeach 
          @endif
      </div>
    </div>
    @else

    @endif
    <div class="row">
      <div class="main_tmp">
        <div class="form-group">
          <div class="col-md-6">
            {!! Form::label('galeri_lampiran_', 'Galeri') !!}
            {!! Form::file('galeri_lampiran[]', ['id'=>'galeri_lampiran1','class' => 'galerix', 'placeholder' => 'Galeri', 'accept' => 'image/jpeg,image/x-png']) !!}
          </div>
        </div>
      </div>
      <div class="hide" id="galeriTemplate">
        <div class="form-group">
          <div class="col-md-6" style="margin-bottom: 10px">
            <label>Galeri <a href="javascript:;" class="removeButton" data-template="galeri" style="margin-left: 50px"><i class="fa fa-trash"></i></a></label>
            {{ Form::file('', ['class' => 'tmp_galeri_lampiran ','accept' => 'image/jpeg,image/x-png']) }}
          </div>
        </div>
      </div>
      <div style="margin-top: 85px">
        <div class="form-group">
          <div class="col-md-12" >
            <button class="btn btn-xs btn-primary pull-right btn-flat" type="button" id="btn_galeri" class="btn_galeri" data-template="galeri">Tambah Galeri</button>
          </div>
        </div>
      </div>
    </div>
  </fieldset>
<hr>
</div>
<!-- /.box-body -->


