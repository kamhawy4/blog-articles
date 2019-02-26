@extends('admin.layout')
@section("title")
 Article Comment
@endsection
@section("content")

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="fa fa-file-text-o font-dark"></i>
                    <span class="caption-subject bold">Table of Article Comment</span>
                </div>
            </div>
          {!! Form::open(['method' =>'POST']) !!}
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                    <thead>
                        <tr>
                            <th>
                                <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                    <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                    <span></span>
                                </label>
                            </th>
                            <th> Number </th>
                            <th> Comments </th>
                        </tr>
                    </thead>
                    <tbody>
                      @if($commentArticles->count() > 0)
                           @foreach($commentArticles as  $commentArticle) 
                                <tr class="odd gradeX">
                                    <td>{{$commentArticle->id}}</td>
                                    <td>{{$commentArticle->title}}</td>
                                   <td>
                                       <div class="col-md-6">
                                           <a class=" btn btn-danger"  onclick='return confirm("Are you sure you want to delete this comment?")' href="{{url('/') }}/dashboard/comments/delete/{{$commentArticle->id}}" >Delete
                                           </a>
                                        </div>
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
