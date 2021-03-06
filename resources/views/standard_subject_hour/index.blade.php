@extends('layouts.master')

@push('stylesheets')
@include('includes/dynamic-table-css')
@endpush

@section('main_container')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Standard Subject Hour Management<small></small></h3>
                </div>
                <div class="title_right">
                </div>
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        {{--<div class="nav navbar-left add-button">--}}
                            {{--<a href="{{ route('subject.create') }}" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Add Subject</a>--}}
                        {{--</div>--}}
                        
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                            <thead>
                            <tr>
                                {{--<th>ID</th>--}}
                                <th>ID</th>
                                <th>Subject Name</th>
                                <th>Class Name</th>
                                <th>Standard Hour</th>
                                <th>Standard Minutes</th>
                                <th class="column-title no-link last"><span class="nobr">Action</span>
                                </th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($standardSubjectHours as $index => $standardSubjectHour)
                                <tr>
                                    {{--<td>{{$school->id}}</td>--}}
                                    {{--<td>{{$standardSubjectHour->id}}</td>--}}
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{$standardSubjectHour->subject->name}}</td>
                                    <td>{{$standardSubjectHour->schoolClass->name}}</td>
                                    <td>{{$standardSubjectHour->standard_hour}}</td>
                                    <td>{{$standardSubjectHour->standard_minute}}</td>
                                    <td class=" last">
                                        <a href="{{ route('standard_subject_hour.edit', ['id' => $standardSubjectHour->id]) }}" class="btn btn-xs btn-warning waves-effect waves-light" data-toggle="tooltip" data-placement="left" title="Edit Standard Hour"><i class="fa fa-pencil-square fa-lg" aria-hidden="true"></i> Edit</a>
                                        {{--<a href="{{ route('subject.delete', ['id' => $subject->id]) }}" class="btn btn-xs btn-danger waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Delete Subject"><i class="fa fa-trash fa-lg" aria-hidden="true"></i> Delete</a>--}}
                                        {{--<a href="{{ route('#') }}" class="btn btn-xs btn-success waves-effect waves-light" data-toggle="tooltip" data-placement="right" title="View Class Details"><i class="fa fa-eye fa-lg" aria-hidden="true"></i> View Detail</a>--}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
@include('includes/dynamic-table-scripts')
<script src="{{ asset("school_class") }}"></script>
@endpush

