<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description"
    content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template.">
  <meta name="keywords"
    content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
  <meta name="author" content="PIXINVENT">
  <title>APE DASHBOARD MAMANG</title>
  <link rel="apple-touch-icon"  href="{{asset('assets')}}/images/logo.png">
  <link rel="shortcut icon" type="image/x-icon"  href="{{asset('assets')}}/images/logo.png">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CMuli:300,400,500,700"
    rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link href="{{asset('assets')}}/css/reset.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/admin/app-assets/css/vendors.css">
  <link rel="stylesheet" type="text/css"
    href="{{asset('assets')}}/admin/app-assets/vendors/css/forms/icheck/icheck.css">
  <link rel="stylesheet" type="text/css"
    href="{{asset('assets')}}/admin/app-assets/vendors/css/forms/icheck/custom.css">
  <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/admin/app-assets/vendors/css/charts/morris.css">
  <link rel="stylesheet" type="text/css"
    href="{{asset('assets')}}/admin/app-assets/vendors/css/extensions/unslider.css">
  <link rel="stylesheet" type="text/css"
    href="{{asset('assets')}}/admin/app-assets/vendors/css/weather-icons/climacons.min.css">
  <link rel="stylesheet" type="text/css"
    href="{{asset('assets')}}/admin/app-assets/vendors/css/tables/jsgrid/jsgrid-theme.min.css">
  <link rel="stylesheet" type="text/css"
    href="{{asset('assets')}}/admin/app-assets/vendors/css/tables/jsgrid/jsgrid.min.css">
  <!-- END VENDOR CSS-->
  <!-- BEGIN ROBUST CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/admin/app-assets/css/app.css">
  <!-- END ROBUST CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css"
    href="{{asset('assets')}}/admin/app-assets/css/core/menu/menu-types/vertical-compact-menu.css">
  <link rel="stylesheet" type="text/css"
    href="{{asset('assets')}}/admin/app-assets/css/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css"
    href="{{asset('assets')}}/admin/app-assets/css/core/colors/palette-climacon.css">
  <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/admin/app-assets/css/pages/users.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <!-- END Custom CSS-->
  <style>
    .card-img-top{
      width: 300px;
      height:300px;
    }
    .swal2-header h2 {
      margin-bottom: 0 !important;
    }
    .swal2-title {
      margin: 0 !important;
      font-size: 1.8em !important;
    }
    .swal2-popup {
      padding: 0.1em !important;
    }
  </style>
</head>

<body class="vertical-layout vertical-compact-menu 2-columns   menu-expanded fixed-navbar" data-open="click"
  data-menu="vertical-compact-menu" data-col="2-columns">

  <!-- fixed-top-->
  <nav
    class="header-navbar navbar-expand-md navbar navbar-with-menu fixed-top navbar-dark navbar-shadow navbar-brand-center"
    style="color:#374749;">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs"
              href="#"><i class="ft-menu font-large-1"></i></a></li>
          <li class="nav-item text-sm-left">
              <a href="{{URL::to('/admin')}}"></a>
            </a>
          </li>
          <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse"
              data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a>
          </li>
        </ul>
      </div>
      <div class="navbar-container content">
        <div class="collapse navbar-collapse" id="navbar-mobile">
          <ul class="nav navbar-nav mr-auto float-left">
            <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                  class="ft-menu"> </i></a></li>
            </li>
          </ul>
          <ul class="nav navbar-nav float-right">
            <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#"
                data-toggle="dropdown"><span class="avatar avatar-online"><img
                    src="{{asset('assets')}}/admin/app-assets/images/portrait/small/avatar-s-1.png"
                    alt="avatar"><i></i></span><span class="user-name">{{session('name')}}</span></a>
              <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown"></div><a class="dropdown-item" href="{{url('logout')}}"><i
                    class="ft-power"></i> Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <!-- ////////////////////////////////////////////////////////////////////////////-->


  <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <a href="{{url('')}}/admin"><h2 class="text-center mt-2 mb-2">APE</h2></a>     
        <hr>
      </ul>
      <!-- <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class=" nav-item"><a href="{{url('')}}/user"><i class="icon-user"></i><span class="menu-title"
              data-i18n="nav.dash.main">User</span></a>
        </li>       
      </ul> -->
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class=" nav-item"><a href="{{url('')}}/admin-produk"><i class="fa fa-book"></i><span class="menu-title"
              data-i18n="nav.dash.main">Events</span></a>
        </li>       
      </ul>
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class=" nav-item"><a href="{{url('')}}/admin-kategori"><i class="fa fa-cogs" aria-hidden="true"></i><span class="menu-title"
              data-i18n="nav.dash.main">Kategori</span></a>
        </li>       
      </ul>
    </div>
  </div>

  <!-- content -->
  @yield('content')


  <!-- BEGIN PAGE VENDOR JS-->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <script src="{{asset('assets')}}/admin/app-assets/vendors/js/vendors.min.js"></script>
  <script src="{{asset('assets')}}/admin/app-assets/vendors/js/forms/icheck/icheck.min.js"></script>
  <script src="{{asset('assets')}}/admin/app-assets/vendors/js/extensions/jquery.knob.min.js"></script>
  <script src="{{asset('assets')}}/admin/app-assets/vendors/js/charts/raphael-min.js"></script>
  <script src="{{asset('assets')}}/admin/app-assets/vendors/js/extensions/unslider-min.js"></script>
  <script src="{{asset('assets')}}/admin/app-assets/vendors/js/charts/morris.min.js"></script>
  <script src="{{asset('assets')}}/admin/app-assets/vendors/js/tables/jsgrid/jsgrid.min.js"></script>
  <script src="{{asset('assets')}}/admin/app-assets/vendors/js/tables/jsgrid/griddata.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
  <!-- END PAGE VENDOR JS-->
  <!-- BEGIN ROBUST JS-->
  <script src="{{asset('assets')}}/admin/app-assets/js/core/app-menu.js"></script>
  <script src="{{asset('assets')}}/admin/app-assets/js/core/app.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>
  <!-- END ROBUST JS-->
  @yield('js')
  
</body>

</html>