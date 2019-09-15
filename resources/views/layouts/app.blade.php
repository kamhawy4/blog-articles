<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>{{ app('setting') ? app('setting')->name_site:''}}</title>
<!-- Stylesheets -->

{{style('front/css/responsive.css') }}
{{style('front/css/style.css') }}
{{style('front/css/bootstrap.css') }}


@if(app('setting') != null)
  <link rel="shortcut icon" href="{{ explode(".",app('setting')->fav)[0] == 'http://lorempixel' ?  app('setting') ? app('setting')->fav:'' : url('/')}}/uploads/fav/{{app('setting')->fav }}" type="image/x-icon">
@endif

<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta charset="utf-8"  name="keywords"    content="{{ app('setting') ? app('setting')->meta_keywords:''}}" >
<meta charset="utf-8"  name="description" content=" {{ app('setting') ? app('setting')->meta_description:''}}">


<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->

<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/6.6.0/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#config-web-app -->

<script>
  // Your web app's Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyCHmU5v5xonxaLZJHryXVyqQbtXF0f4E2U",
    authDomain: "test-3efc9.firebaseapp.com",
    databaseURL: "https://test-3efc9.firebaseio.com",
    projectId: "test-3efc9",
    storageBucket: "test-3efc9.appspot.com",
    messagingSenderId: "1013908535553",
    appId: "1:1013908535553:web:83e95fc8ea4acef633c300"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
</script>


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
                        @if(app('setting') != null)
                          <div class="logo"><a href="{{url('/')}}"><img src="{{ explode(".",app('setting')->logo)[0] == 'http://lorempixel' ?  app('setting') ? app('setting')->logo:'' : url('/')}}/uploads/logo/{{app('setting')->logo }}" alt=""></a></div>
                        @endif
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
                                      @if(app('setting') != null)
                                        <a href="{{url('/')}}"><img src="{{ explode(".",app('setting')->logo)[0] == 'http://lorempixel' ?  app('setting') ? app('setting')->logo:'' : url('/')}}/uploads/logo/{{app('setting')->logo }}" alt="" /></a>
                                      @endif
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


{{script('front/js/jquery.js') }}
{{script('front/js/bootstrap.min.js') }}
{{script('front/js/jquery.fancybox.pack.js') }}
{{script('front/js/owl.js') }}
{{script('front/js/wow.js') }}
{{script('front/js/appear.js') }}
{{script('front/js/script.js') }}
 

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