@extends('layouts.master')

@push('stylesheets')
<!-- Example -->
<!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->
<link href="{{ asset('vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet">
@endpush

@section('main_container')

    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Add New Class Strength</h3>
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
                        {{--<div class="x_title">--}}
                            {{--<h2>Form to add new Class Projection</h2>--}}
                            
                            {{--<div class="clearfix"></div>--}}
                        {{--</div>--}}
                        <div class="x_content">
                            <br />
                            <form method = "POST" action=" {{ route('class_projection.store') }} " id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Class <span class="required">*</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        {!! Form::select('school_class_id', (['0' => '---Select Class---'] + $schoolClasses), null, ['class' => 'form-control col-md-7 col-xs-12']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="student_count">Total Student <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="student_count" name="student_count" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="section_count">Total Section <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="section_count" name="section_count" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="curriculum_year">Projection Year <span class="required">*</span>
                                    </label>
                                    <div class="input-group date col-md-6 col-sm-6 col-xs-12" id="curriculum_year">
                                        <input type="text" id="curriculum_year" name="curriculum_year" required="true" class="form-control col-md-7 col-xs-12" />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar">
                                            </span>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Projection Type <span class="required">*</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        {!! Form::select('projection_type_id', (['0' => '---Select Projection Type---'] + $projectionTypes), null, ['class' => 'form-control col-md-7 col-xs-12']) !!}
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <a href="{{ route('class_projection.index') }}" class="btn btn-primary" type="button">Cancel</a>
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
@push('scripts')
<script src="{{ asset("vendors/moment/min/moment.min.js") }}"></script>

<script src="{{ asset("vendors/bootstrap-datepicker/bootstrap-datepicker.min.js") }}"></script>

<script type="text/javascript">
    $(function () {
        $('#curriculum_year').datepicker({
            format: ' yyyy',
            viewMode: 'years',
            minViewMode: "years"
        });
    });
</script>
@endpush
