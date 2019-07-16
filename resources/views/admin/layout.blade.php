<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7
Version: 4.7.5
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" dir="rtl">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>@yield('title')</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin RTL Theme #1 for statistics, charts, recent events and reports" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/global/plugins/bootstrap/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/global/plugins/icheck/skins/all.css" rel="stylesheet" type="text/css" />

  <link href="{{url('/')}}/admin/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.css" rel="stylesheet" type="text/css" />

        <link href="{{url('/')}}/admin/global/plugins/clockface/css/clockface.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />


        <link href="{{url('/')}}/admin/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />

         <link href="{{url('/')}}/admin/global/plugins/bootstrap-select/css/bootstrap-select-rtl.css" rel="stylesheet" type="text/css" />

        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{{url('/')}}/admin/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/global/plugins/TagsInput/jquery.tagsinput.min.css" rel="stylesheet" type="text/css" />
          <link href="{{url('/')}}/admin/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/global/plugins/jquery-file-upload/css/jquery.fileupload.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/global/plugins/jquery-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{url('/')}}/admin/global/css/components-md-rtl.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{url('/')}}/admin/global/css/plugins-md-rtl.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{url('/')}}/admin/layouts/layout/css/layout-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/layouts/layout/css/themes/darkblue-rtl.min.css" rel="stylesheet" type="text/css" id="style_color" />


        <link href="{{url('/')}}/admin/layouts/layout/css/themes/light2-rtl.min.css" rel="stylesheet" type="text/css" id="style_color" />


        <link href="{{url('/')}}/admin/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

        <link href="{{url('/')}}/admin/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />


        <link href="{{url('/')}}/admin/layouts/layout/css/fontawesome-iconpicker.min.css" rel="stylesheet">

          <script src="{{url('/')}}/admin/ckeditor/ckeditor.js"></script>  

        <link href="{{url('/')}}/admin/layouts/layout/css/custom-rtl.min.css" rel="stylesheet" type="text/css" />
        <link href="{{url('/')}}/admin/layouts/layout/css/main.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
         <script src="//cdn.ckeditor.com/4.6.1/full/ckeditor.js"></script>
        <link href="https://fonts.googleapis.com/earlyaccess/droidarabickufi.css" rel="stylesheet">

          <link href="{{url('/')}}/admin/global/css/components-rounded.min.css" rel="stylesheet" id="style_components" type="text/css" />

        <link href="{{url('/')}}/admin/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />

        <link href="{{url('/')}}/style/style.css" rel="stylesheet"> 
        <link href="{{url('/')}}/style/content_style.css" rel="stylesheet"> 

        <link rel="shortcut icon" href="favicon.ico" /> </head>
        <!-- END HEAD -->

       <body class="page-header-fixed page-sidebar-closed-hide-
        page-content-white page-md">
         <div class="page-wrapper">
            <!-- BEGIN HEADER -->
            <div class="page-header navbar navbar-fixed-top">
                <!-- BEGIN HEADER INNER -->
                <div class="page-header-inner ">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="{{url('/')}}/auth">
                            <img   src="{{url('/')}}/admin/layouts/layout/img/logo-invert.png" alt="logo" class="logo-default" /> </a>
                        <div class="menu-toggler sidebar-toggler">
                            <span></span>
                        </div>
                    </div>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                        <span></span>
                    </a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <!-- BEGIN NOTIFICATION DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after "dropdown-extended" to change the dropdown styte -->
                            <!-- DOC: Apply "dropdown-hoverable" class after below "dropdown" and remove data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to enable hover dropdown mode -->
                            <!-- DOC: Remove "dropdown-hoverable" and add data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to the below A element with dropdown-toggle class -->


                           

                            <!-- END TODO DROPDOWN -->
                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <img alt="" class="img-circle" src="{{url('/')}}/admin/layouts/layout/img/avatar3_small.jpg" />
                                    <span class="username username-hide-on-mobile">
                                     {{ Auth::guard('managers')->user()->name }}
                                     </span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="{{url('/')}}/dashboard/managers/{{ Auth::guard('managers')->user()->id }}/edit">
                                            <i class="icon-user"></i> ملفي الشخصي </a>
                                    </li>
                                    <li>
                                        <a   target="_blank" href="{{url('/')}}">
                                            <i class="icon-eye"></i> الموقع </a>
                                    </li>
                                    <li>
                                        <a href="{{url('/')}}/dashboard/logout">
                                        <i class="icon-key"></i> تسجيل خروج </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                            <!-- END QUICK SIDEBAR TOGGLER -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END HEADER INNER -->
            </div>
            <!-- END HEADER -->
            <!-- BEGIN HEADER & CONTENT DIVIDER -->
            <div class="clearfix"> </div>
            <!-- END HEADER & CONTENT DIVIDER -->
            <!-- BEGIN CONTAINER -->
            <div class="page-container">
                <!-- BEGIN SIDEBAR -->
                <div class="page-sidebar-wrapper">
                    <!-- BEGIN SIDEBAR -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <div class="page-sidebar navbar-collapse collapse">
                        <!-- BEGIN SIDEBAR MENU -->
                        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                                <li class="sidebar-toggler-wrapper hide">
                                    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                                    <div class="sidebar-toggler">
                                        <span></span>
                                    </div>
                                    <!-- END SIDEBAR TOGGLER BUTTON -->
                                </li>
                                
                 

                            <li class="nav-item  {{Request::is('dashboard')?'active':''}}" >
                                <a href="{{url('/')}}/dashboard" >
                                    <i class="fa fa-home"></i>
                                    <span class="title"> Home </span>
                                </a>
                            </li>

                            <li class="nav-item  {{Request::is('dashboard/settings*')?'active':''}}" >
                                <a href="{{url('/')}}/dashboard/settings" >
                                    <i class="fa fa-cogs"></i>
                                    <span class="title"> Settings </span>
                                </a>
                            </li>


                            <li class="nav-item  {{Request::is('dashboard/social*')?'active':''}}" >
                                <a href="{{url('/')}}/dashboard/social" >
                                    <i class="fa fa-link"></i>
                                    <span class="title"> Social Links </span>
                                </a>
                            </li>


                            <li class="nav-item  {{ Request::is('dashboard/users*')?'active':''}}" >
                                <a href="{{url('/')}}/dashboard/users" >
                                    <i class="fa fa-user"></i>
                                    <span class="title"> Users </span>
                                </a>
                            </li>
                          
                            <li class="nav-item  {{Request::is('dashboard/managers*')?'active':''}}" >
                                <a href="{{url('/')}}/dashboard/managers" >
                                    <i class="fa fa-users"></i>
                                    <span class="title"> Managers </span>
                                </a>
                            </li>

                            <li class="nav-item  {{Request::is('dashboard/categorys*')?'active':''}}" >
                                <a href="{{url('/')}}/dashboard/categorys" >
                                    <i class="fa fa-tag"></i>
                                    <span class="title"> Categories </span>
                                </a>
                            </li> 


                            <li class="nav-item  {{Request::is('dashboard/tags*')?'active':''}}" >
                                <a href="{{url('/')}}/dashboard/tags" >
                                    <i class="fa fa-tags"></i>
                                    <span class="title"> Tags </span>
                                </a>
                            </li> 


                             <li class="nav-item  {{Request::is('dashboard/articles*')?'active':''}} {{Request::is('dashboard/article*')?'active':''}}" >
                                <a href="{{url('/')}}/dashboard/articles" >
                                    <i class="fa fa-newspaper-o"></i>
                                    <span class="title"> Articles </span>
                                </a>
                            </li> 
  

                        </ul>
                        <!-- END SIDEBAR MENU -->
                        <!-- END SIDEBAR MENU -->
                    </div>
                    <!-- END SIDEBAR -->
                </div>
                <!-- END SIDEBAR -->
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                    @if(session()->has('success'))
                        <div class="box-body">
                            <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                               {{ @session()->get('success') }}
                            </div>
                        </div>
                    @endif
                     @if(session()->has('warning'))
                        <div class="box-body">
                            <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                               {{ @session()->get('warning') }}
                            </div>
                        </div>
                    @endif

                        @if(count($errors))

                        <div class="alert alert-danger">

                            <ul>

                                @foreach($errors->all() as $error)

                                   <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                        @endif


                        @yield('content') 

                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
            <div class="page-footer">
                <div class="page-footer-inner"> Copyright &copy;
                    <a target="_blank" href="http://glowapps.com.eg">Abdo</a> &nbsp;|&nbsp; {{ date("Y") }}
                </div>
                <div class="scroll-to-top">
                    <i class="icon-arrow-up"></i>
                </div>
            </div>
            <!-- END FOOTER -->
        </div>
        <!--[if lt IE 9]>
