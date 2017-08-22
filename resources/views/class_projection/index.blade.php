@extends('layouts.master')

@push('stylesheets')
@include('includes/dynamic-table-css')
@endpush

@section('main_container')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="">
                    <h3>Class Size Management: <b>[ {{ $locationName }} {{ $schoolLevelName }} ]</b></h3>
                    {{--<h4>School Name: <b>[ {{ $schoolName }} ]</b></h4>--}}
                </div>
                <div class="title_right">
                </div>
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        {{--@if($roleId == 4)--}}
                        @can('add_projections')
                        <div class="nav navbar-left add-button">
                            <a href="{{ route('class_projection.create') }}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add Class Size</a>
                        </div>
                        @endcan
                        {{--@endif--}}
                        <ul class="nav navbar-right panel_toolbox">
                            {{--<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>--}}
                            {{--</li>--}}
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Projection Filter <i class="fa fa-filter"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="javascript:void(0)" id="projection-type-actual">Actual</a>
                                    </li>
                                    <li><a href="#">Projected</a>
                                    </li>
                                </ul>
                            </li>
                            {{--<li><a class="close-link"><i class="fa fa-close"></i></a>--}}
                            {{--</li>--}}
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                            <thead>
                            {{--<h4>School Name: <b>[ {{ $schoolName }} ]</b></h4>--}}
                            <tr>
                                <th>Sl.No</th>
                                @if($roleId == 1 || $roleId == 2)
                                    <th>Dzongkhag</th>
                                    <th>School</th>
                                @elseif($roleId == 3)
                                    <th>School</th>
                                @endif
                                <th>Class</th>
                                <th>Total Student</th>
                                <th>Total Section</th>
                                <th>Year</th>
                                <th>Projection</th>
                                @can('edit_projections', 'delete_projections')
                                <th class="column-title no-link last"><span class="nobr">Action</span>
                                </th>
                                @endcan
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($classProjections as $index => $classProjection)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    @if($roleId == 1 || $roleId == 2)
                                        <td>{{ $classProjection->dzongkhag->name }}</td>
                                        <td>{{ $classProjection->school->name }}</td>
                                    @elseif($roleId == 3)
                                        <td>{{ $classProjection->school->name }}</td>
                                    @endif
                                    <td>{{ $classProjection->schoolClass->name }} </td>
                                    <td>{{ $classProjection->student_count }}</td>
                                    <td>{{ $classProjection->section_count }}</td>
                                    <td>{{ $classProjection->curriculum_year }}</td>
                                    <td>{{ $classProjection->projectionType->name }}</td>
                                    @can('edit_projections', 'delete_projections')
                                    <td class=" last">
                                        <a href="{{ route('class_projection.edit', ['id' => $classProjection->id]) }}" class="btn btn-xs btn-warning waves-effect waves-light" data-toggle="tooltip" data-placement="left" title="Edit Projection"><i class="fa fa-pencil-square fa-lg" aria-hidden="true"></i> Edit</a>
                                        <a href="{{ route('class_projection.delete', ['id' => $classProjection->id]) }}" class="btn btn-xs btn-danger waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Delete Projection"><i class="fa fa-trash fa-lg" aria-hidden="true"></i> Delete</a>
                                        {{--<a href="{{ route('#') }}" class="btn btn-xs btn-success waves-effect waves-light" data-toggle="tooltip" data-placement="right" title="View Class Details"><i class="fa fa-eye fa-lg" aria-hidden="true"></i> View Detail</a>--}}
                                    </td>
                                    @endcan
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
{{--<script>--}}
    {{--var table = $('#datatable-checkbox').DataTable();--}}

    {{--// #myInput is a <input type="text"> element--}}
    {{--$('#projection-type-actual').on( 'click', function () {--}}
        {{--table.search( this.value );--}}
    {{--} );--}}
{{--</script>--}}
@endpush

