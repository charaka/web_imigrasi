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
                             <h2> Video & Gallery </h2>
                           </div>
                           <ol class="col-sm-6 text-right breadcrumb">
                             <li><a href="#">Home</a></li>
                             <li class="active">Video & Gallery</li>
                           </ol>

                         </div>
                       </div>
                    </div>
                </div>

                <div class="bg-white">
                    <section class="content content-boxed "  style="padding-top:50px;padding-bottom:30px;">
                        <div class="row items-push  push-30">
                            <div class="col-md-7 border-right-slide">
                                <div class="video-container">
                                  
                                    <iframe class="embed-responsive-item" width="560" height="315" src="https://www.youtube.com/embed/b5uuJAp1pBA?rel=0&amp;controls=0&amp;showinfo=0&amp;modestbranding=1autohide=1&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                                </div>
                                <div class=" text-right" style=" margin-bottom: 0; margin-top:30px;">
                                        <!-- Button -->

                                        <a href="#" class="bu" target="_blank">Lihat Video Lainnya <i class="fa fa-angle-right"></i></a>
                                    </div>
                             </div>
                             <div class="col-md-5">
                                <div class="row count-gall push-30">
                                    @if(count($datas)>0)
                                        @foreach($datas AS $data)
                                        <div class="col-xs-6 animated fadeIn">
                                            <div class="img-container fx-img-rotate-r">
                                                <img class="img-responsive" src="{{ url($data->file) }}" alt="">
                                                <div class="img-options">
                                                    <div class="img-options-content">
                                                        <h4 class="h6 font-w700 text-white-op push-15">{{ $data->$judul }}</h4>
                                                         <a class="bu" href="{{ url('galeris/'.$data->$slug) }}"><i class="fa fa-search-plus"></i> View</a>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    @else
                                    <center><i>No Data to Display</i></center>
                                    @endif
                                </div>
                                

                               
                             </div>
                        </div>
                    </section>
                </div>
                
@endsection