@extends('layouts.app')
@section('title', 'Add Category')
@section('content')
<div class="page-heading">
    <div class="pull-left">
        <h4>Add User</h4>
    </div>
</div>
<div class="content-inner">
    <form action="{{route('admin.users.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-sm-3">
                <div class="custom-form-group">
                    <label>User Name*</label>
                    <input type="text" name="name" class="custom-form-control" placeholder="User Name"
                        value="{{old('name')}}" />
                    @if ($errors->has('name'))
                    <span class="error">{{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <div class="custom-form-group">
                    <label>Emp Code*</label>
                    <input type="text" name="emp_code" class="custom-form-control" placeholder="Emp Code"
                        value="{{old('emp_code')}}" />
                    @if ($errors->has('emp_code'))
                    <span class="error">{{ $errors->first('emp_code') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <div class="custom-form-group">
                    <label>Email*</label>
                    <input type="email" name="email" class="custom-form-control" placeholder="User email"
                        value="{{old('email')}}" />
                    @if ($errors->has('email'))
                    <span class="error">{{ $errors->first('email') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <div class="custom-form-group">
                    <label>Department*</label>
                    <input type="text" name="department" class="custom-form-control" placeholder="User department"
                        value="{{old('department')}}" />
                    @if ($errors->has('department'))
                    <span class="error">{{ $errors->first('department') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <div class="custom-form-group">
                    <label>Mobile No*</label>
                    <input type="number" name="mobile_no" class="custom-form-control" placeholder="User Mobile No"
                        value="{{old('mobile_no')}}" />
                    @if ($errors->has('mobile_no'))
                    <span class="error">{{ $errors->first('mobile_no') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <div class="custom-form-group">
                    <label>Location*</label>
                    <input type="text" name="location" class="custom-form-control" placeholder="User Location"
                        value="{{old('location')}}" />
                    @if ($errors->has('location'))
                    <span class="error">{{ $errors->first('location') }}</span>
                    @endif
                </div>
            </div>
        </div> 

        <div class="row">
            <div class="col-sm-3">
                <div class="custom-form-group">
                    <label>User Image*</label>
                    <div class="image-input">
                        <input name="image" type="file" id="imageInput" value="{{old('image')}}">
                        <label for="imageInput" class="image-button custom-form-control">Choose Image</label>
                        <img src="" class="image-preview">
                        <span class="change-image">
                            <img src="{{asset('images/close-icon.svg')}}" alt="close"/>
                        </span>
                        @if ($errors->has('image'))
                            <span class="error">{{ $errors->first('image') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="form-action-btn">
            <button type="submit" class="primary-btn">Submit</button>
        </div>
    </form>
</div>
@endsection

@section('script')
@endsection