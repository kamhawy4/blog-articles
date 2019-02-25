@extends('admin.layout')
@section("title")
Managers
@endsection
@section("content")


                           <div class="row">
                               <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                  <div class="portlet light bordered">
                                     <div class="portlet-title">
                                         <div class="caption font-dark">
                                             <i class="fa fa-users font-dark"></i>
                                             <span class="caption-subject bold   ">Table of Managers</span>
                                         </div>  
                                     </div>
                            {!! Form::open(['method' =>'POST','action' => 'Admin\ManagersController@DeleteMangaers']) !!}
                                    <div class="portlet-body">
                                        <div class="table-toolbar">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <a href="{{url('/')}}/dashboard/managers/create" class="btn btn-primary">Add a new manager</a>
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
                                           @foreach($mangaers as $mangaer) 
                                                <tr class="odd gradeX">
                                                    <td>
                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input  type="checkbox"  name='check[]'  class="checkboxes" value="{{$mangaer->id}}" />
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                    <td> 
                                                        {{$mangaer->name}}
                                                    </td>
                                                    <td>
                                                        {{$mangaer->email}}
                                                    </td>
                                                    <td>
                                                      <div class="actions">
                                                              <div class="btn-group">
                                                                  <a class="btn btn-sm green dropdown-toggle" href="javascript:;" data-toggle="dropdown"> Options
                                                                      <i class="fa fa-angle-down"></i>
                                                                  </a>
                                                                  <ul   class="dropdown-menu pull-right">
                                                                      <li>
                                                                          <a href="{{url('/')}}/dashboard/managers/{{$mangaer->id}}/edit">
                                                                              <i class="fa fa-pencil"></i> Edit </a>
                                                                      </li>
                                                                      <li>
                                                                          <a onclick='return confirm("Are you sure you want to delete this manager?")' href="{{url('/') }}/dashboard/delete/managers/{{$mangaer->id}}">
                                                                              <i class="fa fa-trash-o"></i> Delete </a>
                                                                      </li>
                                                                  </ul>
                                                              </div>
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
