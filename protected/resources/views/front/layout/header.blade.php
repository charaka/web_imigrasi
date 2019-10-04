<header id="header-navbar" class="">
                <div class="container-top">
                    <div class=" content-boxed box-no-width">
                        <h1 class="title">{{ trans('label.judul_web') }} </h1>
                        <h3 class="description">{{ trans('label.sub_judul_web') }}</h3>
                   </div>
                </div>
                <div class="nav-top clearfix">
                    <div class=" content-boxed box-no-width">
                        <!-- Header Navigation Right -->
                        <ul class="nav-header pull-right">
                            <li class="js-header-search header-search">
                                <form class="form-horizontal" action="{{ url('search') }}" method="get">
                                    <div class="form-material form-material-warning input-group remove-margin-t remove-margin-b">
                                        <input class="form-control search-text" type="text" id="q" name="q" placeholder="Search..">
                                        <span class="input-group-addon"><i class="si si-magnifier"></i></span>
                                    </div>
                                </form>
                            </li>
                            <li class="dropdown lang-bg ">
                                <!-- {!! $flag = Session::get('lang')=='in'?'f_ina':'f_eng'; !!} -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="{{ url('assets/front/img/favicons/'.$flag.'.png') }}" width="15" height="15" alt="en" style="margin-right: 5px;"> {{ (Session::get('lang')=='in'?'ID':'EN') }} <span class="caret"></span></a>


                                <ul class="dropdown-menu dropdown-menu-right clearfix">
                                    <li>
                                        <a href="{{ url('lang/1') }}"><img src="{{ url('assets/front/img/favicons/f_ina.png') }}" width="15" height="15" alt="en" style="margin-right: 5px;"> ID
                                          </a>
                                    </li>
                                     <li>
                                        <a href="{{ url('lang/2') }}"><img src="{{ url('assets/front/img/favicons/f_eng.png') }}" width="15" height="15" alt="en" style="margin-right: 5px;"> EN
                                          </a>
                                  </li>
                                    
                               


                              </ul>
                            </li>

                           
                        </ul>
                        <!-- END Header Navigation Right -->

                        <!-- Header Navigation Left -->
                        <ul class="nav-header pull-left">
                            <li class="hidden-md hidden-lg">
                                <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                                <button class="btn btn-default btn-nobg-white" data-toggle="layout" data-action="sidebar_toggle" type="button">
                                    <i class="fa fa-navicon"></i>
                                </button>
                            </li>
                            <li class="hidden-xs hidden-sm">
                                <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                                <button class="btn btn-default btn-nobg-white" data-toggle="layout" data-action="sidebar_mini_toggle" type="button">
                                    <i class="fa fa-ellipsis-v"></i>
                                </button>
                            </li>
                            <li>
                                <!-- Opens the Apps modal found at the bottom of the page, before including JS code -->
                                <a href="{{ url('/') }}" class="btn btn-default btn-nobg-white pull-right">
                                    <i class="si si-home"></i>
                                </a>
                            </li>
                            <li class="visible-xs">
                                <!-- Toggle class helper (for .js-header-search below), functionality initialized in App() -> uiToggleClass() -->
                                <button class="btn btn-default btn-nobg-white" data-toggle="class-toggle" data-target=".js-header-search" data-class="header-search-xs-visible" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </li>
                            
                        </ul>
                        <!-- END Header Navigation Left -->
                    </div>
                </div>
            </header>