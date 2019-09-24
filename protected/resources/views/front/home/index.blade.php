@extends('front.template')
@section('content')
<!-- {!! $lang = Session::get('lang') !!} -->
<!-- {!! $slug = "slug_".$lang !!} -->
<!-- {!! $judul = "judul_".$lang !!} -->
<!-- {!! $konten = "konten_".$lang !!} -->
<!-- {!! $kategori = "kategori_".$lang !!} --> 
<!-- {!! $id_lang = Session::get('lang')=="in"?"id":Session::get('lang') !!}  -->
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
                                            @if(count($pengumumans)>0)
                                                @foreach($pengumumans AS $key=>$pengumuman)
                                                <div>
                                                    <div class="icon-left">
                                                        <i class="si si-info"></i>
                                                    </div>
                                                    <div class="content-info">
                                                        <h3 class="font-w300 ">{{ $pengumuman->$judul }}</h3>
                                                        {!! $pengumuman->$konten !!}
                                                    </div>
                                                </div>
                                                @endforeach
                                            @endif
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
                            @if(count($kategori_page)>0)
                                @foreach($kategori_page AS $key_kat_page=>$kat_page)
                                    <div class="col-sm-6 col-lg-3 no-padding ">
                                        <a class="block block-link-hover3 text-center bg-gainsboro-block no-margin" href="javascript:void(0)" onclick="mod_layanan({{ $kat_page->id }})">
                                            <div class="block-content ">
                                                <img class="block_img" src="{{ url($kat_page->icon) }}" alt="Persona_SC">
                                            </div>
                                            <div class="block-content block-content-full block-content-mini" style="padding-bottom: 20px;">
                                                {{ $kat_page->$kategori }}
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            @else
                            @endif
                        </div>

                    </section>
                </div>

                <section class="content-boxed box-no-width" >
                   <!-- Slider with dots and hover arrows -->
                    <div class="fw-slider">
                        <div class="js-slider slick-nav-white slick-nav-hover " data-slider-dots="true" data-slider-arrows="true" data-slider-autoplay="true" style="margin-bottom: 0;">
                            @if(count($slide_show)>0)
                                @foreach($slide_show AS $key=>$slide)
                                <a href="#">
                                    <div class="full-screen" >
                                        <img class="img-responsive" src="{{ url($slide->image) }}" alt="">
                                    </div>
                                </a>
                                @endforeach
                            @else
                            @endif
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
                                    @if(count($beritas)>0)
                                        @foreach($beritas AS $berita)
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
                                                                <a href="{{ url('posts/'.$berita->$slug) }}" alt="">
                                                                    <h4>{{ $berita->$judul }} </h4> 
                                                                    <div class="date-news"><i class="fa fa-clock-o"></i> {{ Date::now()->format('j F Y') }}</div>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        @endforeach
                                    @else
                                    @endif
                                    
                                    <div class="row" >
                                        <div class="col-sm-12">
                                            <div class="text-right " style="margin: 15px 0;">
                                                <a href="{{ url('kat/berita') }}" class="bu">{{ trans('label.tampilkan') }} <i class="fa fa-angle-right"></i></a>    

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

@section('script')
<script type="text/javascript">
    function mod_layanan(id){
        $.ajax({
            url : '{{ url("get_layanan") }}',
            data : { id:id },
            type : 'GET',
            dataType : 'html',
            success : function (data){
                $("#modal-layananwni").modal("show");
                $("#layanan").html(data);
            }
        })
    }
</script>
@endsection