<div class="box-body">
<div class="form-group">
    {!! Form::label('menu_in', 'Menu Ina*') !!}
    {!! Form::text('menu_in', null, ['class' => 'form-control', 'placeholder' => 'Menu Ina','required'=>'required','id'=>'menu_in']) !!}
</div>
<div class="form-group">
    {!! Form::label('menu_en', 'Menu Eng*') !!}
    {!! Form::text('menu_en', null, ['class' => 'form-control', 'placeholder' => 'Menu Eng','required'=>'required','id'=>'menu_en']) !!}
</div>

  <div class="form-group">
    {!! Form::label('icon', 'Icon*') !!}
    {!! Form::select('icon', ['' => 'Select Icon...'] , null, ['class' => 'form-control select2','style'=>'width:100%','id'=>'tmpIcon','require'=>'require']) !!}
  </div>

<div class="form-group">
  {!! Form::label('model', 'Model*') !!}
  {!! Form::select('model', ['' => 'Model','kategori'=>'Kategori','post'=>'Post','pages'=>'Pages','galeri'=>'Galeri'] , null, ['class' => 'form-control select2','style'=>'width:100%','id'=>'model']) !!}
</div> 
<div class="form-group">
  {!! Form::label('posting', 'Posting*') !!}
  {!! Form::select('posting', ['' => 'posting'] , null, ['class' => 'form-control select2','style'=>'width:100%','id'=>'posting']) !!}
</div>
<div class="form-group">
  {!! Form::label('posisi', 'Posisi Menu*') !!}
  {!! Form::select('posisi', ['' => 'posisi','0'=>'Header'] +$header, null, ['id'=>'posisi','class' => 'form-control select2','style'=>'width:100%']) !!}
</div>
<div class="form-group">
  {!! Form::label('submenu', 'Sub Menu*') !!}
  {!! Form::select('submenu', ['' => 'submenu'] , null, ['id'=>'submenu','class' => 'form-control select2','style'=>'width:100%']) !!}
</div>
<div class="form-group">
  {!! Form::label('url', 'URL*') !!}
  {!! Form::textarea('url', null, ['class' => 'form-control', 'placeholder' => 'URL','id'=>'url']) !!}
  *jika link dari website lain
</div>
</div>
<!-- /.box-body -->
