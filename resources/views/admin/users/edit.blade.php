@extends('admin.layout')
@section("title")
Modify the User
@endsection
@section("content")

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN VALIDATION STATES-->
        <div class="portlet light portlet-fit portlet-form bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class=" fa fa-users font-red"></i>
                        <span class="caption-subject font-red sbold uppercase">Modify the User </span>
                    </div>                                    
                </div>
                  {!! Form::model($update,['method'=>'PATCH','action'=>['Admin\User\UsersController@update',$update->id],'novalidate'=>'novalidate']) !!}
          
                        <div class="{{$errors->has('name')?'has-error':''}}" >
                            <div class="form-group form-md-line-input form-md-floating-label">
                                 {{ Form::text('name',null,['class'=>'form-control','id'=>'form_control_1']) }}
                                <label for="form_control_1">Name</label>
                            </div>
                            <small class="text-danger">{{ $errors->first('name') }}</small>
                         </div>


                        <div class="{{$errors->has('email')?'has-error':''}}" >
                            <div class="form-group form-md-line-input form-md-floating-label">
                                {{ Form::text('email',null,['class'=>'form-control','id'=>'form_control_1']) }}
                                <label for="form_control_1">Email</label>
                            </div>
                            <small class="text-danger">{{ $errors->first('email') }}</small>
                         </div>


                        <div class="{{$errors->has('password')?'has-error':''}}" >
                            <div class="form-group form-md-line-input form-md-floating-label">
                                 {!! Form::password('password',['class'=>'form-control','autocomplete'=>'new-password']) !!}
                                <label for="form_control_1">Password</label>
                            </div>
                            <small class="text-danger">{{ $errors->first('password') }}</small>
                         </div>


                        <div class="{{$errors->has('phone')?'has-error':''}}" >
                            <div class="form-group form-md-line-input form-md-floating-label">
                            {{ Form::text('phone',null,['class'=>'form-control','id'=>'form_control_1']) }}
                            <label for="form_control_1">Phone</label>
                            </div>
                            <small class="text-danger">{{ $errors->first('phone') }}</small>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Role:</strong>
                                {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
                            </div>
                        </div>


                        <div style="margin-bottom: 20px" class="text-center">
                            <div class="row">
                                <div class="col-md-12">
                                    <button  class="btn default">Modify the User</button>
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