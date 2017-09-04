@extends('layouts.master')

@push('stylesheets')
@include('includes/dynamic-table-css')
@endpush


@section('main_container')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Support Staff Management<small></small></h3>
                </div>
                <div class="title_right">
                </div>
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                       <h2>Inter Dzongkhag Transfer of Teachers : @if(isset($dzongkhag))<b><u>{{$dzongkhag->name}}</u></b>@endif dzongkhag</h2>
                        
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                            <thead>
                            <tr>
                                <th>Sl.No</th>
                                <th>Teacher Name</th>
                                <th>Employee ID</th>
                                <th>School Name</th>
                                <th class="column-title no-link last"><span class="nobr">Action</span>
                                </th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($supports as $r)
                                <tr>
                                    <td>{{$teacher->id}}</td>
                                    <td>{{$teacher->name}}</td>
                                    <td>{{$teacher->employee_id}}</td>
                                    <td>@if($teacher->school_id==0)
                                        <span class="btn-danger" style="border-radius:10px;padding:5px;">Unallocated</span>
                                        @else
                                        {{$teacher->school->name}}
                                        @endif
                                        </td>
                                    <td class=" last">
                                        
                                        <a href="{{ route('teachers.transfer.inter', ['id' => $teacher->id]) }}" class="btn btn-xs btn-warning waves-effect waves-light" data-toggle="tooltip" data-placement="left" title="Inter dzongkhag transfer"><i class="fa fa-pencil-square fa-lg" aria-hidden="true"></i> Inter Transfer</a>

                                        <a href="{{ route('teachers.view', ['id' => $teacher->id]) }}" class="btn btn-xs btn-success waves-effect waves-light" data-toggle="tooltip" data-placement="right" title="View Teacher Details"><i class="fa fa-eye fa-lg" aria-hidden="true"></i> View Detail</a>
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

@include('includes/teacher_by_dzongkhag');

@endpush

