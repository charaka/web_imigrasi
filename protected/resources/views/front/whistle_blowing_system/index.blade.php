@extends('front.template')
@section('content')
<!-- {!! $lang = Session::get('lang') !!} -->
<!-- {!! $slug = "slug_".$lang !!} -->
<!-- {!! $judul = "judul_".$lang !!} -->
<!-- {!! $konten = "konten_".$lang !!} -->
<!-- {!! $id_lang = Session::get('lang')=="in"?"id":Session::get('lang') !!}  -->

<div class="page-title pt-dark pt-plax-md-dark" data-stellar-background-ratio="0.4">
    <div class="bg-overlay">
       <div class="content  content-boxed">
         <div class="row">

           <ol class="col-sm-6 text-left breadcrumb">
             <li><a href="#">Home</a></li>
             <li class="active">Whistle Blowing System</li>
           </ol>

         </div>
       </div>
    </div>
</div>

<div class="bg-white">
    <section class="content content-boxed"  style="padding-top:50px;padding-bottom:30px;">
        <div class="row items-push push-50-t push-30">
            <div class="col-md-6 col-md-offset-3">
                <form class="form-horizontal" action="{{ url('send_mail') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material form-material-primary">
                                <input class="form-control" type="email" id="email" name="email" placeholder="Enter your email..">
                                <input class="form-control" type="hidden" id="perihal" name="perihal" value="Whistle Blowing System" placeholder="Enter your firstname..">
                                <input class="form-control" type="hidden" id="mailto" name="mailto" value="wbs.kanimdps@gmail.com">
                                <label for="email">Email</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material form-material-primary">
                                 <input class="form-control" type="text" id="subject" name="subject" placeholder="Enter your subject..">
                                <label for="subject">{{ trans('label.subjek')}}</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="form-material form-material-primary">
                                <textarea class="form-control" id="msg" name="msg" rows="7" placeholder="Enter your message.."></textarea>
                                <label for="msg">{{ trans('label.deskripsi')}}</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                            <button class="btn btn-block btn-primary" type="submit"><i class="fa fa-send pull-left"></i> {{ trans('label.kirim_komplain')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

@endsection