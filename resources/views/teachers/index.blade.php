@extends('layouts.master')

@push('stylesheets')
@include('includes/dynamic-table-css')
@endpush


@section('main_container')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Teacher Management<small></small></h3>
                </div>
                <div class="title_right">
                </div>
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <div class="nav navbar-left add-button">
                            <a href="{{url('/teachers/create')}}" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Add Teacher</a>
                        </div>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                            <thead>
                            <tr>
                                <th>Sl.No</th>
                                <th>Teacher Name</th>
                                <th>EmpID</th>
                                <th>School</th>
                                 <th>Dzongkhag</th>
                                 <th>Status</th>
                                <th class="column-title no-link last"><span class="nobr">Action</span>
                                </th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($teachers as $teacher)
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
                                        <td>{{$teacher->dzongkhag->name}}</td>
                                        <td>{{$teacher->teacherStatusType->name}}</td>
                                    <td class=" last">
                                         <form action="{{route('teachers.delete')}}" method="POST">
                                            {{csrf_field()}}
                                            {{ method_field('DELETE') }}
                                        <a href="{{url('/')}}/teachers/edit/{{$teacher->id}}" class="btn btn-xs btn-warning waves-effect waves-light" data-toggle="tooltip" data-placement="left" title="Edit Teacher"><i class="fa fa-pencil-square fa-lg" aria-hidden="true"></i> Edit</a>


                                            <input type="hidden" name="teacher_id" value="{{$teacher->id}}"/>
                                            <button type="submit" class="btn btn-xs btn-danger waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Delete Teacher"><i class="fa fa-trash fa-lg" aria-hidden="true"></i>Delete</button>

                                        <a href="{{url('/')}}/teachers/view/{{$teacher->id}}" class="btn btn-xs btn-success waves-effect waves-light" data-toggle="tooltip" data-placement="right" title="View Teacher Details"><i class="fa fa-eye fa-lg" aria-hidden="true"></i> View Detail</a>
                                        </form>
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


@endpush
