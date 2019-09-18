<!DOCTYPE html>
<!--[if IE 9]>         <html class="ie9 no-focus"> <![endif]-->
<!--[if gt IE 9]><!--> 
<html class="no-focus"> <!--<![endif]-->
    @include('front.layout.meta')
    <body>
        
        <div id="page-container" class="sidebar-l sidebar-o side-scroll header-navbar-fixed">


            <!-- Sidebar -->
            @include('front.layout.menu')
            <!-- END Sidebar -->

            <!-- Header -->
            @include('front.layout.header')
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">
                @yield('content')
            </main>
            <!-- END Main Container -->

              <!-- Footer -->

            @include('front.layout.footer')
        </div>
        <!-- END Page Container -->

        <!-- Pop In Modal -->
            @include('front.layout.modal')
        <!-- END Pop In Modal -->

       
        <!-- OneUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock, Appear, CountTo, Placeholder, Cookie and App.js -->
            @include('front.layout.script')
            @yield('script')
    </body>
</html>