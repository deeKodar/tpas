@extends('layouts.master')

@push('stylesheets')
    @include('includes/dashboard-charts-css')
@endpush

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">
        <div class="" id="graph">
        <div class="page-title">
            <div class="title_left">
                <h1>TRE Dashboards::</h1>
            </div>
        </div>

        <div class="clearfix"></div>

        {{--<div id="graph">--}}
            {{--<h4>rocket League Wins Comparision</h4>--}}
            {{--<canvas height="150" width="300" id="graph"></canvas>--}}
            {{--<wins-graph :player="{{ json_encode($sonam) }}" :opponent="{{ json_encode($darshan) }}"></wins-graph>--}}

        {{--</div>--}}
            {{--<div>--}}
                {{--<canvas width="200" height="150" id="myChart"></canvas>--}}
            {{--</div>--}}

        {{--<div class="clearfix"></div>--}}

            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Class-wise Section<small>Counts</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                {{--<li class="dropdown">--}}
                                    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-filter"></i> Filter</a>--}}
                                    {{--<ul class="dropdown-menu" role="menu">--}}
                                        {{--<li><a href="#">National</a>--}}
                                        {{--</li>--}}
                                        {{--<li><a href="#">Dzongkhag</a>--}}
                                        {{--</li>--}}
                                    {{--</ul>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<div class="form-group">--}}
                                        {{--<label for="chart_filter"><i class="fa fa-filter"></i> Filter </label>--}}
                                    {{--</div>--}}
                                {{--</li>--}}

                                <li class="dropdown">
                                    {{--<select id="dzongkhagId">--}}
                                        {{--<option value="o1" id="0">**Select Dzongkhag**</option>--}}
                                        {{--<option value="o1" id="1">Tshangkha</option>--}}
                                        {{--<option value="o2" id="2">Langthil</option>--}}
                                    {{--</select>--}}
                                    <div class="form-group">
                                    <select name="dzongkhag_id" id="dzongkhagslist" class="form-control col-md-7 col-xs-12" onchange="populateDzongkhagSchools()" >
                                        <option selected disabled>Select Dzongkhag</option>
                                        @foreach($dzongkhags as $d)

                                            <option value="{{ $d->id }}">{{ $d->name }}</option>

                                        @endforeach
                                    </select>
                                    </div>
                                </li>
                                <li></li>
                                <li class="dropdown">
                                    {{--<select id="schoolId">--}}
                                        {{--<option value="o1" id="0">**Select School**</option>--}}
                                        {{--<option value="o1" id="1">Tshangkha</option>--}}
                                        {{--<option value="o2" id="2">Langthil</option>--}}
                                    {{--</select>--}}
                                    <div class="form-group">
                                    <select name="school_id" required="required" class="form-control col-md-7 col-xs-12" id="schoolslist">
                                        <option selected disabled>Please select a school</option>
                                    </select>
                                    </div>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            {{--@foreach($classSection as $cs)--}}
                                {{--<ul>--}}
                                    {{--<li>{{ $cs['class'] }} - {{ $cs['section'] }}</li>--}}
                                {{--</ul>--}}
                            {{--@endforeach--}}
                            {{--<class-section-graph></class-section-graph>--}}
                            {{--<select id="schoolId">--}}
                                {{--<option value="o1" id="0">**Select School**</option>--}}
                                {{--<option value="o1" id="1">Tshangkha</option>--}}
                                {{--<option value="o2" id="2">Langthil</option>--}}
                            {{--</select>--}}
                            {{--<button id="btnSection">GENERATE!</button>--}}
                            <canvas id="myChart" width="200" height="150"></canvas>

                        </div>
                    </div>
                </div>

                {{--<div class="col-md-6 col-sm-6 col-xs-12">--}}
                    {{--<div class="x_panel">--}}
                        {{--<div class="x_title">--}}
                            {{--<h2>Subject-wise Teachers<small>Availability</small></h2>--}}
                            {{--<ul class="nav navbar-right panel_toolbox">--}}
                                {{--<li class="dropdown">--}}
                                    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-filter"></i> Filter</a>--}}
                                    {{--<ul class="dropdown-menu" role="menu">--}}
                                        {{--<li><a href="#">National</a>--}}
                                        {{--</li>--}}
                                        {{--<li><a href="#">Dzongkhag</a>--}}
                                        {{--</li>--}}
                                    {{--</ul>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                            {{--<div class="clearfix"></div>--}}
                        {{--</div>--}}
                        {{--<div class="x_content">--}}
                            {{--<wins-graph :player="{{ json_encode($sonam) }}" :opponent="{{ json_encode($darshan) }}"></wins-graph>--}}
                            {{--<subject-teacher-graph></subject-teacher-graph>--}}
                            {{--<class-section-graph></class-section-graph>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

            </div>

            {{--<div class="row">--}}
                {{--<div class="col-md-6 col-sm-6 col-xs-12">--}}
                    {{--<div class="x_panel">--}}
                        {{--<div class="x_title">--}}
                            {{--<h2>Class-wise Section<small>Counts</small></h2>--}}
                            {{--<ul class="nav navbar-right panel_toolbox">--}}
                                {{--<li class="dropdown">--}}
                                    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-filter"></i> Filter</a>--}}
                                    {{--<ul class="dropdown-menu" role="menu">--}}
                                        {{--<li><a href="#">National</a>--}}
                                        {{--</li>--}}
                                        {{--<li><a href="#">Dzongkhag</a>--}}
                                        {{--</li>--}}
                                    {{--</ul>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                            {{--<div class="clearfix"></div>--}}
                        {{--</div>--}}
                        {{--<div class="x_content">--}}
                            {{--@foreach($classSection as $cs)--}}
                            {{--<ul>--}}
                            {{--<li>{{ $cs['class'] }} - {{ $cs['section'] }}</li>--}}
                            {{--</ul>--}}
                            {{--@endforeach--}}
                            {{--<class-section-graph></class-section-graph>--}}

                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="col-md-6 col-sm-6 col-xs-12">--}}
                    {{--<div class="x_panel">--}}
                        {{--<div class="x_title">--}}
                            {{--<h2>Subject-wise Teachers<small>Availability</small></h2>--}}
                            {{--<ul class="nav navbar-right panel_toolbox">--}}
                                {{--<li class="dropdown">--}}
                                    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-filter"></i> Filter</a>--}}
                                    {{--<ul class="dropdown-menu" role="menu">--}}
                                        {{--<li><a href="#">National</a>--}}
                                        {{--</li>--}}
                                        {{--<li><a href="#">Dzongkhag</a>--}}
                                        {{--</li>--}}
                                    {{--</ul>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                            {{--<div class="clearfix"></div>--}}
                        {{--</div>--}}
                        {{--<div class="x_content">--}}
                            {{--<wins-graph :player="{{ json_encode($sonam) }}" :opponent="{{ json_encode($darshan) }}"></wins-graph>--}}
                            {{--<subject-teacher-graph></subject-teacher-graph>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

            {{--</div>--}}
    </div>
    </div>
@endsection
@push('scripts')
    @include('includes/dashboard-charts-scripts')
    @include('includes/custom-charts/class_section_chart')
    {{--<script src="{{ asset("js/main.js") }}"></script>--}}
    {{--<script src="/js/main.js"></script>--}}
    {{--<script src="/js/report-charts/class-section.js"></script>--}}
@endpush


