@extends('layouts.master')

@push('stylesheets')
    <!-- Example -->
    <!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->
     
@endpush

@section('main_container')

 <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Add a new user</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>User</h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form method = "POST" action=" {{url('/')}}/users/store" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        {{ csrf_field() }}
                       
                     
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_name">User Name<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="user_name" name="user_name" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_label">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Password <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="password" id="password" name="password" required="required" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="confirm_password">Confirm Password <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="password" id="password_confirm" name="password_confirm" required="required" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>
                      <div class="form-group">
                      	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="confirm_password">Role <span class="required">*</span>
                        </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                           <select name="role_id" id="role" required="required" class="form-control col-md-7 col-xs-12">
                            <option value="" selected disabled>Please Select</option>
                          @foreach($roles as $role)
                          <option value="{{ $role->id }}">{{ $role->name }}</option>
                          @endforeach
                        </select>
                        </div>
                      </div>
                      <div class="form-group" id="dzongkhags" style="display:none;">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dzongkhags">Dzongkhag <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12" >
                        
                        <select name="dzongkhag_id" id="dzongkhagslist" class="form-control col-md-7 col-xs-12" onchange="populateSchools()">
                          <option selected disabled>Select Dzongkhag</option>
                          @foreach($dzongkhags as $dzongkhag)
                          <option value="{{$dzongkhag->id}}">{{$dzongkhag->name}}</option>
                          @endforeach
                        </select>
                      
                      </div>
                    </div>
                    <div class="form-group" id="schools" style="display:none;">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12" for="schools">School <span class="required">*</span>
                        </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                     
                        <select name="school_id" class="form-control col-md-7 col-xs-12" id="schoolslist" ><option disabled selected>Select School</option>
                          
                        </select>
                      
                    </div>
                    </div>
                      <div class="ln_solid"></div>

                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="{{ URL::previous() }}" class="btn btn-primary" type="button">Cancel</a>
              
                          <button type="submit" class="btn btn-success">Create</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      @endsection


  @push('scripts')

@include('includes/register_user_script')

@include('includes/school_from_dzongkhag')
   
  @endpush



@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
