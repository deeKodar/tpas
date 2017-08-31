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
                    <h3>Create new School</h3>
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

            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Form to add new School</h2>
                            
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            <form method = "POST" action=" {{ route('school.store') }} " id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="school_code">School Code <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="school_code" name="school_code" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="school_name">School Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="school_name" name="school_name" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                {{--<div class="form-group">--}}
                                    {{--<label class="control-label col-md-3 col-sm-3 col-xs-12">Dzongkhag / Thromde</label>--}}
                                    {{--<div class="col-md-9 col-sm-9 col-xs-12">--}}
                                        {{--<select class="form-control" name="dzongkhag_id">--}}
                                            {{--<option value="#">--Choose Dzongkhag--</option>--}}

                                            {{--@if ($dzongkhags->count())--}}

                                                {{--@foreach($dzongkhags as $dzongkhag)--}}
                                                {{--<option value="{{ $dzongkhag->id }}" {{ $selectedDzongkhag == $dzongkhag->id ? 'selected="selected"' : '' }}>{{ $dzongkhag->name }}</option>--}}

                                            {{--@endif--}}
                                        {{--</select>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">School Level <span class="required">*</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        {!! Form::select('school_level_id', (['0' => '---Select School Level---'] + $schoolLevels), null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Dzongkhag /Thromde <span class="required">*</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        {!! Form::select('dzongkhag_id', (['0' => '---Select Dzongkhag---'] + $dzongkhags), null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>


                                {{--{!! Form::select('dzongkhag_id', $dzongkhags, $selectedDzongkhag, ['class' => 'form-control m-bot15') !!}--}}

                                {{--<div class="form-group">--}}
                                    {{--<label class="control-label col-md-3 col-sm-3 col-xs-12">School Status</label>--}}
                                    {{--<div class="col-md-9 col-sm-9 col-xs-12">--}}
                                        {{--<select class="form-control">--}}
                                            {{--<option>Choose option</option>--}}
                                        {{--</select>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">School Status <span class="required">*</label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        {!! Form::select('school_status_type_id', (['0' => '---Select School Status---'] + $schoolStatusTypes), null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <a href="{{ route('school.index') }}" class="btn btn-primary" type="button">Cancel</a>
                                        <button type="submit" class="btn btn-success">Submit</button>
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
