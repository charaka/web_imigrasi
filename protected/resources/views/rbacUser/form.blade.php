<div class="box-body">
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        {!! Form::label('name', 'Nama*') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nama','required'=>'required','id'=>'name']) !!}
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        {!! Form::label('email', 'E-Mail*') !!}
        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email','required'=>'required','id'=>'email']) !!}
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        {!! Form::label('password', 'Password*') !!}
        <input type="password" name="password" id="password" class="form-control" >
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <label>Role</label>
        <select class="form-control select2" id="role_id" name="role_id[]" multiple>
          @foreach($role AS $row)
            <!-- {!! $select = "" !!} -->
            @foreach($rbac_user->role_user AS $role)   
              @if($row->id==$role->role_id)
                <!-- {!! $select = "selected" !!} -->
              @endif
            @endforeach
          <option value="{{ $row->id }}" {{ $select }}>{{ $row->role_title }}</option>
          @endforeach
        </select>
      </div>
    </div>
  </div>
</div>
<!-- /.box-body -->
