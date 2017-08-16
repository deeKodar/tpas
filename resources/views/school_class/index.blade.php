@extends('layouts.master')

@push('stylesheets')
  @include('includes/dynamic-table-css')
@endpush 

@section('main_container')
  <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Class Management<small></small></h3>
              </div>
              <div class="title_right">
              </div>
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="nav navbar-left add-button">
                        <a href="{{ route('school_class.create') }}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add Class</a>
                    </div>
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
                    <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                      <thead>
                        <tr> 
                          <th>Sl.No</th>
                          {{--<th>Class ID</th>--}}
                          <th>Class Name</th>
                          <th class="column-title no-link last"><span class="nobr">Action</span>
                          </th>
                        </tr>
                      </thead>

                      <tbody>
                      @foreach($schoolClasses as $index => $class)
                        <tr>
                          <td>{{ $index + 1 }}</td>
                          {{--<td>{{$class->id}}</td>--}}
                          <td>{{$class->name}}</td>
                          <td class=" last">
                            <a href="{{ route('school_class.edit', ['id' => $class->id]) }}" class="btn btn-xs btn-warning waves-effect waves-light" data-toggle="tooltip" data-placement="left" title="Edit Class"><i class="fa fa-pencil-square fa-lg" aria-hidden="true"></i> Edit</a>
                            <a href="{{ route('school_class.delete', ['id' => $class->id]) }}" class="btn btn-xs btn-danger waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Delete Class"><i class="fa fa-trash fa-lg" aria-hidden="true"></i> Delete</a>
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

