@extends('layouts.master')

@push('stylesheets')
<link href="{{ asset('vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet">
@endpush

@section('main_container')

    <div class="right_col" role="main">
        <div class="">

            <div class="page-title">
                <div class="title_left">
                    <h3>Edit Class Projection</h3>
                </div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Form to edit Class Projection</h2>
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
                            <form method = "POST" action="{{ route('class_projection.update') }}" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="school_class_id">Class <span class="required">*</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        {!! Form::select('school_class_id', (['0' => '---Select Class---'] + $schoolClasses), $selectedSchoolClass, ['class' => 'form-control col-md-7 col-xs-12']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="student_count">Total Student <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="student_count" name="student_count" value="{{ $classProjection->student_count }}" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="section_count">Total Section <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="section_count" name="section_count" value="{{ $classProjection->section_count }}" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="curriculum_year">Projection Year <span class="required">*</span>
                                    </label>
                                    <div class="input-group date col-md-6 col-sm-6 col-xs-12" id="curriculum_year">
                                        <input type="text" id="curriculum_year" name="curriculum_year" value="{{ $classProjection->curriculum_year }}" required="true" class="form-control col-md-7 col-xs-12" />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar">
                                            </span>
                                        </span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="projection_type_id">Projection Type <span class="required">*</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        {!! Form::select('projection_type_id', (['0' => '---Select Class---'] + $projectionTypes), $selectedProjectionType, ['class' => 'form-control col-md-7 col-xs-12']) !!}
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <input type="hidden" name="id" value="{{ $classProjectionId }}">
                                        <input type="hidden" name="version" value="{{ $classProjection->version }}"/>
                                        <a href="{{ route('class_projection.index') }}" class="btn btn-primary" type="button">Cancel</a>
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
