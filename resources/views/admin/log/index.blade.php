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
            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                <thead>
                    <tr>
                        <th>
                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                <span></span>
                            </label>
                        </th>
						<th>No</th>
						<th>Subject</th>
						<th>URL</th>
						<th>Method</th>
						<th>Ip</th>
						<th width="300px">User Agent</th>
						<th>User</th>
						<th>Created</th>
                    </tr>
                </thead>
                <tbody>
              @if($logs->count() > 0)
               @foreach($logs as $key => $log) 
                    <tr class="odd gradeX">
                        <td>
                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                <input  type="checkbox"  name='check[]'  class="checkboxes" value="{{$log->id}}" />
                                <span></span>
                            </label>
                        </td>
                        <td> 
                            {{ ++$key }}
                        </td>
                        <td>
                            {{$log->subject }}
                        </td>

                        <td class="text-success">
                        	{{ $log->url }}
                        </td>

                        <td>
                        	<label class="label label-info">{{ $log->method }}</label>
                        </td>

                       <td class="text-warning">
                          {{ $log->ip }}
                        </td>

                        <td class="text-danger">
                        	{{ $log->agent }}
                        </td>

                        <td>
                        	{{ $log->GetNameUser->name }}
                        </td>

                        <td>
                          {{ timezone()->convertToLocal($log->created_at) }} : {{ $log->created_at->diffForHumans() }}
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