<script src="{{url('/')}}/admin/global/plugins/respond.min.js"></script>
<script src="{{url('/')}}/admin/global/plugins/excanvas.min.js"></script> 
<script src="{{url('/')}}/admin/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->


        <script src="{{url('/')}}/admin/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
         <script src="{{url('/')}}/admin/global/plugins/bootstrap-switch/js/bootstrap-switch.js" type="text/javascript"></script>


       
        <script src="{{url('/')}}/admin/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
       
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="{{url('/')}}/admin/global/plugins/moment.min.js" type="text/javascript"></script>


        <script src="{{url('/')}}/admin/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>

        

        <script src="{{url('/')}}/admin/global/plugins/morris/morris.min.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/amcharts/amcharts/serial.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/amcharts/amcharts/pie.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/amcharts/amcharts/radar.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/amcharts/amcharts/themes/light.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/amcharts/amcharts/themes/patterns.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/amcharts/amcharts/themes/chalk.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/amcharts/ammap/ammap.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/amcharts/ammap/maps/js/worldLow.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/amcharts/amstockcharts/amstock.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/horizontal-timeline/horizontal-timeline.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/TagsInput/jquery.tagsinput.min.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/layouts/global/scripts/fontawesome-iconpicker.js"></script>
 <script src="{{url('/')}}/admin/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/typeahead/handlebars.min.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/typeahead/typeahead.bundle.min.js" type="text/javascript"></script>


          <script src="{{url('/')}}/admin/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>

        <script src="{{url('/')}}/admin/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>

         <script src="{{url('/')}}/admin/global/plugins/clockface/js/clockface.js" type="text/javascript"></script>

         <script src="{{url('/')}}/admin/global/plugins/bootstrap-growl/jquery.bootstrap-growl.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{{url('/')}}/admin/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
       <script src="{{url('/')}}/admin/pages/scripts/ui-bootstrap-growl.min.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/pages/scripts/dashboard.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <script src="{{url('/')}}/admin/global/plugins/bootstrap-toastr/toastr.min.js" type="text/javascript"></script>
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="{{url('/')}}/admin/pages/scripts/ui-toastr.min.js" type="text/javascript"></script>

        <script src="{{url('/')}}/admin/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/scripts/app.min.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/pages/scripts/table-datatables-ajax.js" type="text/javascript"></script>
        
        <script src="{{url('/')}}/admin/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>

         <script src="{{url('/')}}/admin/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>



        <script src="{{url('/')}}/admin/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/icheck/icheck.min.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/pages/scripts/form-icheck.min.js" type="text/javascript"></script>

        <script src="{{url('/')}}/admin/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>

         <script src="{{url('/')}}/admin//pages/scripts/components-select2.min.js" type="text/javascript"></script>



        <script src="{{url('/')}}/admin/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="{{url('/')}}/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>



        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->

        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="{{url('/')}}/admin/pages/scripts/table-datatables-managed.min.js" type="text/javascript"></script>
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        @yield('js')
    </body>

</html>