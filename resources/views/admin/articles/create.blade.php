@extends('admin.layout')
@section("title")
Add Article
@endsection
@section("content")

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN VALIDATION STATES-->
        <div class="portlet light portlet-fit portlet-form bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-file-text-o font-red"></i>
                    <span class="caption-subject font-red sbold uppercase">Add Article</span>
                </div>
            </div>

                <!-- BEGIN FORM-->
                {!! Form::open(['action'=>'Admin\Articles\ArticleController@store','files'=>'true']) !!}
          
                    <div class="{{$errors->has('title')?'has-error':''}}" >
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <input value="{{old('title')}}" type="text" class="form-control" name="title" id="form_control_1">
                            <label for="form_control_1">Article Title</label>
                        <small class="text-danger">{{ $errors->first('title') }}</small>
                        </div>
                    </div>


                    <div class="{{$errors->has('categorie_id')?'has-error':''}}" >
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <label for="form_control_1">Categorys</label>
                               <select class="form-control" name="categorie_id" >
                                <option value="" >Select Category</option>
                                  @if($categorys->count() > 0)
                                     @foreach($categorys as $category)
                                        <option value="{{$category->id}}" >{{$category->name}}</option>
                                     @endforeach
                                  @endif
                               </select>
                        <small class="text-danger">{{ $errors->first('categorie_id') }}</small>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="multiple" class="control-label">Tags</label>
                        <select id="multiple" class="form-control select2-multiple select2-hidden-accessible" multiple="" tabindex="-1" aria-hidden="true" name="tags[]">
                            <optgroup label="All Tags">
                                @if($tags->count() > 0)
                                     @foreach($tags as $tag)
                                        <option value="{{$tag->id}}" >{{$tag->name}}</option>
                                     @endforeach
                                  @endif
                            </optgroup>
                    </select>
                    </div>


                    <div class="{{$errors->has('description')?'has-error':''}}" >
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <textarea  name="description" class="form-control" id="editor">{{old('description')}}</textarea>
                            <script>
                            // extraPlugins needs to be set too.
                             CKEDITOR.replace( 'editor' );
                            </script>
                            <label for="form_control_1">Description</label>
                        <small class="text-danger">{{ $errors->first('description') }}</small>
                        </div>
                    </div>


                    <div class="{{$errors->has('img')?'has-error':''}}" >
                        <div class="form-group form-md-line-input form-md-floating-label">
                            <input class="form-control" id="form_control_1" type="file" name="img">
                            <label for="form_control_1">Image</label>
                        <small class="text-danger">{{ $errors->first('img') }}</small>
                        </div>
                    </div>


                    <div style="margin-bottom: 20px" class="text-center">
                        <div class="row">
                            <div class="col-md-12">
                                <button  class="btn default">Add New Article</button>
                            </div>
                        </div>
                    </div>

                    {!! Form::close() !!}
                <!-- END FORM-->
           </div>
        <!-- END VALIDATION STATES-->
    </div>
</div>

@endsection
