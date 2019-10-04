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
  <div class="row">
    <div class="form-group">
          <div class="col-md-12">
            {!! Form::label('url', 'URL') !!}
            {!! Form::text('url', null, ['class' => 'form-control', 'placeholder' => 'URL','id'=>'url']) !!}
          </div>
        </div>
  </div>
</div>


<!-- /.box-body -->


