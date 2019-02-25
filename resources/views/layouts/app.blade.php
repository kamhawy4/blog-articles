<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>{{ app('setting') ? app('setting')->name_site:''}}</title>
<!-- Stylesheets -->
<link href="{{url('/')}}/front/css/bootstrap.css" rel="stylesheet">
<link href="{{url('/')}}/front/css/style.css" rel="stylesheet">
<link href="{{url('/')}}/front/css/responsive.css" rel="stylesheet">

<link rel="shortcut icon" href="{{Storage::url(app('setting') ? app('setting')->fav:'')}}" type="image/x-icon">
<link rel="icon" href="{{Storage::url(app('setting') ? app('setting')->fav:'')}}" type="image/x-icon">
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta charset="utf-8"  name="keywords"    content="{{ app('setting') ? app('setting')->meta_keywords:''}}" >
<meta charset="utf-8"  name="description" content=" {{ app('setting') ? app('setting')->meta_description:''}}">
<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

<body>

<div class="page-wrapper">
    
    <!-- Preloader -->
    <div class="preloader"></div>
    
    <!-- Main Header / Header Style Two -->
    <header class="main-header header-style-two">
        
        <!-- Main Box -->
        <div class="main-box">
            <div class="auto-container">
                <div class="outer-container clearfix">
                    <!--Logo Box-->
                    <div class="logo-box">
                        <div class="logo"><a href="{{url('/')}}"><img src="{{ app('setting') ? app('setting')->logo:''}}" alt=""></a></div>
                    </div>
                </div>    
            </div>
        </div>
    
    </header>
    <!--End Main Header -->
    

    @yield('content')

   
    <!--Main Footer-->
    <footer class="main-footer">
        <div class="bg-icon-1 wow zoomInStable" data-wow-delay="0ms" data-wow-duration="1500ms"></div>
        
        <!--footer upper-->
        <div class="footer-upper">
            <div class="auto-container">
                <div class="row clearfix">
                    <!--Big Column-->
                    <div class="big-column col-md-6 col-sm-12 col-xs-12">
                        <div class="row clearfix">
                        
                            <!--Footer Column-->
                            <div class="footer-column col-md-10  col-sm-10 col-xs-12">
                                <div class="footer-widget logo-widget">
                                    <div class="logo">
                                        <a href="{{url('/')}}"><img src="{{Storage::url(app('setting') ? app('setting')->fav:'')}}" alt="" /></a>
                                    </div>
                                    <div class="">{{ app('setting') ? app('setting')->brief_site:''}}</div>
                                   
                                </div>
                            </div>
                    
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!--Footer Bottom-->
        <div class="footer-bottom">
            <div class="auto-container">
                <div class="copyright">&copy; Copyright <?= date('Y'); ?>  Abdo Technologies All Rights Reserved</div>
            </div>
        </div>
    </footer>
    <!--End Main Footer-->

    
</div>
<!--End pagewrapper-->


<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-double-up"></span></div>


<script src="{{url('/')}}/front/js/jquery.js"></script>
<script src="{{url('/')}}/front/js/bootstrap.min.js"></script>
<script src="{{url('/')}}/front/js/jquery.fancybox.pack.js"></script>
<script src="{{url('/')}}/front/js/owl.js"></script>
<script src="{{url('/')}}/front/js/wow.js"></script>
<script src="{{url('/')}}/front/js/appear.js"></script>
<script src="{{url('/')}}/front/js/script.js"></script>



<script type="text/javascript">
   $(document).ready(function(){
            $('#send-send').click(function(e){  
              e.preventDefault();
              var email    =  $('input[name="email"]').val(); 
              
               $.ajax({
                url:'{{url('/')}}/subscribe/ajax',
                type:'post',
                dataType:'json',
                data:{email,"_token": "{{ csrf_token() }}"},
                success:function(data)
                {
                  if(data.code == 200)
                  {
                    $('input[name="email"]').val(''); 
                    $(".msg-subscribe").fadeIn().delay(3000).fadeOut();
                  }
                  if(data.code == 202)
                  {
                    $(".danger-subscribe").fadeIn().delay(3000).fadeOut();
                  }

                 if(data.code == 500)
                  {
                    $(".warning-subscribe").fadeIn().delay(3000).fadeOut();
                  }
                }
               }); 
               return false;
            });
           }); 
</script>


</body>
</html>