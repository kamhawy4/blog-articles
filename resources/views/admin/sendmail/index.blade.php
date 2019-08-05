@extends('admin.layout')
@section("title")
Send Mail
@endsection
@section("content")

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject font-dark bold uppercase">Send Mail</span>
                </div>
            </div>
            <div class="portlet-body">

                    {!! Form::open(['method'=>'post','action'=>'Admin\SendMail\SendMailController@mail','class'=>'form-horizontal form-horizontal form-bordered','files'=>true,]) !!}

                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                        <label for="multiple" class="control-label">Title</label>
                            <div class="input-icon">
                                <input value="{{old('title')}}" name="title" type="text" class="form-control" id="title" placeholder="Title"> 
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            </div>
                    </div>
                    

                    <div class="form-group {{ $errors->has('users') ? 'has-error' : '' }}">
                        <label for="multiple" class="control-label">All Users</label>
                        <select id="multiple" class="form-control select2-multiple select2-hidden-accessible" multiple="" tabindex="-1" aria-hidden="true" name="users[]">
                            <optgroup label="All Users">
                                @if($users->count() > 0)
                                     @foreach($users as $user)
                                        <option value="{{$user->email}}" >{{$user->email}}</option>
                                     @endforeach
                                  @endif
                            </optgroup>
                    </select>
                    <span class="text-danger">{{ $errors->first('users') }}</span>
                    </div>


                    <div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
                        <label for="message" class="control-label">Message</label>
                            <div class="input-icon">
                                <textarea name="message"  rows="7"  class="form-control" id="message" placeholder="Message">{{old('message')}}</textarea>
                                <span class="text-danger">{{ $errors->first('message') }}</span>
                            </div>
                    </div>



                    <div style="margin-bottom: 20px" class="text-center">
                        <div class="row">
                            <div class="col-md-12">
                                <button  class="btn default">Send</button>
                            </div>
                        </div>
                    </div>


                {!! Form::close()  !!}
            </div>
        </div>
        <!-- END SAMPLE FORM PORTLET-->
    </div>
</div>	



@endsection
