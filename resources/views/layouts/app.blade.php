<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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
                    <b class="logo-abbr"><img src="images/logo.png" alt=""> </b>
                    <span class="logo-compact"><img src="./images/logo-compact.png" alt=""></span>
                    <span class="brand-title">
                        <img src="images/logo-text.png" alt="">
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
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
              @include('partes.3_side_bar')
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->

        <!--**********************************
            Content body end
        ***********************************-->
        <div class="content-body">
            <div class="row page-titles mx-0">
                    <div class="col p-md-0">
                            @yield('menu_navegacion')
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
    <script src="{{ asset('plugins/common/common.min.js')}}"></script>
    <script src="{{ asset('js/custom.min.js')}}"></script>
    <script src="{{ asset('js/settings.js')}}"></script>
    <script src="{{ asset('js/gleek.js')}}"></script>
    <!--sweetalert>-->
    <script src="{{ asset('plugins/sweetalert2/dist/sweetalert2.min.js')}}"></script>
        <!--dataTables>-->
        <script src="{{ asset('plugins/tables/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{ asset('plugins/tables/js/datatable/dataTables.bootstrap4.min.js')}}"></script>
    @yield('js')
</body>
@yield('js_bajo_body')
@if(Session::has('success'))
 <script >
      swal({
           title:'Success!',
          text:"{{Session::get('flash_message')}}",
         timer:3500,
          type:'success'
      }).then((value) => {
        //location.reload();
      }).catch(swal.noop);
 </script>
 @elseif((Session::has('warning')))
 <script >
    swal({
         title:'Oops!',
        text:"{{Session::get('warning')}}",
       timer:3500,
        type:'error'
    }).then((value) => {
      //location.reload();
    }).catch(swal.noop);
</script>
 @endif
</html>
