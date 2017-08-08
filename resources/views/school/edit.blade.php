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
                    <h3>Edit School</h3>
                </div>

                {{--<div class="title_right">--}}
                {{--<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">--}}
                {{--<div class="input-group">--}}
                {{--<input type="text" class="form-control" placeholder="Search for...">--}}
                {{--<span class="input-group-btn">--}}
                {{--<button class="btn btn-default" type="button">Go!</button>--}}
                {{--</span>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{----}}
            </div>

            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Form to edit a School</h2>
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
                            <form method = "POST" action="{{ route('school.update') }}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="school_code">School Code <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="school_code" name="school_code" value="{{ $school->school_code }}" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="school_name">School Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="school_name" name="school_name" value="{{ $school->name }}" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                {{--<div class="form-group">--}}
                                    {{--<label class="control-label col-md-3 col-sm-3 col-xs-12" for="school_level_id">School Level <span class="required">*</span>--}}
                                    {{--</label>--}}
                                    {{--<div class="col-md-6 col-sm-6 col-xs-12">--}}
                                        {{--<select name="school_level_id" required="required" class="form-control col-md-7 col-xs-12">--}}

                                            {{--@foreach($schoolLevels as $school_level)--}}
                                                {{--@if($school->school_level_id==$school_level->id)--}}
                                                    {{--<option value="{{ $school_level->id }}" selected>{{ $school_level->name }}</option>--}}
                                                {{--@else--}}
                                                    {{--<option value="{{ $school_level->id }}">{{ $school_level->name }}</option>--}}
                                                {{--@endif--}}
                                            {{--@endforeach--}}
                                        {{--</select>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">School Level<span class="required">*</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        {!! Form::select('school_level_id', (['0' => '---Select School Level---'] + $schoolLevels), $selectedSchoolLevel, ['class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Dzongkhag /Thromde <span class="required">*</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        {!! Form::select('dzongkhag_id', (['0' => '---Select Dzongkhag---'] + $dzongkhags), $selectedDzongkhag, ['class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">School Status <span class="required">*</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        {!! Form::select('school_status_type_id', (['0' => '---Select School Status---'] + $schoolStatusTypes), $selectedSchoolStatusType, ['class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <input type="hidden" name="id" value="{{ $schoolId }}">
                                        <input type="hidden" name="version" value="{{ $school->version }}"/>
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
