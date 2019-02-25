@extends('admin.layout')
@section("title")
Articles
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
            
          {!! Form::open(['method' =>'POST','action' => 'Admin\ArticleController@DeleteArticle']) !!}
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">

                    
                        	<a href="{{url('/')}}/dashboard/articles/create" class="btn btn-primary">Add a new Article</a>
                       
                          <button id="delete-delete" class="btn btn-danger">Delete selected
                          </button>
                      
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
                            <th> Article Title </th>
                            <th> Image </th>
                            <th> Categorie </th>
                            <th> Options </th>
                        </tr>
                    </thead>
                    <tbody>
                   @foreach($articles as $article) 
                        <tr class="odd gradeX">
                            <td>
                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                    <input  type="checkbox"  name='check[]'  class="checkboxes" value="{{$article->id}}" />
                                    <span></span>
                                </label>
                            </td>
                            <td> {{$article->title}} </td>

                            @if(count($article->image) > 0)
                            <td class="info product-block">

                            <img src="{{Storage::url($article->image)}}" width="100" style="border:1px solid #c4c4c4" height="70">
                            </td>
                            @else
                              <td class="info"><img src="" width="100" style="border:1px solid #c4c4c4" height="70">
                              </td>
                            @endif

                            <td> {{$article->GetNameCategorie->name}} </td>
                           <td>

                            <div class="col-md-4">
                               <a class=" btn btn-info"  href="{{url('/') }}/dashboard/articles/comments/{{$article->id}}" >Comments
                               </a>
                            </div> 

                            <div class="col-md-4">
                               <a class=" btn btn-danger"  onclick='return confirm("Are you sure you want to delete this article?")' href="{{url('/') }}/dashboard/delete/articles/{{$article->id}}" >delete
                               </a>
                            </div> 
                             
                                  
                            
                            <div class="col-md-4">
                                <a  href="{{url('/')}}/dashboard/articles/{{$article->id}}/edit"><li class="btn btn-primary">Edit</li></a>
                            </div>
                              
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        {!! Form::close() !!}
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>

</div>

@endsection
