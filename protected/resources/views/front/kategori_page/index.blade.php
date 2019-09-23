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
                             <li class="active">{{ $kat->$slug }}</li>
                           </ol>

                         </div>
                       </div>
                    </div>
                </div>

                <div class="bg-white">
                    <section class="content content-boxed "  style="padding-top:50px;padding-bottom:30px;">
                        <div class="row">
                            <div class="col-md-12 blog-box push-50">
                                <div class="tabbable tabs-right">
                                    <ul class="nav nav-tabs col-md-3">
                                        <!-- {!! $i=1 !!} -->
                                        @if(count($datas)>0)
                                            @foreach($datas AS $data)
                                                <li class="{{ $i==1?'active':'' }}"><a href="#{{ $data->$slug }}" data-toggle="tab">{{ $data->$judul }} </a></li>
                                                <!-- {!! $i++ !!} -->
                                            @endforeach
                                        @endif
                                    </ul>
                                    <div class="tab-content col-md-9 blog-box">
                                        <!-- {!! $ix=1 !!} -->
                                        @if(count($datas)>0)
                                            @foreach($datas AS $data)
                                            <div class="tab-pane fade fade-left {{ $ix==1?'active in':'' }} " id="{{ $data->$slug }}">                
                                                <div class="blog-post ">
                                                    <div class="post-head ">
                                                        <div class="head-content">
                                                            <h2 id="head_post" class="header-widget-page">{{ $data->$judul }}</h2>
                                                        </div>
                                                    </div>
                                                    <!-- isi -->
                                                    {!! $data->$konten !!}


                                                    <!-- end isi -->
                                                    @if(count($data->files)>0)
                                                    <div class="head-content">
                                                        <h5 class="header-widget-page">Download File</h5>
                                                        <div class="table-responsive push bg-white post-table">
                                                            <table class="table table-striped table-vcenter">
                                                                <tbody> 
                                                                        @foreach($data->files AS $file)
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

                                                    
                                                    @if(count($data->videos)>0)
                                                    <div class="head-content">
                                                        <h5 class="header-widget-page">Video</h5>
                                                        <div class="row latest-posts-classic">
                                                            @foreach($data->videos AS $video)
                                                                <div class="col-md-6 animated fadeIn video-list">
                                                                    <div class="embed-responsive embed-responsive-16by9">
                                                                        <iframe id="videoIframe" class="embed-responsive-item"  src="https://www.youtube.com/embed/{{ $video->file }}" frameborder="0" allowfullscreen></iframe>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    @else
                                                    @endif
                                                </div>
                                            </div>
                                                <!-- {!! $ix++ !!} -->
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
@endsection