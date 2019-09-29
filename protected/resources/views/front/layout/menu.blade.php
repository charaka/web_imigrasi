<nav id="sidebar">
                <!-- Sidebar Scroll Container -->
                <div id="sidebar-scroll">
                    <!-- Sidebar Content -->
                    <!-- Adding .sidebar-mini-hide to an element will hide it when the sidebar is in mini mode -->
                    <div class="sidebar-content">
                        <!-- Side Header -->
                         <!-- Side Header -->
                        <div class="side-header side-content bg-white-op sidebar-mini-hide">
                            <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                            <button class="btn btn-link text-gray pull-right hidden-md hidden-lg" type="button" data-toggle="layout" data-action="sidebar_close" style=" font-size: 22px; color: #444"> 
                                <i class="fa fa-times"></i>
                            </button>
                            <a class="logo-web" href="{{ url('/') }}">
                                <img src="{{ url('assets/front/img/favicons/logo.png') }}" alt="logo imigrasi denpasar" >
                            </a>
                        </div>
                        <!-- END Side Header -->



                        <!-- Side Content -->
                        <div class="side-content">
                            {!! Session::get('menu') !!}
                        </div>
                        <!-- END Side Content -->
                    </div>
                    <!-- Sidebar Content -->
                </div>
                <!-- END Sidebar Scroll Container -->
            </nav>