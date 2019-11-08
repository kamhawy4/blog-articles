@extends('admin.layout')
@section("title")
All Roles
@endsection
@section("content")
<div class="row">
   <div class="col-md-12">
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
      <div class="portlet light bordered">
         <div class="portlet-title">
             <div class="caption font-dark">
                 <i class="fa fa-users font-dark"></i>
                 <span class="caption-subject bold   ">Table of Roles</span>
             </div>  
         </div>
       
        <div class="portlet-body">
            <div class="table-toolbar">
                <div class="row">
                    <div class="col-md-6">
                      @can('role-create')
                        <a class="btn btn-primary" href="{{ route('dashboard.roles.create') }}"> Create New Role</a>
                      @endcan
                    </div>
                </div>
            </div>
            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($roles as $key => $role)
                 <tr>
                    <td>{{ ++$i }}</td>
                     <td>{{ $role->name }}</td>
                       <td>
                            <a class="btn btn-info" href="{{ route('dashboard.roles.show',$role->id) }}">Show</a>
                            @can('role-edit')
                                <a class="btn btn-primary" href="{{ route('dashboard.roles.edit',$role->id) }}">Edit</a>
                            @endcan
                            @can('role-delete')
                                {!! Form::open(['method' => 'DELETE','route' => ['dashboard.roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    
    </div>
    <!-- END EXAMPLE TABLE PORTLET-->
</div>
</div>
@endsection
