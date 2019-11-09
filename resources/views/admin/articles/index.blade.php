@extends('admin.layout')
@section("title") 
All Articles
@endsection
@section("content")

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="fa fa-file-text-o font-dark"></i>
                    <span class="caption-subject bold">Table of Articles</span>
                </div>
            </div>
            
          {!! Form::open(['method' =>'POST','action' => 'Admin\Articles\ArticleController@DeleteArticle']) !!}

            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                          @can('article-create')
                        	<a href="{{url('/')}}/dashboard/articles/create" class="btn btn-primary">Add a new Article</a>
                          @endcan

                          @can('article-delete')
                              <button id="delete-delete" class="btn btn-danger">Delete selected</button>
                          @endcan
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                    <thead>
                        <tr>
                            <th>
                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                    <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                    <span></span>
                                </label>
                            </th>
                            <th> Title </th>
                            <th> Image </th>
                            <th> Categorie </th>
                            <th> Options </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!$articles->isEmpty())
                           @foreach($articles as $article) 
                                <tr class="odd gradeX">
                                    <td>
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                            <input  type="checkbox"  name='check[]'  class="checkboxes" value="{{$article->id}}" />
                                            <span></span>
                                        </label>
                                    </td>

                                    <td>{{$article->translation('en')->first()->title}} </td>

                                    @if($article->image != '')
                                        <td class="info product-block"><img src="{{ explode(".",$article->image)[0] == 'http://lorempixel'? $article->image : url('/')}}/uploads/articles/{{$article->image }}" width="100" style="border:1px solid #c4c4c4" height="70"></td>
                                    @else
                                        <td class="info"><img src="" width="100" style="border:1px solid #c4c4c4" height="70"></td>
                                    @endif

                                    <td> {{$article->GetNameCategorie->name}} </td>

                                    <td>
                                    @can('comment-list')
                                        <div class="col-md-4">
                                           <a class=" btn btn-info"  href="{{url('/') }}/dashboard/article/comments/{{$article->id}}" >Comments
                                           </a>
                                        </div> 
                                    @endcan

                                     @can('article-edit')
                                        <div class="col-md-4">
                                            <a  href="{{url('/')}}/dashboard/articles/{{$article->id}}/edit"><li class="btn btn-primary">Edit</li></a>
                                        </div>
                                      @endcan
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        {!! Form::close() !!}
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>

@endsection
