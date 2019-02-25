@extends('layouts.app')
@section('content')

<!--Page Banner-->
<section class="page-banner" style="background-image:url({{url('/')}}/front/images/background/bg-banner.jpg);">
        <div class="auto-container">

            <h1> {{ Auth::user()->name }}</h1>
            <div class="bread-crumb">
                <ul class="clearfix">
                   <a href="{{url('/')}}"> <li class="active">{{ app('setting') ? app('setting')->name_site:''}}</li> </a>  
                </ul>
            </div>
        </div>
</section>



<!--End Page Banner-->
<div class="container"  style="margin-top: 100px" >
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"   style="text-align: center;" >My Name  <h3> {{ Auth::user()->name }} </h3><h4><a href="{{url('/logout')}}">LogOut</a></h4> </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    My Phone :: {{ Auth::user()->phone }}
                    <br>
                    My Email :: {{ Auth::user()->email }}
                    <hr>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
