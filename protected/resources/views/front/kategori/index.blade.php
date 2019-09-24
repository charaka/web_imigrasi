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
                             <li class="active">{{ trans('label.berita') }}</li>
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
                                    <div class="post-head ">
                                        <div class="head-content">
                                            <h2 id="head_post" class="header-widget-page">{{ trans('label.berita') }}</h2>
                                        </div>
                                    </div>
                                    <!-- isi -->

                                    <div class="row">
                                        @foreach($datas AS $data)
                                        <div class="col-md-12 post-row post-list-data">
                                            <div class="left-image-post bg-dop-blue">
                                                <div class="push-10 push-10-t">
                                                    <i class="fa fa-newspaper-o fa-3x text-white-op"></i>
                                                </div>
                                            </div>
                                            <h3 class="post-title"><a href="#" title="">{{ $data->$judul }}</a></h3>
                                            <div class="post-content">
                                                <div class="date-news"><i class="fa fa-clock-o"></i>
                                                    {{ Date::setLocale($id_lang) }}
                                                    {{ Date::now()->format('j F Y') }}
                                                </div>
                                                <p>{{ strip_tags(substr($data->$konten,0,300)) }} <a class="read-more" href="{{ url('posts/'.$data->$slug) }}">{{ trans('label.baca') }}...<i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i></a></p>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <nav>
                                                {{ $datas->links() }}
                                               <!--  <ul class="pagination">
                                                    <li>
                                                        <a href="javascript:void(0)"><i class="fa fa-angle-left"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">1</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">2</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">3</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">4</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">5</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)"><i class="fa fa-angle-right"></i></a>
                                                    </li>
                                                </ul> -->
                                            </nav>
                                        </div>
                                        
                                    </div>
                                     
                                </div>
                            </div>
                            <div class="col-lg-3 sidebar right-sidebar animated fadeInRight push-10-t push-50" data-toggle="appear" data-class="animated fadeInRight">

                                <div class="widget widget-popular-posts">
                                    <h3 class="classic-title"><span>Berita Populer</span></h3>
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