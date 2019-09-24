<div class="box-body">  
  <fieldset>
    <legend>Image Slide Show</legend>
  
    <div class="row">
      <div class="main_tmp">
        @if(!empty($slide_show->image))
        <div class="form-group">
          <div class="col-md-12">
            <img src="{{ url($slide_show->image) }}" width="40%">
          </div>
        </div>
        @else
        @endif
        <div class="form-group">
          <div class="col-md-6">
            {!! Form::label('image', 'Image Slide Show') !!}
            {!! Form::file('image', ['id'=>'image','class' => 'galerix', 'placeholder' => 'Galeri', 'accept' => 'image/jpeg,image/x-png']) !!}
          </div>
        </div>
      </div>
    </div>
  </fieldset>
<hr>
</div>

<div class="box-body">
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        {!! Form::label('judul_in', 'Judul In*') !!}
        {!! Form::text('judul_in', null, ['class' => 'form-control required', 'placeholder' => 'Judul In','id'=>'judul_in']) !!}
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        {!! Form::label('deskripsi_in', 'Konten In*') !!}
        {!! Form::textarea('deskripsi_in', null, ['class' => 'form-control required summernote', 'placeholder' => 'Konten In','id'=>'deskripsi_in', 'style' => 'width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;']) !!}
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        {!! Form::label('judul_en', 'Judul En*') !!}
        {!! Form::text('judul_en', null, ['class' => 'form-control required', 'placeholder' => 'Judul En','id'=>'judul_en']) !!}
      </div>
    </div>  
    <div class="col-md-12">
      <div class="form-group">
      {!! Form::label('deskripsi_en', 'Konten En*') !!}
      {!! Form::textarea('deskripsi_en', null, ['class' => 'form-control required summernote', 'placeholder' => 'Konten In','id'=>'deskripsi_en', 'style' => 'width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;']) !!}
      </div>
    </div>      
  </div>
</div>


<!-- /.box-body -->


