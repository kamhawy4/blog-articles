@extends('admin.layout')
@section("title")
All Users
@endsection
@section("content")
<div class="row">
   <div class="col-md-12">
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
      <div class="portlet light bordered">
         <div class="portlet-title">
             <div class="caption font-dark">
                 <i class="fa fa-users font-dark"></i>
                 <span class="caption-subject bold   ">Table of Users</span>
             </div>  
         </div>
        {!! Form::open(['method' =>'POST','action' => 'Admin\UsersController@DeleteUsers']) !!}
        <div class="portlet-body">
            <div class="table-toolbar">
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{url('/')}}/dashboard/users/create" class="btn btn-primary">Add a new User</a>
                      <button id="delete-delete" class="btn btn-danger">Delete Selected</button>
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
                        <th> Name </th>
                        <th> Email </th>
                        <th> Options </th>
                    </tr>
                </thead>
                <tbody>
              @if($users->count() > 0)
               @foreach($users as $user) 
                    <tr class="odd gradeX">
                        <td>
                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                <input  type="checkbox"  name='check[]'  class="checkboxes" value="{{$user->id}}" />
                                <span></span>
                            </label>
                        </td>
                        <td> 
                            {{$user->name}}
                        </td>
                        <td>
                            {{$user->email}}
                        </td>
                        <td>
                          <div class="actions">
                                  <div class="btn-group">
                                      <a class="btn btn-sm green dropdown-toggle" href="javascript:;" data-toggle="dropdown"> Options
                                          <i class="fa fa-angle-down"></i>
                                      </a>
                                      <ul   class="dropdown-menu pull-right">
                                          <li>
                                              <a href="{{url('/')}}/dashboard/users/{{$user->id}}/edit">
                                                  <i class="fa fa-pencil"></i> Edit </a>
                                          </li>
                                          <li>
                                              <a onclick='return confirm("Are you sure you want to delete this users?")' href="{{url('/') }}/dashboard/delete/users/{{$user->id}}">
                                                  <i class="fa fa-trash-o"></i> Delete </a>
                                          </li>
                                      </ul>
                                  </div>
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
