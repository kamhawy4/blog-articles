@extends('layouts.app')
@section('title')
  {{ app('setting') ? app('setting')->name_site:''}} - {{ $articles->translation()->first()->title ? $articles->translation()->first()->title:''}}
@endsection
@section('content')



<!--Page Banner-->
<section class="page-banner" style="background-image:url({{url('/')}}/front/images/background/bg-banner.jpg);">
	<div class="auto-container">
    	<h1>{{ $articles->translation()->first()->title ? $articles->translation()->first()->title:''}}</h1>
        <div class="bread-crumb"> 
        	<ul class="clearfix">
                <li><a href="{{url('/')}}">{{ __('front.home') }}</a></li>
                <li class="active">{{ $articles->translation()->first()->title ? $articles->translation()->first()->title : ''}}</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Banner-->
    
    
<!--Sidebar Page-->
<div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">
                <!--Content Side-->
                <div class="content-side col-lg-8 col-md-8 col-sm-12 col-xs-12">
                	<!--News Details-->
                    <section class="news-details">
                    	<!--News Block Two-->
                        <div class="news-block-two">
                        	<div class="inner-box">
                        		<div class="image">

                                @php
                                $explodeImg =  explode(".",$articles->image);
                                $pathImg =  '/uploads/articles/'.$articles->image;
                                @endphp

                        		<img src="{{ $explodeImg[0] == 'http://lorempixel' ? $articles->image : $pathImg }}" alt="" />

                        	    <div class="post-date">{{ $articles->created_at ? $articles->created_at->diffForHumans()  : '' }}</div>
                        		</div>

                        		<div class="lower-box">
                        			<h3>   {{ __('front.title') }} :  {{ $articles->translation()->first()->title ? $articles->translation()->first()->title : '' }}</h3>

                        			<div class="text">
                                    	 {{ __('front.description') }} : {!! $articles->translation()->first()->description ? $articles->translation()->first()->description : '' !!}
                                    </div>

                                    <!--Options-->
                                    <div class="post-options">
                                        <div class="clearfix">
                                            <div class="share-options">
                                                <ul>
                                                    <li><strong>{{ __('front.share') }} :</strong></li>
                                                    
                                                    <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{url('/')}}/article/{{ $articles->translation()->first()->slug ? $articles->translation()->first()->slug : '' }}"><span class="fa fa-facebook-f"></span></a>
                                                    </li>
                                                    
                                                    <li><a target="_blank"   href="https://twitter.com/intent/tweet?text={{url('/')}}/article/{{ $articles->translation()->first()->slug ? $articles->translation()->first()->slug : '' }}"><span class="fa fa-twitter"></span></a></li>
                                                    
                                                    <li><a target="_blank"  href="https://plus.google.com/share?app=110&url={{url('/')}}/article/{{ $articles->translation()->first()->slug ? $articles->translation()->first()->slug : '' }}"><span class="fa fa-google-plus"></span></a></li>
                                                    
                                                     <li><a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url={{url('/')}}/article/{{ $articles->translation()->first()->slug ? $articles->translation()->first()->slug : '' }}
                                                    "><span class="fa fa-linkedin"></span></a></li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                        		</div>
                        	</div>
                        </div>



                        
                        <!--Comments Area-->
                        <div class="comments-area">
                        	<div class="group-title"><h2>{{ $commentsArticle->count() }}  {{ __('front.comments') }}</h2></div>
                             <div class="comment-box table">
                            	<!--Comment-->
                            @if(!$commentsArticle->isEmpty())
                                @foreach($commentsArticle as $commentArticle)
                                  @include('front.articles.comments');
                                @endforeach
                            @endif 
                            </div>
                        </div>
                        
                        <div class="comment-form">
                            <div class="group-title">
                            	<h2>{{ __('front.post_a_comment') }}</h2>
                            </div> 
                            <!--Comment Form-->
                            <form method="post" action="blog.html">
                                <div class="row clearfix">
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <input type="text" name="name" placeholder="{{ __('front.name') }}" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea name="commet" placeholder="{{ __('front.comment') }}"></textarea>
                                </div>
                                <div class="form-group">
                                    <button   id="send" class="theme-btn btn-style-two" type="submit" name="submit-form"> {{ __('front.post_comment') }}</button>
                                </div>
                            </form>
                        </div><!--End Comment Form -->
                        
                     </section>
                </div>
                <!--Content Side-->
                <!--Sidebar-->
                   {!! app('sidbar') !!}
                <!--Sidebar-->
            </div>
     </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<script type="text/javascript">

$(document).ready(function(){
             $('#send').click(function(e){
              e.preventDefault();
                var name         =  $('input[name="name"]').val();
                var title        =  $('textarea[name="commet"]').val();
                var article_id   =  {{ $articles->id }};

                if((name == '') || (title == '') ) {
                   alert('You can not add empty values');
                   return false;
                }
                $.ajax({
                url:'{{url('/')}}/dashboard/comments',
                type:'get',
                dataType:'json',
                data:{name,title,article_id,"_token": "{{ csrf_token() }}"},
                beforeSend: function() {
                    $('.ajax-load2').show();
                },
                success:function(data){  
                  if(data.status == true){
                    $('.table').prepend(data.result);
                    $('.ajax-load2').hide();
                    $('input[name="categray"]').val(' ');
                    $('input[name="name"]').val(' ');
                    $('textarea[name="commet"]').val(' ');
                  }
                },
                error:function(data)
                {


                },
            });
        });
    });  
</script>


@endsection