@extends('admin.layout')
@section("title")
Home
@endsection
@section("content")


<div class="row">


<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="dashboard-stat2 ">
        <div class="display">
            <div class="number">
                <h3 class="font-purple-soft">
                    <span data-counter="counterup" data-value="{{$mangaers}}">{{$mangaers}}</span>
                </h3>
                <small>Number of Mangaers</small>
            </div>
            <div class="icon">
                <i class="fa fa-user"></i>
            </div>
        </div>
        <div class="progress-info">
            <div class="progress">
                <span style="width: 100%;" class="progress-bar progress-bar-success purple-soft">
                    <span class="sr-only">Number of Mangaers</span>
                </span>
            </div>
            <div class="status">
                <a  style="text-decoration:none;color: #8877a9;" href="{{url('/')}}/dashboard/managers"> More </a>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="dashboard-stat2 ">
        <div class="display">
            <div class="number">
                <h3 class="font-red-haze">
                    <span data-counter="counterup" data-value="{{$article}}">{{$article}}</span>
                </h3>
                <small>Number of Articles</small>
            </div>
            <div class="icon">
                <i class="fa fa-newspaper-o"></i>
            </div>
        </div>
         <div class="progress-info">
            <div class="progress">
                 <span style="width: 100%;" class="progress-bar progress-bar-success red-haze">
                     <span class="sr-only">Number of Articles</span>
                </span>
            </div>
            <div class="status">
                <a  style="text-decoration:none;color: #f36a5a;" href="{{url('/')}}/dashboard/articles"> More </a>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="dashboard-stat2 ">
        <div class="display">
            <div class="number">
                <h3 class="font-blue-sharp">
                    <span data-counter="counterup" data-value="{{$subscribe}}">{{$subscribe}}</span>
                </h3>
                <small>Number of Subscribes</small>
            </div>
            <div class="icon">
                <i class="fa fa-thumbs-o-up"></i>
            </div>
        </div>
        <div class="progress-info">
            <div class="progress">
                <span style="width: 100%;" class="progress-bar progress-bar-success blue-sharp">
                    <span class="sr-only">Number of Subscribes</span>
                </span>
            </div>
            <div class="status">
                 <a  style="text-decoration:none;color: #5c9bd1;" href="{{url('/')}}/dashboard/subscribe"> More </a>
            </div>
        </div>
    </div>
</div>


<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="dashboard-stat2 ">
        <div class="display">
            <div class="number">
                <h3 class="font-blue-sharp">
                    <span data-counter="counterup" data-value="{{$categories}}">{{$categories}}</span>
                </h3>
                <small>Number of Categories</small>
            </div>
            <div class="icon">
                <i class="fa fa-tag"></i>
            </div>
        </div>
        <div class="progress-info">
            <div class="progress">
                <span style="width: 100%;" class="progress-bar progress-bar-success blue-sharp">
                    <span class="sr-only">Number of Categories</span>
                </span>
            </div>
            <div class="status">
                 <a  style="text-decoration:none;color: #5c9bd1;" href="{{url('/')}}/dashboard/categorys"> More </a>
            </div>
        </div>
    </div>
</div>

</div>

@endsection




