@extends('front.template')
@section('content')
<!-- {!! $lang = Session::get('lang') !!} -->
<!-- {!! $slug = "slug_".$lang !!} -->
<!-- {!! $judul = "judul_".$lang !!} -->
<!-- {!! $konten = "konten_".$lang !!} -->
<!-- {!! $kategori = "kategori_".$lang !!} -->
<!-- {!! $id_lang = Session::get('lang')=="in"?"id":Session::get('lang') !!}  -->

<div class="page-title pt-dark pt-plax-md-dark" data-stellar-background-ratio="0.4">
    <div class="bg-overlay">
       <div class="content  content-boxed">
         <div class="row">

           <ol class="col-sm-6 text-left breadcrumb">
             <li><a href="{{ url('/') }}">Home</a></li>
             @if(!empty($data->kategori->$kategori))
                <li><a href="#">{{ $data->kategori->$kategori }}</a></li>
             @else
             @endif
             <li class="active">{{ $data->$judul }}</li>
           </ol>

         </div>
       </div>
    </div>
</div>
<div class="bg-white">
    <section class="content content-boxed " style="padding-top:50px;padding-bottom:30px;">
        <div class="row">
            <div class="col-lg-9 animated fadeInLeft push-50" data-toggle="appear" data-class="animated fadeInLeft">
                <div class="blog-post gallery-post pd-30">
                    <div class="post-head ">
                        <div class="head-content-post">
                            <h2 id="head_post">{{ $data->$judul }}</h2>
                            <ul class="post-meta">
                              <li>{{ trans('label.posting_oleh') }} Admin</li>
                              <li>
                                {{ Date::setLocale($id_lang) }}
                                {{ Date::parse(strtotime($data->tanggal_publish))->format('j F Y') }}
                              </li>
                              <li>View {{ $data->views }}</li>
                            </ul>

                        </div>
                        <div id="shareNative"></div>
                    </div>


                    <!-- isi -->
                    {!! $data->$konten !!}
                    <!-- end isi -->
                    @if(count($files)>0)
                    <div class="head-content">
                        <h5 class="header-widget-page">Download File</h5>
                        <div class="table-responsive push bg-white post-table">
                            <table class="table table-striped table-vcenter">
                                <tbody> 
                                        @foreach($files AS $file)
                                        <tr>
                                            <td width="80%">{{ $file->deskripsi }}</td>
                                            <td>
                                                <a href="{{ url($file->file) }}" target="_blank">
                                                <img alt="Downlaod File" src="{{ url('assets/front/img/favicons/download.png') }}" style="width: 20px;"></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                </tbody>
                          </table>
                        </div>
                    </div>
                    @else
                    @endif

                    @if(count($gambars)>0)
                    <div class="head-content">
                        <h5 class="header-widget-page">Galeri</h5>
                        <div class="row latest-posts-classic">
                                @foreach($gambars AS $gambar)
                                <div class="col-md-4 animated fadeIn video-list">
                                    <div class="img-container fx-img-rotate-r">
                                        <img class="img-responsive" src="{{ url($gambar->file) }}" width="100%">
                                        <div class="img-options">
                                            <div class="img-options-content">
                                                <h4 class="h6 font-w700 text-white-op push-15">Some Extra Info</h4>
                                                 <a class="bu" href="{{ url($gambar->file) }}" width="100%"><i class="fa fa-search-plus"></i> View</a>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                        </div>
                    </div>
                    @else
                    @endif

                    @if(count($videos)>0)
                    <div class="head-content">
                        <h5 class="header-widget-page">Video</h5>
                        <div class="row latest-posts-classic">
                            <div class="col-md-6 animated fadeIn video-list">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe id="videoIframe" class="embed-responsive-item"  src="https://www.youtube.com/embed/CPe6S9XbVug" frameborder="0" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    @endif
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
                                        <h5 class="post-title-bincang"><a href="{{ url('posts/'.$berpop->$slug) }}">{{ $berpop->$judul }}</a></h5>
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