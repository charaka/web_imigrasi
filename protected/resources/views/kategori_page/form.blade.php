{!! Form::model($kategori_page, ['method' => $method, 'id'=>'form-kategori', 'route' => $route, 'class' => 'validated_form', 'files'=> true]) !!}
<div class="row">
	<div class="col-xs-12">
		<div class="form-group">
			{!! Form::label('kategori_in', 'Kategori Ina') !!}
			{!! Form::text('kategori_in', $kategori_page->kategori_in, array('id' => 'kategori_in', 'class' => 'form-control', 'placeholder'=>'Kategori Ina','required'=>'required')) !!}
		</div>
	</div>
	<div class="col-xs-12">
		<div class="form-group">
			{!! Form::label('kategori_en', 'Kategori Ina') !!}
			{!! Form::text('kategori_en', $kategori_page->kategori_en, array('id' => 'kategori_en', 'class' => 'form-control required', 'placeholder'=>'Kategori Eng','required'=>'required')) !!}
		</div>
	</div>
	<div class="col-xs-12">
		<div class="form-group">
		  {!! Form::label('parent', 'Parent') !!}
		  {!! Form::select('parent', ['' => 'Parent']+$parent , $kategori_page->parent, ['class' => 'form-control select2','style'=>'width:100%']) !!}
		</div>
	</div>
	<div class="col-xs-12">
		<div class="form-group">
		  {!! Form::label('icon', 'Icon') !!}
		  @if($kategori_page->icon)
		  <div class="row">
		  	<div class="col-md-12">
			  	<div class="col-md-3" style="border:1px solid #efefef">
			  		<img src="{{ url($kategori_page->icon) }}" width="100%">
			  	</div>
		  	</div>
		  </div>
		  <br>
		  @else
		  @endif
		  {!! Form::file('icon', NULL, array('id' => 'icon', 'class' => 'form-control required', 'placeholder'=>'Icon')) !!}
		</div>
	</div>
</div>
<br>
<hr>
<div class="row">
	<div class="col-md-12">
		<center>
			<button class="btn btn-md btn-primary btn-flat" type="submit" data-toggle="tooltip" data-placement="top" title="Simpan data"><i class="fa fa-save"></i> Simpan</button> 
 					<a href="#" data-dismiss="modal" class="btn btn-md btn-danger btn-flat" data-toggle="tooltip" data-placement="top" title="Kembali ke list data"><i class="fa fa-undo"></i> Kembali</a>
		</center>
	</div>
</div>
{!! Form::close() !!}

<script type="text/javascript">
	$(document).ready(function(){
		$('.select2').select2();
	})
</script>
