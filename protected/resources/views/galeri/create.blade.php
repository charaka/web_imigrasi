@extends('template')
@section('title')
  <h1>
    Galeri
    <small>Create</small>
  </h1>
@endsection
@section('content')
<div class="box box-primary">
  {!! Form::model($galeri, ['route' => ['galeri.store'], 'class'=>'', 'files'=>'true']) !!}
  <div class="box-body">
    @include('galeri/form', ['galeri'=>$galeri])
  </div><!-- /.box-body -->
  <div class="box-footer">
    <button type="submit" class="btn btn-primary flat">Submit</button>
    <button type="reset" class="btn btn-danger flat">Reset</button>
  </div>  
  {!! Form::close() !!}
</div><!-- /.box-body out -->
@endsection

@section('script')
<script type="text/javascript">
  $(document).ready(function(){

    $('#btn_galeri').on('click', function() {
      var index = $(this).data('index');
      if (!index) {
        index = 1;
        $(this).data('index', 1);
      }
      index++;
      $(this).data('index', index);

      var template     = $(this).attr('data-template'),
        $templateEle = $('#' + template + 'Template'),
        $row         = $templateEle.clone().attr('id','ele_wrap'+index).insertBefore($templateEle).removeClass('hide'),
        $el1         = $row.find('input.tmp_galeri_lampiran').eq(0).attr('name', 'galeri_lampiran[]').attr('id','galeri_lampiran'+index);
        $row.on('click', '.removeButton', function(e) {
                 
                  $row.remove();
              });
    });


  });
</script>
@endsection