<div class="box-body">
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        {!! Form::label('role_title', 'Role Title*') !!}
        {!! Form::text('role_title', null, ['class' => 'form-control', 'placeholder' => 'Role Title','required'=>'required','id'=>'role_title']) !!}
      </div>
    </div>
<!--     <div class="col-md-6">
      <div class="form-group">
        {!! Form::label('role_slug', 'Role Slug*') !!}
        {!! Form::text('role_slug', null, ['class' => 'form-control', 'placeholder' => 'Role Slug','required'=>'required','id'=>'role_slug']) !!}
      </div>
    </div> -->
    <div class="col-md-12">
      <div class="form-group">
        {!! Form::label('description', 'Description*') !!}
        {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Role Slug','required'=>'required','id'=>'description']) !!}
      </div>
    </div>
  </div>
</div>
<!-- /.box-body -->
