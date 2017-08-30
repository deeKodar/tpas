@extends('layouts.master')

@push('stylesheets')
    <!-- Example -->
    <!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->
      <link href="{{ asset('vendor/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
@endpush

@section('main_container')

 <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Teacher Management</h3>
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
                    <h2>Inter Dzongkhag Transfer</h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form method = "POST" action=" {{route('teachers.transfer.inter', ['id' => $teacher->id])}}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12" value="{{ $teacher->name }}" disabled>
                        </div>
                      </div>
                       
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_id">Employee Id <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="employee_id" required="required" class="form-control col-md-7 col-xs-12" value="{{ $teacher->employee_id }}" disabled>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gender">Gender<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select required="required" name="gender" class="form-control col-md-7 col-xs-12" disabled >
                            @if($teacher->gender=='M')
                            <option value="M" selected>Male</option>
                            <option value="F" >Female</option>
                            @else
                            <option value="F" selected>Female</option>
                            <option value="M">Female</option>
                            @endif
                         </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth <span class="required">*</span>
                        </label>

                        <fieldset>
                          <div class="control-group">
                            <div class="controls">
                              <div class="col-md-6 xdisplay_inputx form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" id="single_cal2" value="{{ date('m/d/Y',strtotime($teacher->date_of_birth)) }} " name="date_of_birth" aria-describedby="inputSuccess2Status" disabled>
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                              </div>
                            </div>
                          </div>
                        </fieldset>
                       
                      </div>
                       
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dzongkhag">Dzongkhag<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="dzongkhag_id" id="dzongkhagslist" required="required" class="form-control col-md-7 col-xs-12">
                            
                          @foreach($dzongkhags as $d)
                          @if($teacher->dzongkhag_id==$d->id)
                          <option value="{{ $d->id }}" selected>{{ $d->name }}</option>
                          @else
                          <option value="{{ $d->id }}">{{ $d->name }}</option>
                          @endif
                          @endforeach
                        </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="school_id">School<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="school_id" required="required" id="schoolslist" class="form-control col-md-7 col-xs-12" disabled >
                            @foreach($schools as $school)
                            @if(isset($teacher->school_id) && $teacher->school_id==$school->id)
                            <option value="{{$school->name}}" selected>{{$school->name}}</option>
                          @endif
                          @endforeach
                        </select>
                        </div>
                      </div>
                      <input type="hidden" name="version" value="{{$teacher->version}}"/>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="{{ URL::previous() }}" class="btn btn-primary" type="button">Cancel</a>
              
                          <button type="submit" class="btn btn-success">Transfer</button>
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
  @include('includes/school_from_dzongkhag')

   <script src="{{ asset("vendor/moment/min/moment.min.js") }}"></script>

    <script src="{{ asset("vendor/bootstrap-daterangepicker/daterangepicker.js") }}"></script>

  @endpush