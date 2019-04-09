@extends('admin.layout')
@section("title")
Edit Article
@endsection
@section("content")

<div class="row">
   <div class="col-md-12">
        <div class="portlet light portlet-fit portlet-form bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-file-text-o font-red"></i>
                        <span class="caption-subject font-red sbold uppercase">Edit Article</span>
                    </div>
                </div>

                <!-- BEGIN FORM-->
                {!!  Form::model($update,['method'=>'PATCH','action'=>['Admin\ArticleController@update',$update->id],'novalidate'=>'novalidate','files'=>'true']) !!}
          
                      <div class="{{$errors->has('title')?'has-error':''}}" >
                        <div class="form-group form-md-line-input form-md-floating-label">
                             {{ Form::text('title',null,['class'=>'form-control','id'=>'form_control_1']) }}
                            <label for="form_control_1">Article Title</label>
                        <small class="text-danger">{{ $errors->first('title') }}</small>
                        </div>
                      </div>

                      <div class="{{$errors->has('categorie_id')?'has-error':''}}" >
                        <div class="form-group form-md-line-input form-md-floating-label">
                           <select class="form-control" name="categorie_id" >
                               <option  value="" >Select Category</option>
                                @if($categorys->count() > 0)
                                 @foreach($categorys as $category)
                                       <option  {{($category->id == $update->categorie_id)?'selected':''}} value="{{$category->id}}" >{{$category->name}}</option>
                                 @endforeach
                                @endif
                           </select>
                           <label for="form_control_1">Categorys</label>
                           <small class="text-danger">{{ $errors->first('categorie_id') }}</small>
                        </div>
                      </div>

                      <div class="{{$errors->has('description')?'has-error':''}}" >
                          <div class="form-group form-md-line-input form-md-floating-label">
                              {{ Form::textarea('description',null,['class'=>'form-control','id'=>'editor']) }}
                              <script>
                              // extraPlugins needs to be set too.
                               CKEDITOR.replace('editor' );
                              </script>
                              <label for="form_control_1">Description</label>
                          <small class="text-danger">{{ $errors->first('description') }}</small>
                          </div>
                      </div>

                   
                      @if($update->count() != 0 && $update->image != '')
                        <div class="col-md-12" >
                          <div class="box box-success">
                            <div class="box-body text-center">
                             <img style="max-width: 80%; border:1px solid #cecece" src="{{ explode(".",$update->image)[0] == 'http://lorempixel'? $update->image : url('/')}}/uploads/articles/{{$update->image }}">
                            </div>
                          </div>
                        </div>
                      @endif


                      <div class="form-group form-md-line-input has-info {{$errors->has('img')?'has-error':''}}">
                          {!! Form::file('img',['class'=>'form-control']) !!}
                          <label for="form_control_1">Image</label>
                           <span class="help-block">Image</span>
                          <small class="text-danger">{{ $errors->first('img') }}</small>
                      </div>

                      <div style="margin-bottom: 20px" class="text-center">
                          <div class="row">
                              <div class="col-md-12">
                                  <button  class="btn default">Edit Article</button>
                              </div>
                          </div>
                      </div>

                {!!Form::close()!!}
        </div>
    </div>
</div>

@endsection