@extends('layouts.master')

@push('stylesheets')
    <!-- Example -->
    <!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->
      <link href="{{ asset('vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
@endpush

@section('main_container')

 <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Create a new teacher</h3>
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
                    <h2>Form to create a new teacher</h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form method = "POST" action=" {{ route('teachers.store') }}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        {{ csrf_field() }}
                       
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first_name">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_id">Employee ID <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="employee_id" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="position_title">Position Title<span class="required">*</span>
                        </label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="position_title" required="required" class="form-control col-md-7 col-xs-12">
                           <option value="" selected disabled>Please select</option>
                          @foreach($positiontitles as $positiontitle)
                          
                          <option value="{{ $positiontitle->id }}">{{ $positiontitle->name }}</option>
                         
                           
                          @endforeach
                        </select>
                      </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="position_level">Position Level<span class="required">*</span>
                        </label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="position_level" required="required" class="form-control col-md-7 col-xs-12" >
                           <option value="" selected disabled>Please select</option>
                          @foreach($positionlevels as $positionlevel)
                          
                           <option value="{{ $positionlevel->id }}">{{ $positionlevel->name }}</option>
                           
                          @endforeach
                        </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gender">Gender<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select required="required" name="gender" class="form-control col-md-7 col-xs-12"  >
                           <option selected disabled>Please select</option>
                            <option value="F">Female</option>
                            <option value="M">Male</option>
                           
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
                                <input type="text" class="form-control has-feedback-left" value="01/01/2000" id="single_cal2" name="date_of_birth" aria-describedby="inputSuccess2Status">
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                              </div>
                            </div>
                          </div>
                        </fieldset>
                       
                      </div>
                       
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employment_type_id">Employment Type<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                       <select name="employment_type_id" required="required" class="form-control col-md-7 col-xs-12" id="empType" onchange="checkEmpType()">
                           <option value="" selected disabled>Please select</option>
                          @foreach($employmenttypes as $employmenttype)
                          
                           <option value="{{ $employmenttype->id }}">{{ $employmenttype->name }}</option>
                          
                          @endforeach
                        </select>
                      </div>

                      </div>
                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="initial_appointment_date">Initial Appointment Date<span class="required">*</span>
                        </label>
                       
                        <fieldset>
                          <div class="control-group">
                            <div class="controls">
                              <div class="col-md-6 xdisplay_inputx form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" id="single_cal1" name="initial_appointment_date" aria-describedby="inputSuccess2Status">
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                              </div>
                            </div>
                          </div>
                        </fieldset>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="current_appointment_date">Current Appointment Date<span class="required">*</span>
                        </label>
                        
                        <fieldset>
                          <div class="control-group">
                            <div class="controls">
                              <div class="col-md-6 xdisplay_inputx form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" id="single_cal3" name="current_appointment_date" aria-describedby="inputSuccess2Status">
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                              </div>
                            </div>
                          </div>
                        </fieldset>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="initial_qualification_id">Initial Qualification ID<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="initial_qualification_id" required="required" class="form-control col-md-7 col-xs-12">
                          <option value="" selected disabled>Please select</option>
                          @foreach($qualifications as $qualification)
                          
                          <option value="{{ $qualification->id }}" >{{ $qualification->name }}</option>
                          
                          @endforeach
                        </select>
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="current_qualification_id">Current Qualification ID<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="current_qualification_id" required="required" class="form-control col-md-7 col-xs-12">
                            
                          <option value="" selected disabled>Please select</option>
                          @foreach($qualifications as $qualification)
                         
                          <option value="{{ $qualification->id }}" >{{ $qualification->name }}</option>
                         
                          @endforeach
                        </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="field_of_study_id">Field of study <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="field_of_study_id" required="required" class="form-control col-md-7 col-xs-12">
                            
                          <option value="" selected disabled>Please select</option>
                          @foreach($fields as $field)
                         
                          <option value="{{ $field->id }}">{{ $field->name }}</option>
                          
                          @endforeach
                        </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="school_id">Dzongkhag<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="dzongkhag_id" id="dzongkhagslist" class="form-control col-md-7 col-xs-12" onchange="populateSchools()" >
                          <option selected disabled>Select Dzongkhag</option>
                           @foreach($dzongkhags as $d)
                          
                          <option value="{{ $d->id }}">{{ $d->name }}</option>
                          
                          @endforeach
                        </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="school_id">School<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="school_id" required="required" class="form-control col-md-7 col-xs-12" id="schoolslist">
                            <option selected disabled>Please select a school</option>
                        </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="core_subject_id">Core Subject <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="core_subject_id" required="required" class="form-control col-md-7 col-xs-12">
                            <option value="" selected disabled>Please select</option>
                          @foreach($subjects as $subject)
                          
                          <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                          
                          @endforeach
                        </select>
                         
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="subject_one_id">Subject 1<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <select name="subject_one_id" required="required" class="form-control col-md-7 col-xs-12">
                          <option value="" selected disabled>Please select</option>
                          @foreach($subjects as $subject)
                         
                          <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                         
                          @endforeach
                        </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="subject_two_id">Subject 2<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="subject_two_id" required="required" class="form-control col-md-7 col-xs-12">
                         <option value="" selected disabled>Please select</option>   
                          @foreach($subjects as $subject)
                         
                          <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                      
                          @endforeach
                        </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="subject_three_id">Subject 3
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="subject_three_id" class="form-control col-md-7 col-xs-12">
                          <option value="" selected disabled>Please select</option>
                          @foreach($subjects as $subject)
                         
                          <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                          
                          @endforeach
                        </select>
                        </div>
                      </div>
                      <div class="form-group" id="contract_from">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contract_from">Contract From<span class="required">*</span>
                        </label>
                        
                        <fieldset>
                          <div class="control-group">
                            <div class="controls">
                              <div class="col-md-6 xdisplay_inputx form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" id="single_cal"  name="contract_from" aria-describedby="inputSuccess2Status" placeholder="dd/mm/yyyy">
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                              </div>
                            </div>
                          </div>
                        </fieldset>
                      </div>
                       <div class="form-group" id="contract_to">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contract_to">Contract To<span class="required">*</span>
                        </label>
                        
                        <fieldset>
                          <div class="control-group">
                            <div class="controls">
                              <div class="col-md-6 xdisplay_inputx form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" id="single_cal" name="contract_to" aria-describedby="inputSuccess2Status" placeholder="dd/mm/yyyy" >
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                              </div>
                            </div>
                          </div>
                        </fieldset>
                      </div>
                       <div class="form-group" >
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="remarks">Remarks<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="remarks" name="remarks" required="required" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hometown">Hometown<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="hometown" id="hometown" class="form-control col-md-7 col-xs-12" >
                          <option selected disabled>Please select</option>
                           @foreach($hometowns as $d)
                         
                          <option value="{{ $d->id }}">{{ $d->name }}</option>
                          
                          @endforeach
                        </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_status_type_id">Employee status <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="employee_status_type_id" required="required" class="form-control col-md-7 col-xs-12" >
                          <option value="" selected disabled>Please select</option>
                          @foreach($teacherstatus as $status)
                         
                          <option value="{{ $status->id }}">{{ $status->name }}</option>
                         
                          @endforeach
                        </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="marital_status">Marital Status<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="marital_status" required="required" class="form-control col-md-7 col-xs-12">
                        <option value="" selected disabled>Please select</option>
                          <option value="Single">Single</option>
                          <option value="Married">Married</option>
                          <option value="Divorced">Divorced</option>
                          <option value="Widow">Widow</option>
                        


                         
                        </select>
                        </div>
                        <input type="hidden" name="version" />
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="{{ URL::previous() }}" class="btn btn-primary" type="button" ">Cancel</a>
                          <input type="submit" class="btn btn-success" value="Create">
                         
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
  @include('includes/check_emp_type')

   <script src="{{ asset("vendors/moment/min/moment.min.js") }}"></script>

    <script src="{{ asset("vendors/bootstrap-daterangepicker/daterangepicker.js") }}"></script>

  @endpush
