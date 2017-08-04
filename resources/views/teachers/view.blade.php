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
                <h3>View</h3>
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
                    <h2>Form to edit an existing teacher</h2>
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
                    <form method = "POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        {{ csrf_field() }}
                       
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first_name">First Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first_name" name="first_name" required="required" class="form-control col-md-7 col-xs-12" value="{{ $teacher->first_name }}" disabled>
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="middle_name">Middle Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="middle_name" name="middle_name" class="form-control col-md-7 col-xs-12" value="{{ $teacher->middle_name }}" disabled>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last_name">Last Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last_name" name="last_name" required="required" class="form-control col-md-7 col-xs-12" value="{{ $teacher->last_name }}" disabled>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="citizenship_id">CID<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="citizenship_id" required="required" class="form-control col-md-7 col-xs-12" value="{{ $teacher->citizenship_id }}" disabled>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="citizenship">Citizenship<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <select name="citizenship" required="required" class="form-control col-md-7 col-xs-12" disabled>
                            
                          @foreach($nationalities as $nationality)
                          @if($teacher->citizenship==$nationality->id)
                          <option value="{{ $nationality->id }}" selected>{{ $nationality->name }}</option>
                          @else
                           <option value="{{ $nationality->id }}">{{ $nationality->name }}</option>
                           @endif
                          @endforeach
                        </select>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="position_level">Position Level<span class="required">*</span>
                        </label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="position_level" required="required" class="form-control col-md-7 col-xs-12" disabled>
                           
                          @foreach($positionlevels as $positionlevel)
                          @if($teacher->position_level==$positionlevel->id)
                          <option value="{{ $positionlevel->id }}" selected>{{ $positionlevel->name }}</option>
                          @else
                           <option value="{{ $positionlevel->id }}">{{ $positionlevel->name }}</option>
                           @endif
                          @endforeach
                        </select>
                      </div>

                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="position_title">Position Title<span class="required">*</span>
                        </label>
                         <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="position_title" required="required" class="form-control col-md-7 col-xs-12" disabled>
                           
                          @foreach($positiontitles as $positiontitle)
                          @if($teacher->position_title==$positiontitle->id)
                          <option value="{{ $positiontitle->id }}" selected>{{ $positiontitle->name }}</option>
                          @else
                           <option value="{{ $positiontitle->id }}">{{ $positiontitle->name }}</option>
                           @endif
                          @endforeach
                        </select>
                      </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employment_type_id">Employment Type ID<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                       <select name="employment_type_id" required="required" class="form-control col-md-7 col-xs-12" disabled>
                           
                          @foreach($employmenttypes as $employmenttype)
                          @if($teacher->employment_type_id==$employmenttype->id)
                          <option value="{{ $employmenttype->id }}" selected>{{ $employmenttype->name }}</option>
                          @else
                           <option value="{{ $employmenttype->id }}">{{ $employmenttype->name }}</option>
                           @endif
                          @endforeach
                        </select>
                      </div>

                      </div>
                     
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="current_appointment_date">Current Appointment Date<span class="required">*</span>
                        </label>
                        
                        <fieldset>
                          <div class="control-group">
                            <div class="controls">
                              <div class="col-md-6 xdisplay_inputx form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" id="single_cal3" value="{{ date('m/d/Y',strtotime($teacher->current_appointment_date)) }} " name="current_appointment_date" aria-describedby="inputSuccess2Status" disabled>
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                              </div>
                            </div>
                          </div>
                        </fieldset>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="initial_appointment_date">Initial Appointment Date<span class="required">*</span>
                        </label>
                       
                        <fieldset>
                          <div class="control-group">
                            <div class="controls">
                              <div class="col-md-6 xdisplay_inputx form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" id="single_cal1" value="{{ date('m/d/Y',strtotime($teacher->initial_appointment_date)) }} " name="initial_appointment_date" aria-describedby="inputSuccess2Status" disabled>
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status" class="sr-only">(success)</span>
                              </div>
                            </div>
                          </div>
                        </fieldset>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="qualification_id">Qualification ID<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="qualification_id" required="required" class="form-control col-md-7 col-xs-12" disabled>
                            
                          @foreach($qualifications as $qualification)
                          @if($teacher->qualification_id==$qualification->id)
                          <option value="{{ $qualification->id }}" selected>{{ $qualification->name }}</option>
                          @else
                          <option value="{{ $qualification->id }}" >{{ $qualification->name }}</option>
                          @endif
                          @endforeach
                        </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="field_of_study_id">Field of study <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="field_of_study_id" required="required" class="form-control col-md-7 col-xs-12" disabled>
                            
                          @foreach($fields as $field)
                          @if($teacher->field_of_study_id)
                          <option value="{{ $field->id }}" selected="">{{ $field->name }}</option>
                          @else
                          <option value="{{ $field->id }}">{{ $field->name }}</option>
                          @endif
                          @endforeach
                        </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="class_id">Class ID<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="class_id" required="required" class="form-control col-md-7 col-xs-12" disabled>
                            
                          @foreach($classes as $c)
                          @if($teacher->class_id==$c->id)
                          <option value="{{ $c->id }}" selected>{{ $c->name }}</option>
                          @else
                          <option value="{{ $c->id }}" >{{ $c->name }}</option>
                          @endif
                          @endforeach
                        </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="school_id">School ID<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="school_id" required="required" class="form-control col-md-7 col-xs-12" disabled>
                            
                          @foreach($schools as $s)
                          @if($teacher->school_id==$s->id)
                          <option value="{{ $s->id }}" selected>{{ $s->name }}</option>
                          @else
                          <option value="{{ $s->id }}">{{ $s->name }}</option>
                          @endif
                          @endforeach
                        </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="core_subject_id">Core Subject Code <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="core_subject_id" required="required" class="form-control col-md-7 col-xs-12" disabled>
                            
                          @foreach($subjects as $subject)
                          @if($teacher->core_subject_id==$subject->id)
                          <option value="{{ $subject->id }}" selected>{{ $subject->name }}</option>
                          @else
                          <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                          @endif
                          @endforeach
                        </select>
                         
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="elective_subject_one_id">Elective Subject 1<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <select name="elective_subject_one_id" required="required" class="form-control col-md-7 col-xs-12" disabled>
                            
                          @foreach($subjects as $subject)
                          @if($teacher->elective_subject_one_id==$subject->id)
                          <option value="{{ $subject->id }}" selected>{{ $subject->name }}</option>
                          @else
                          <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                          @endif
                          @endforeach
                        </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="elective_subject_two_id">Elective Subject 2<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="elective_subject_two_id" required="required" class="form-control col-md-7 col-xs-12" disabled>
                            
                          @foreach($subjects as $subject)
                          @if($teacher->elective_subject_two_id==$subject->id)
                          <option value="{{ $subject->id }}" selected>{{ $subject->name }}</option>
                          @else
                          <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                          @endif
                          @endforeach
                        </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="elective_subject_three_id">Elective Subject 3<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="elective_subject_three_id" required="required" class="form-control col-md-7 col-xs-12" disabled>
                            
                          @foreach($subjects as $subject)
                          @if($teacher->elective_subject_three_id==$subject->id)
                          <option value="{{ $subject->id }}" selected>{{ $subject->name }}</option>
                          @else
                          <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                          @endif
                          @endforeach
                        </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_status_type_id">Employee status <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="employee_status_type_id" required="required" class="form-control col-md-7 col-xs-12" disabled>
                           
                          @foreach($teacherstatus as $status)
                          @if($teacher->employee_status_type_id==$status->id)
                          <option value="{{ $status->id }}" selected>{{ $status->name }}</option>
                          @else
                          <option value="{{ $status->id }}">{{ $status->name }}</option>
                          @endif
                          @endforeach
                        </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="marital_status">Marital Status<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="marital_status" required="required" class="form-control col-md-7 col-xs-12" disabled>
                            
                         @if($teacher->marital_status=='Single')
                          <option value="Single" selected>Single</option>
                          <option value="Married">Married</option>
                          <option value="Divorced">Divorced</option>
                          <option value="Widow">Widow</option>
                          @elseif($teacher->marital_status=='Married')
                          <option value="Single">Single</option>
                          <option value="Married" selected>Married</option>
                          <option value="Divorced">Divorced</option>
                          <option value="Widow">Widow</option>
                          @elseif($teacher->marital_status=='Divorced')
                          <option value="Single" >Single</option>
                          <option value="Married">Married</option>
                          <option value="Divorced" selected>Divorced</option>
                          <option value="Widow">Widow</option>
                           @elseif($teacher->marital_status=='Wido')
                          <option value="Single" selected>Single</option>
                          <option value="Married">Married</option>
                          <option value="Divorced">Divorced</option>
                          <option value="Widow">Widow</option>
                        @endif


                         
                        </select>
                        </div>
                        <input type="hidden" name="version" value="{{$teacher->version}}"/>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="{{url('/')}}/teachers" class="btn btn-primary" type="button" ">Go Back</a>
                          <a href="{{url('/')}}/teachers/{{$teacher->id}}/edit" class="btn btn-primary" type="button">Edit</a>
                         
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

   <script src="{{ asset("vendor/moment/min/moment.min.js") }}"></script>

    <script src="{{ asset("vendor/bootstrap-daterangepicker/daterangepicker.js") }}"></script>

  @endpush