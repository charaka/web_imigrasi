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
                             <li class="active">Pengaduan Masyarakat</li>
                           </ol>

                         </div>
                       </div>
                    </div>
                </div>

                <div class="bg-white">
                    <section class="content content-boxed "  style="padding-top:50px;padding-bottom:30px;">
                        <div class="row items-push push-50-t push-30">
                            <div class="col-md-6 col-md-offset-3">
                                <form class="form-horizontal" action="#" method="post">
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <div class="form-material form-material-primary">
                                                <input class="form-control" type="text" id="frontend-contact-firstname" name="frontend-contact-firstname" placeholder="Enter your firstname..">
                                                <label for="frontend-contact-firstname">Firstname</label>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="form-material form-material-primary">
                                                <input class="form-control" type="text" id="frontend-contact-lastname" name="frontend-contact-lastname" placeholder="Enter your lastname..">
                                                <label for="frontend-contact-lastname">Lastname</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <div class="form-material form-material-primary">
                                                <input class="form-control" type="email" id="frontend-contact-email" name="frontend-contact-email" placeholder="Enter your email..">
                                                <label for="frontend-contact-email">Email</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <div class="form-material form-material-primary">
                                                 <input class="form-control" type="text" id="frontend-contact-subject" name="frontend-contact-subject" placeholder="Enter your subject..">
                                                <label for="frontend-contact-subject">Subject</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <div class="form-material form-material-primary">
                                                <textarea class="form-control" id="frontend-contact-msg" name="frontend-contact-msg" rows="7" placeholder="Enter your message.."></textarea>
                                                <label for="frontend-contact-msg">Description</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                                            <button class="btn btn-block btn-primary" type="submit"><i class="fa fa-send pull-left"></i> Send Complaints</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
@endsection