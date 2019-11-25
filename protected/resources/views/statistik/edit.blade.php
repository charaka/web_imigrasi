@extends('template')
@section('title')
  <h1>
    Statistik
    <small>Edit</small>
  </h1>
@endsection
@section('content')
<div class="box box-primary">
  {!! Form::model($statistik, ['route' => ['statistik.update',$bulan.'/'.$tahun], 'class'=>'', 'files'=>'true','method'=>'PUT']) !!}
  <div class="box-body">
    @include('statistik/form', ['statistik'=>$statistik])
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

  });
</script>
@endsection