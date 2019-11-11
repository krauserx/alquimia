<!DOCTYPE html>
<html lang="en">
    <!--*******************
        header start here
    ********************-->
    @include('partes.1_head')
    <!--*******************
        .header end here
    ********************-->


<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="index.html">
                    <b class="logo-abbr"><img src="{{ asset('images/logo.png')}}" alt=""> </b>
                    <span class="logo-compact"><img src="{{ asset('./images/logo-compact.png')}}" alt=""></span>
                    <span class="brand-title">
                        <img src="{{ asset('images/logo-text.png')}}" alt="">
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        @include('partes.2_header')
        <!--**********************************
            .Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        @include('partes.3_side_bar')
        <!--**********************************
            .Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
                <div class="row page-titles mx-0">
                        <div class="col p-md-0">
                                @yield('breadcrumb')
                            <!--<ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                            </ol>-->
                        </div>
                    </div>
                <!-- row -->

            <div class="container-fluid">
                @yield('content')
            </div>
              <!-- #/ container -->
            <!-- #/ container -->
        </div>
        <!--**********************************
            .Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a> 2018</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/styleSwitcher.js"></script>

    <script src="./plugins/highlightjs/highlight.pack.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>

    <script>
        (function($) {
        "use strict"

            new quixSettings({
                version: "light", //2 options "light" and "dark"
                layout: "vertical", //2 options, "vertical" and "horizontal"
                navheaderBg: "color_5", //have 10 options, "color_1" to "color_10"
                headerBg: "color_1", //have 10 options, "color_1" to "color_10"
                sidebarStyle: "compact", //defines how sidebar should look like, options are: "full", "compact", "mini" and "overlay". If layout is "horizontal", sidebarStyle won't take "overlay" argument anymore, this will turn into "full" automatically!
                sidebarBg: "color_1", //have 10 options, "color_1" to "color_10"
                sidebarPosition: "static", //have two options, "static" and "fixed"
                headerPosition: "fixed", //have two options, "static" and "fixed"
                containerLayout: "wide",  //"boxed" and  "wide". If layout "vertical" and containerLayout "boxed", sidebarStyle will automatically turn into "overlay".
                direction: "ltr" //"ltr" = Left to Right; "rtl" = Right to Left
            });


        })(jQuery);

        <!--sweetalert>-->
    <script src="{{ asset('plugins/sweetalert2/dist/sweetalert2.min.js')}}"></script>
    <!-- Include this after the sweet alert js file -->
    @include('sweet::alert')
    </script>

</body>

</html>
