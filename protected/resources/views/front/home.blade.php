@extends('front.template')
@section('content')
                <!-- Page Content -->
                <div class="bg-white">
                    <section class="content-boxed box-no-width">
                        <div class="row ">
                            <div class="col-sm-12">
                                <!-- Warning Alert -->
                                <div class="alert alert-warning alert-dismissable" style="margin-bottom: 0; padding: 15px 40px 15px 30px;">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="opacity: 1;"><i class="fa fa-times-circle"></i></button>

                                    <div class="coun-info">
                                         <div class="js-slider remove-margin-b" data-slider-autoplay="true" data-slider-autoplay-speed="6000" data-slider-dots="true" >
                                            <div>

                                                <div class="icon-left">
                                                    <i class="si si-info"></i>
                                                </div>
                                                <div class="content-info">
                                                    
                                                    <h3 class="font-w300 ">Warning

                                                        {!! $id_lang = Session::get('lang') !!}
                                                        {{ Date::setLocale($id_lang) }}

                                                        {{ Date::now()->format('l j F Y H:i:s') }}
                                                    </h3>
                                                    <p>Virtual Assistant Jamie will not be available to chat on 15 September 2019, 0000hrs to 0800hrs (Singapore Time) due to scheduled maintenance. <a class="alert-link" href="javascript:void(0)">attention</a>!</p>
                                                </div>


                                            </div>
                                            <div>
                                                <div class="icon-left">
                                                    <i class="si si-info"></i>
                                                </div>
                                                <div class="content-info">
                                                    <h3 class="font-w300 ">Warning</h3>
                                                    <p>Please pay <a class="alert-link" href="javascript:void(0)">attention</a>!</p>
                                                </div>
                                            </div>
                                         </div>

                                    </div>
                                    
                                </div>
                                <!-- END Warning Alert -->
                            </div>
                        </div>
                    </section>
                </div>
                <!-- END Page Content -->

                <div class="bg-white">
                    <section class="content-boxed box-no-width" >
                        <div class="row no-margin">
                            <div class="col-sm-6 col-lg-3 no-padding ">
                                <a class="block block-link-hover3 text-center bg-gainsboro-block no-margin" href="javascript:void(0)"  data-toggle="modal" data-target="#modal-layananwni">
                                    <div class="block-content ">
                                        <img class="block_img" src="{{ url('assets/front/img/avatars/persona_sc.png') }}" alt="Persona_SC">
                                    </div>
                                    <div class="block-content block-content-full block-content-mini" style="padding-bottom: 20px;">
                                        Layanan WNI
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-3 no-padding">
                                <a class="block block-link-hover3 text-center bg-gray-block no-margin" href="javascript:void(0)">
                                    <div class="block-content ">
                                        <img class="block_img" src="{{ url('assets/front/img/avatars/persona_visitor.png') }}" alt="Persona_SC">
                                    </div>
                                    <div class="block-content block-content-full block-content-mini" style="padding-bottom: 20px;">
                                        Izin Tinggal Kunjungan
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-3 no-padding">
                                <a class="block block-link-hover3 text-center bg-gainsboro-block no-margin" href="javascript:void(0)">
                                    <div class="block-content ">
                                        <img class="block_img" src="{{ url('assets/front/img/avatars/persona_pass.png') }}" alt="Persona_SC">
                                    </div>
                                    <div class="block-content block-content-full block-content-mini" style="padding-bottom: 20px;">
                                        Izin Tinggal Terbatas
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-lg-3 no-padding">
                                <a class="block block-link-hover3 text-center bg-gray-block no-margin" href="javascript:void(0)">
                                    <div class="block-content ">
                                        <img class="block_img" src="{{ url('assets/front/img/avatars/persona_pr.png') }}" alt="Persona_SC">
                                    </div>
                                    <div class="block-content block-content-full block-content-mini" style="padding-bottom: 20px;">
                                        Izin Tinggal Tetap
                                    </div>
                                </a>
                            </div>
                        </div>

                    </section>
                </div>

                <section class="content-boxed box-no-width" >
                   <!-- Slider with dots and hover arrows -->
                    <div class="fw-slider">
                        <div class="js-slider slick-nav-white slick-nav-hover " data-slider-dots="true" data-slider-arrows="true" data-slider-autoplay="true" style="margin-bottom: 0;">
                            <a href="#">
                                <div class="full-screen" >
                                    <img class="img-responsive" src="{{ url('assets/front/img/slider/1.png') }}" alt="">
                                </div>
                            </a>
                            <a href="#">
                                <div class="full-screen">
                                    <img class="img-responsive" src="{{ url('assets/front/img/slider/2.jpg') }}" alt="">
                                </div>
                            </a>
                            <a href="#">
                                <div class="full-screen" >
                                    <img class="img-responsive" src="{{ url('assets/front/img/slider/3.png') }}" alt="">
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- END Slider with dots and hover arrows -->
                </section>

                <div class="bg-white">
                    <section class="content content-boxed" style="padding-top:50px;padding-bottom:30px;">
                        <div class="row">
                            <div class="col-lg-8 animated fadeInUp" data-toggle="appear" data-class="animated fadeInUp">
                                <div class="latest-posts-classic push-30">
                                    <h3 class="classic-title"><span>{{ trans('label.berita') }}</span></h3>
                                    <div class="row">   
                                        <div class="col-sm-6 ">
                                            <div class="block list-news" style="margin-bottom: 15px;">
                                                <table class="block-table text-center">
                                                    <tbody>
                                                        <tr>
                                                            <td class="bg-dop-blue" style="width: 20%;">
                                                                <div class="push-10 push-10-t">
                                                                    <i class="fa fa-newspaper-o fa-3x text-white-op"></i>
                                                                </div>
                                                            </td>
                                                            <td style="width: 80%; padding:0 10px!important;">
                                                                <a href="#" alt="">
                                                                    <h4>Informasi Pendaftaran dan Pelaksanaan Wisuda Universitas Udayana Ke-133 </h4> 
                                                                    <div class="date-news"><i class="fa fa-clock-o"></i> 14 Agustus 2019</div>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 ">
                                            <div class="block list-news" style="margin-bottom: 15px;">
                                                <table class="block-table text-center">
                                                    <tbody>
                                                        <tr>
                                                            <td class="bg-dop-blue" style="width: 20%;">
                                                                <div class="push-10 push-10-t">
                                                                    <i class="fa fa-newspaper-o fa-3x text-white-op"></i>
                                                                </div>
                                                            </td>
                                                            <td style="width: 80%; padding:0 10px!important;">
                                                                <a href="#" alt="">
                                                                    <h4>Informasi Pendaftaran dan Pelaksanaan Wisuda Universitas Udayana Ke-133 </h4> 
                                                                    <div class="date-news"><i class="fa fa-clock-o"></i> 14 Agustus 2019</div>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">   
                                        <div class="col-sm-6 ">
                                            <div class="block list-news" style="margin-bottom: 15px;">
                                                <table class="block-table text-center">
                                                    <tbody>
                                                        <tr>
                                                            <td class="bg-dop-blue" style="width: 20%;">
                                                                <div class="push-10 push-10-t">
                                                                    <i class="fa fa-newspaper-o fa-3x text-white-op"></i>
                                                                </div>
                                                            </td>
                                                            <td style="width: 80%; padding:0 10px!important;">
                                                                <a href="#" alt="">
                                                                    <h4>Informasi Pendaftaran dan Pelaksanaan Wisuda Universitas Udayana Ke-133 </h4> 
                                                                    <div class="date-news"><i class="fa fa-clock-o"></i> 14 Agustus 2019</div>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 ">
                                            <div class="block list-news" style="margin-bottom: 15px;">
                                                <table class="block-table text-center">
                                                    <tbody>
                                                        <tr>
                                                            <td class="bg-dop-blue" style="width: 20%;">
                                                                <div class="push-10 push-10-t">
                                                                    <i class="fa fa-newspaper-o fa-3x text-white-op"></i>
                                                                </div>
                                                            </td>
                                                            <td style="width: 80%; padding:0 10px!important;">
                                                                <a href="#" alt="">
                                                                    <h4>Informasi Pendaftaran dan Pelaksanaan Wisuda Universitas Udayana Ke-133 </h4> 
                                                                    <div class="date-news"><i class="fa fa-clock-o"></i> 14 Agustus 2019</div>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" >
                                        <div class="col-sm-12">
                                            <div class="text-right " style="margin: 15px 0;">
                                                <a href="#" class="bu">Tampilkan semua <i class="fa fa-angle-right"></i></a>    

                                            </div>
                                            <div class="clearfix"></div>   
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="col-lg-4 animated fadeInUp" data-toggle="appear" data-class="animated fadeInUp">
                                <div class="latest-posts-classic">
                                    <h3 class="classic-title"><span>IKM & Statistik</span></h3>

                                    <div class="block-content">
                                        <div class="pull-t pull-r-l">

                                            <div class="js-slider remove-margin-b" data-slider-autoplay="true" data-slider-autoplay-speed="2500">
                                                <div>
                                                    <table class="table remove-margin-b font-s13">
                                                        <tbody>
                                                            <tr>
                                                                <td class="font-w600">
                                                                    <a href="javascript:void(0)">Media Sosial</a>
                                                                </td>
                                                                <td class="hidden-xs text-muted text-right" style="width: 70px;">23:01</td>
                                                                <td class="font-w600 text-success text-right" style="width: 70px;">+ $21</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="font-w600"><a href="javascript:void(0)">Media Sosial</a></td>
                                                                <td class="hidden-xs text-muted text-right">22:15</td>
                                                                <td class="font-w600 text-success text-right">+ $52</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="font-w600"><a href="javascript:void(0)">Media Sosial</td>
                                                                <td class="hidden-xs text-muted text-right">22:01</td>
                                                                <td class="font-w600 text-success text-right">+ $16</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="font-w600"><a href="javascript:void(0)">Media Sosial</a></td>
                                                                <td class="hidden-xs text-muted text-right">21:45</td>
                                                                <td class="font-w600 text-success text-right">+ $23</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div>
                                                    <table class="table remove-margin-b font-s13">
                                                        <tbody>
                                                            <tr>
                                                                <td class="font-w600">
                                                                    <a href="javascript:void(0)">Visitor</a>
                                                                </td>
                                                                <td class="hidden-xs text-muted text-right" style="width: 70px;">16:10</td>
                                                                <td class="font-w600 text-success text-right" style="width: 70px;">+ $21</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="font-w600"><a href="javascript:void(0)">Visitor</a></td>
                                                                <td class="hidden-xs text-muted text-right">16:06</td>
                                                                <td class="font-w600 text-success text-right">+ $48</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="font-w600"><a href="javascript:void(0)">Visitor</a></td>
                                                                <td class="hidden-xs text-muted text-right">15:21</td>
                                                                <td class="font-w600 text-success text-right">+ $52</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <div class="bg-yellow">
                    <section class="content content-boxed " >
                        <div class="row">
                            <div class="section-header item-title push-50  animated fadeInUp" data-toggle="appear" data-class="animated fadeInUp">
                                <h3 class="section-title text-center">Monitoring Nomor Antrian Layanan Paspor</h3>
                            </div>
                            <div class="col-sm-offset-2 col-sm-8 animated fadeInUp" data-toggle="appear" data-class="animated fadeInUp">
                                <div class="block list-news push-50" >
                                    <table class="block-table text-center">
                                        <tbody>
                                            <tr>
                                                <td class="bg-dop-blue" style="width: 20%;">
                                                    <a href="#">
                                                        <div class=" circle-logo-yellow">
                                                            <img class="block_img" src="{{ url('assets/front/img/avatars/antri.png') }}" alt="antri" style="width: 70px; margin-top: 5px;">
                                                        </div>
                                                    </a>
                                                </td>
                                                <td style="width: 80%; padding:0 10px!important;">
                                                    <div class="no-antrian text-center font-w700">00028</div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </section>
                </div>
@endsection