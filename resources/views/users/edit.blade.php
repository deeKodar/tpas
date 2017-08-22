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
                <h3>Edit User</h3>
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
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form method = "POST" action=" {{url('/')}}/users/update/{{$user->id}}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        {{ csrf_field() }}
                       {{ method_field('PATCH') }}
                     
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_name">User Name<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="user_name" name="user_name" class="form-control col-md-7 col-xs-12" value="{{$user->name}}" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_label">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12" value="{{$user->email}}">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="confirm_password">Role <span class="required">*</span>
                        </label>
                       <div class="col-md-6 col-sm-6 col-xs-12">
                           <select name="role_id" id="role" required="required" class="form-control col-md-7 col-xs-12">
                            <option value="" selected disabled>Please Select</option>
                          @foreach($roles as $role)

                          @if($user->role_id==$role->id)
                          <option value="{{ $role->id }}" selected>{{ $role->name }}</option>                 
                          @else
                          <option value="{{ $role->id }}">{{ $role->name }}</option>
                          @endif
                          @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="form-group" id="dzongkhags" style="display:none;">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dzongkhags">Dzongkhag <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12" >
                        
                        <select name="dzongkhag_id" id="dzongkhagslist" class="form-control col-md-7 col-xs-12" onchange="populateSchools()">
                          
                          
                          @foreach($dzongkhags as $dzongkhag)
                          @if($user->dzongkhag_id==$dzongkhag->id)
                          <option value="{{ $dzongkhag->id}}" selected>{{$dzongkhag->name}}</option>
                          @else
                          <option value="{{$dzongkhag->id}}">{{$dzongkhag->name}}</option>
                          @endif
                          @endforeach
                        </select>
                      
                      </div>
                    </div>
                    <div class="form-group" id="schools" style="display:none;">
                       <label class="control-label col-md-3 col-sm-3 col-xs-12" for="schools">School <span class="required">*</span>
                        </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                     
                        <select name="school_id" class="form-control col-md-7 col-xs-12" id="schoolslist" >
                          @foreach($schools as $school)
                            @if(isset($user->school_id) && $user->school_id==$school->id)
                            <option value="{{ $school->name }}" selected>{{$school->name}}</option>
                          @endif
                          @endforeach
                          
                        </select>
                      
                    </div>
                    </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="{{ URL::previous() }}" class="btn btn-primary" type="button">Cancel</a>
              
                          <button type="submit" class="btn btn-success">Update</button>
                           
                        </div>
                      </div>

                    </form>
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
                      {{ csrf_field() }}
                       <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                      @if ($errors->has('email'))
                      <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                      @endif
                                <input type="hidden"  id="email" name="email" value="{{$user->email}}"/>
                            </div>
                            <button type="submit" class="btn btn-default submit ">Send Password Reset Link
                            </button>
                          </form>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      @endsection


  @push('scripts')
@include('includes/edit_user_script')
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
