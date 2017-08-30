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
                    <h3>Edit Standard Subject Hours</h3>
                </div>

            </div>

            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Form to edit Standard Subject Hours</h2>
                           
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            <form method = "POST" action="{{ route('standard_subject_hour.update') }}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="subject_id">Subject<span></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="subject_id" name="subject_id" value="{{ $standardSubjectHour->subject->name }}" required="required" class="form-control col-md-7 col-xs-12" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="school_class_id">Class<span></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="school_class_id" name="school_class_id" value="{{ $standardSubjectHour->schoolClass->name }}" required="required" class="form-control col-md-7 col-xs-12" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="standard_hour">Weekly Teaching Hours (Hrs.) <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="standard_hour" name="standard_hour" value="{{ $standardSubjectHour->standard_hour }}" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="standard_minute">Weekly Teaching Minutes (Mins.) <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="standard_minute" name="standard_minute" value="{{ $standardSubjectHour->standard_minute }}" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                {{--<div class="form-group">--}}
                                    {{--<div class="input-group col-md-6 col-sm-6 col-xs-12 col-xs-offset-3">--}}
                                        {{--<span class="input-group-addon">Standard Teaching Hours:</span>--}}
                                        {{--<input type="text" class="form-control" id="standard_hour" name="standard_hour" value="{{ $standardSubjectHour->standard_hour }}" aria-label="Teaching Minutes">--}}
                                        {{--<span class="input-group-addon">Hrs.</span>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <input type="hidden" name="id" value="{{ $standardSubjectHourId }}">
                                        <a href="{{ route('standard_subject_hour.index') }}" class="btn btn-primary" type="button">Cancel</a>
                                        <button type="submit" class="btn btn-success">Update</button>
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
