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
             <li class="active">FAQs</li>
           </ol>

         </div>
       </div>
    </div>
</div>

<div class="bg-white">
    <section class="content content-boxed " style="padding-top:50px;padding-bottom:30px;">
        <div class="row">
            <div class="col-lg-9 animated fadeInLeft push-50" data-toggle="appear" data-class="animated fadeInLeft">
                <div class="blog-post pd-30">
                    {!! $htm !!} 
                </div>
            </div>
            <div class="col-lg-3 sidebar right-sidebar animated fadeInRight push-10-t push-50" data-toggle="appear" data-class="animated fadeInRight">

                <div class="widget widget-popular-posts">
                    <h3 class="classic-title"><span>{{ trans('label.berita') }}</span></h3>
                    <ul>
                        @if(count($berita_populer)>0)
                        @foreach($berita_populer AS $key_b=>$berpop)
                            <li>
                                <div class="bg-dop-blue">
                                    <div class="push-10 push-10-t">
                                        <i class="fa fa-newspaper-o fa-2x text-white-op"></i>
                                    </div>
                                </div>
                                <div class="widget-content">
                                    <h5 class="post-title-bincang"><a href="{{ url($berpop->$slug) }}">{{ $berpop->$judul }}</a></h5>
                                    <div class="date-news"><i class="fa fa-clock-o"></i> 
                                        {{ Date::setLocale($id_lang) }}
                                        {{ Date::now()->format('j F Y') }}
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </li>
                        @endforeach
                    @else
                    @endif                       
                    </ul>
                </div>

            </div>
        </div>
    </section>
</div>
@endsection