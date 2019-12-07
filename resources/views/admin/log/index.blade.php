@extends('admin.layout')
@section("title")
All Logs
@endsection
@section("content")



<div class="row">
   <div class="col-md-12">
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
      <div class="portlet light bordered">
         <div class="portlet-title">
             <div class="caption font-dark">
                 <i class="fa fa-info-circle font-dark"></i>
                 <span class="caption-subject bold   ">Table of Logs</span>
             </div>  
         </div>
        {!! Form::open(['method' =>'POST','action' => 'Admin\Log\LogController@DeleteLog']) !!}
        <div class="portlet-body">
            <div class="table-toolbar">
                <div class="row">
                    <div class="col-md-6">
                      @can('log-delete')
                        <button id="delete-delete" class="btn btn-danger">Delete Selected</button>
                      @endcan
                    </div>
                </div>
            </div>
            <table class="table table-striped table-bordered table-hover table-checkable order-column data-table" >
                <thead>
            <tr>
              <th> Check </th>
  						<th>Subject</th>
  						<th>URL</th>
  						<th>Method</th>
  						<th>Ip</th>
  						<th>User Agent</th>
  						<th>User</th>
  						<th>Created</th>
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

            ajax:'{{url('/')}}/dashboard/log',


            columns: [

                {data: 'check', name: 'check'},

                {data: 'subject', name: 'subject'},

                {data: 'url', name: 'url'},

                {data: 'method', name: 'method'},

                {data: 'ip', name: 'ip'},

                {data: 'agent', name: 'agent'},

                {data: 'user_id', name: 'user_id'},

                {data: 'created_at', name: 'created_at'},


            ]

        });

     });
</script>