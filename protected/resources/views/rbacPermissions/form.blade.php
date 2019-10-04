<div class="box-body">
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        {!! Form::label('menu', 'Nama Menu*') !!}
        {!! Form::text('menu', null, ['class' => 'form-control', 'placeholder' => 'Menu','required'=>'required','id'=>'menu']) !!}
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        {!! Form::label('slug', 'Slug*') !!}
        {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Slug','required'=>'required','id'=>'slug']) !!}
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        {!! Form::label('icon', 'Icon*') !!}
        {!! Form::select('icon', ['' => 'Select Icon...'] , null, ['class' => 'form-control select2','style'=>'width:100%','id'=>'tmpIcon','require'=>'require']) !!}
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        {!! Form::label('parent', 'Parent*') !!}
        {!! Form::select('parent', ['' => 'Select Parent...']+$parent , (isset($parentx)?($parentx?$parentx:$rbacPermissions->parent):''), ['class' => 'form-control select2','style'=>'width:100%','id'=>'parent','require'=>'require']) !!}
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        {!! Form::label('sub_parent', 'Sub Parent*') !!}
        {!! Form::select('sub_parent', ['' => 'Select Sub Parent...'] , null, ['class' => 'form-control select2','style'=>'width:100%','id'=>'sub_parent','require'=>'require']) !!}
      </div>
    </div>
  </div>
</div>
<!-- /.box-body -->
