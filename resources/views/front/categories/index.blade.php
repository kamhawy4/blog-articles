@extends('layouts.app')
@section('title')
  {{ app('setting') ? app('setting')->name_site:''}} - {{ isset($categorie->name)?$categorie->name:''}}
@endsection
@section('content')


<!--Page Banner-->
<section class="page-banner" style="background-image:url({{url('/')}}/front/images/background/bg-banner.jpg);">
    	<div class="auto-container">
        	<h1>{{ isset($categorie->name)?$categorie->name:''}} </h1>
            <div class="bread-crumb">
            	<ul class="clearfix">
                	<li><a href="{{url('/')}}">Home</a></li>
                    <li class="active">{{ isset($categorie->name)?$categorie->name:''}}</li>
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
                    <!--News Posts-->
                    <section class="news-posts">
                        <!--News Block Two-->
                        @if(count($articles) > 0)
                            @foreach($articles as $article)
        						<div class="news-block-two">
        							<div class="inner-box">
        								<div class="image">
        									<a href="{{url('/')}}/article/{{$article->slug}}"><img src="{{Storage::url($article->image)}}" alt="{{$article->title}}" /></a>
        									<a href="{{url('/')}}/article/{{$article->slug}}" class="overlay-link"><span class="txt">Read More <span class="icon flaticon-arrows-6"></span></span></a>
        									<div class="post-date">{{$article->created_at->diffForHumans()}}</div>
        								</div>
        								<div class="lower-box">
        									<h3><a href="{{url('/')}}/article/{{$article->slug}}">{{$article->title}}</a></h3>
        									<div class="text"> {{ strip_tags(substr($article->description,6)) }}</div>
        								</div>
        							</div>
        						</div>
    						@endforeach
						@endif
                        
                        <!-- Styled Pagination -->
                        <div class="styled-pagination">
                            <ul>
                                @if(count($articles) > 0)
                                  <li>{{ $articles->links() }}</li>
                                @endif
                            </ul>
                        </div>
						
                    </section>
                </div>
                <!-- sidbar => [ Categories & Recent News ] -->
               {!! app('sidbar') !!}
            </div>
        </div>
    </div>

@endsection