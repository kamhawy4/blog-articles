@extends('admin.layout')
@section("title")
Add a new Role
@endsection
@section("content")

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New Role</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('dashboard.roles.index') }}"> Back</a>
        </div>
    </div>
</div>


{!! Form::open(array('route' => 'dashboard.roles.store','method'=>'POST')) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Permission:</strong>
            <br/>
            <br/>
            @foreach($permission as $value)
                <label  class="mt-checkbox mt-checkbox-single mt-checkbox-outline col-md-4" >{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'checkboxes')) }}{{ $value->name }} <span></span>
            </label>
            @endforeach
        </div>
    </div>
</div>
<div style="margin-bottom: 20px;margin-top: 51px;" class="text-center">
    <div class="row">
        <div class="col-md-12">
            <button  class="btn default">Add Role</button>
        </div>
    </div>
</div>
{!! Form::close() !!}

@endsection