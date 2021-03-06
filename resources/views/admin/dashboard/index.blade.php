@extends('admin.layout')
@section("title")
Dashboard
@endsection
@section("content")


<div class="row">

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="dashboard-stat2 ">
            <div class="display">
                <div class="number">
                    <h3 class="font-red-haze">
                        <span data-counter="counterup" data-value="{{isset($article)?$article:0}}">{{isset($article)?$article:0}}</span>
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

    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="dashboard-stat2 ">
            <div class="display">
                <div class="number">
                    <h3 class="font-blue-sharp">
                        <span data-counter="counterup" data-value="{{isset($categories)?$categories:0}}">{{isset($categories)?$categories:0}}</span>
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

<div>
    {!! $chart->container() !!}
    {!! $chart->script() !!}
</div>

<div>
    {!! $articlesChart->container() !!}
    {!! $articlesChart->script() !!}
</div>

@endsection




