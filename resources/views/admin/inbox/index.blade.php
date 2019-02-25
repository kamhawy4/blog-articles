@extends('admin.layout')
@section("title")
Inbox
@endsection
@section("content")



                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption font-dark">
                                            <i class="fa fa-inbox font-dark"></i>
                                            <span class="caption-subject bold">Inbox</span>
                                        </div>  
                                    </div>
                                    
                            {!! Form::open(['method' =>'POST','action' => 'Admin\ContactUsController@DeleteContactUs']) !!}
                                    <div class="portlet-body">
                                        <div class="table-toolbar">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <button id="delete-delete" class="btn btn-danger">Delete selected</button>
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
                                                    <th> Phone </th>
                                                    <th> Options </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                           @foreach($inboxs as $inbox) 
                                                <tr class="odd gradeX">
                                                    <td>
                                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                            <input  type="checkbox" name='check[]'  class="checkboxes"  value="{{$inbox->id}}" />
                                                             <h6 class="selcted" style="display: none;" >{{$inbox->email}}|</h6>
                                                            <span></span>
                                                        </label>
                                                    </td>
                                                    <td >{{$inbox->name}}</td>
                                                    <td>
                                                       {{ $inbox->phone }}
                                                    </td>
                                                    
                                                    <td>
                                                       <div class="col-md-4" >  
                                                       <a class="btn btn-danger"  onclick='return confirm("Are you sure you want to delete this message?")' href="{{url('/') }}/dashboard/delete/contact_us/{{$inbox->id}}" >delete</a> 
                                                        </div>
                                                       

                                                       <div class="col-md-4">
                                                         <a  href="{{url('/')}}/dashboard/contact/us/{{$inbox->id}}">
                                                          <li class="btn btn-primary">Show</li>
                                                          </a>
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
                               {{--  </form> --}}
                            </div>

                        </div>


@endsection