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
                <h3>View role details</h3>
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
                    <h2>Role Edit</h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form  action="#" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        
                        @foreach($role as $r)
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="role_id">Role ID <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="role_id" name="role_id" disabled class="form-control col-md-7 col-xs-12" value="{{$r->id}}">
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="role_name">Role Name<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="role_name" name="role_name" class="form-control col-md-7 col-xs-12" value="{{ $r->name }}" disabled>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="role_label">Role Label <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="role_label" name="role_label" required="required" class="form-control col-md-7 col-xs-12" value="{{ $r->label }}" disabled>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="role_label">Permissions <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                        @foreach($r->permissions as $permission)
                          <span class="tag">
                            <span>{{$permission->name}}</span>
                          </span>
                         @endforeach
                        
                         

                        
                       

                        
                        </div>
                      </div>
                      @endforeach
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="{{url('/')}}/roles" class="btn btn-primary" type="button">Go back</a>
              
                          
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


<script src="{{ asset('vendors/jquery.tagsinput/src/jquery.tagsinput.js') }}"></script>
   
  @endpush