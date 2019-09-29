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
                           <div class="col-sm-6 title-des-blog">
                             <h2> {{ trans('label.galeri') }} </h2>
                           </div>
                           <ol class="col-sm-6 text-right breadcrumb">
                             <li><a href="#">Home</a></li>
                             <li><a href="{{ url('galeri-all') }}">{{ trans('label.video') }} & {{ trans('label.galeri') }}</a></li>
                             <li class="active">{{ trans('label.galeri') }}</li>
                           </ol>

                         </div>
                       </div>
                    </div>
                </div>

                <div class="bg-white">
                    <section class="content content-boxed "  style="padding-top:50px;padding-bottom:30px;">
                        <div class="row items-push push-30">
                            <div class="col-sm-7 col-lg-8" data-toggle="appear" data-class="animated zoomIn">
                                <!-- Timeline -->
                                <div class="block">
                                    <div class="block-content">
                                         <!-- Slider with dots and hover arrows -->
                                        <div class="js-slider slick-nav-white slick-nav-hover" data-slider-dots="true" data-slider-arrows="true" data-slider-autoplay="true" data-slider-autoplay-speed="3000">
                                            @if(!empty($datas))
                                               
                                                    @foreach($datas->detail_galeri AS $datax)
                                                    <div>
                                                        <div class="post-head-gall js-gallery-advanced">             

                                                            <a href="#" class="img-lightbox" title="Upgrading Fungsionaris Periode 2018/2019">

                                                            <div class="thumb-overlay"><i class="fa fa-arrows-alt"></i></div>
                                                            <img src="{{ url($datax->file) }}" class="img-responsive absolute-img" style="min-height: 480px;" alt=""/></a>
                                                                
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                
                                            @else
                                            @endif
                                        </div>

                                        <div class="post-head ">
                                            <div class="head-content-post">

                                                <h2>{{ $datas->$judul }}</h2>
                                                <ul class="post-meta">
                                                    <li>{{ trans('label.oleh')}} Admin</li>
                                                    <li>{{ Date::setLocale($id_lang) }}
                                                {{ Date::parse(strtotime($datas->created_at))->format('j F Y') }}</li>
                                                </ul>
                                            </div>

                                            <div class="post-bottom clearfix">

                                                <div class="post-share">
                                                    <span>{{ trans('label.share') }}</span>
                                                     <div id="shareNative"></div>
                                                </div>
                                            </div>
                                            
                                        </div>

                                 


                                    </div>
                                </div>
                                <!-- END Timeline -->
                            </div>

                            <!--Sidebar-->
                            
                            <div class="col-sm-5 col-lg-4" data-toggle="appear" data-class="animated zoomIn">
                                <!-- Products -->
                                <div class="block">

                                    <div class="block-content">
                                        <!-- Start Project Content -->

                                        <h4 class="classic-title"><span>{{ trans('label.galeri_deskripsi') }}</span></h4>
                                        {!! $datas->$konten !!}
                                        <h4 class="classic-title"><span>{{ trans('label.galeri_detail') }}</span></h4>
                                            <ul style="list-style: none; padding: 0; margin-bottom: 30px;">
                                                <li ><strong>{{ trans('label.title')}}</strong> {{ $datas->$judul }}</li>
                                                <li><strong>{{ trans('label.dibuat')}}</strong>{{ Date::setLocale($id_lang) }}
                                                {{ Date::parse(strtotime($datas->created_at))->format('j F Y') }}</li>
                                        </ul>
                                        
                                    </div>
                                </div>
                                <!-- END Products -->

                            </div>
                        </div>

                        <div class="row items-push  push-30">
                            @if(count($lains)>0)
                                @foreach($lains AS $lain)
                                <div class="col-xs-6 animated fadeIn">
                                    <div class="img-container fx-img-rotate-r">
                                        <img class="img-responsive" src="{{ url($lain->file) }}" alt="">
                                        <div class="img-options">
                                            <div class="img-options-content">
                                                <h4 class="h6 font-w700 text-white-op push-15">{{ $lain->$judul }}</h4>
                                                 <a class="bu" href="{{ url('galeris/'.$lain->$slug) }}"><i class="fa fa-search-plus"></i> View</a>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div>
                        
                    </section>
                </div>

@endsection