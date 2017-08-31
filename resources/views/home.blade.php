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
                {{--<canvas width="200" height="150" id="graph"></canvas>--}}
            {{--</div>--}}

        {{--<div class="clearfix"></div>--}}

            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Class-wise Section<small>Counts</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-filter"></i> Filter</a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">National</a>
                                        </li>
                                        <li><a href="#">Dzongkhag</a>
                                        </li>
                                    </ul>
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
                            <class-section-graph></class-section-graph>

                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Subject-wise Teachers<small>Availability</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-filter"></i> Filter</a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">National</a>
                                        </li>
                                        <li><a href="#">Dzongkhag</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            {{--<wins-graph :player="{{ json_encode($sonam) }}" :opponent="{{ json_encode($darshan) }}"></wins-graph>--}}
                            <subject-teacher-graph></subject-teacher-graph>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Class-wise Section<small>Counts</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-filter"></i> Filter</a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">National</a>
                                        </li>
                                        <li><a href="#">Dzongkhag</a>
                                        </li>
                                    </ul>
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

                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Subject-wise Teachers<small>Availability</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-filter"></i> Filter</a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">National</a>
                                        </li>
                                        <li><a href="#">Dzongkhag</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            {{--<wins-graph :player="{{ json_encode($sonam) }}" :opponent="{{ json_encode($darshan) }}"></wins-graph>--}}
                            {{--<subject-teacher-graph></subject-teacher-graph>--}}
                        </div>
                    </div>
                </div>

            </div>
    </div>
    </div>
@endsection
@push('scripts')
    {{--@include('includes/scripts')--}}
    {{--<script src="{{ asset("js/main.js") }}"></script>--}}
    <script src="/js/main.js"></script>
@endpush


