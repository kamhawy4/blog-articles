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
                <table class="table table-bordered data-table" >
                    <thead>
                        <tr>
                            <th> Check </th>
                            <th> Title </th>
                            <th> Image </th>
                            <th> Categorie </th>
                            <th> Edit </th>
                            <th> Comments </th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        {!! Form::close() !!}
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>

@endsection
 <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
     $(function () {
        var table = $('.data-table').DataTable({

            processing: true,

            serverSide: true,

            ajax:'{{url('/')}}/dashboard/articles',


            columns: [

                {data: 'check', name: 'check'},

                {data: 'title', name: 'title'},

                {data: 'image', name: 'image'},

                {data: 'name', name: 'name'},

                @can('article-edit')
                  {data: 'edit', name: 'edit'},
                @endcan

                @can('comment-list')
                  {data: 'comments', name: 'comments', orderable: false, searchable: false},
                @endcan

            ]

        });

     });
</script>