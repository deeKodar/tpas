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
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="nav navbar-left add-button">
                        <a href="school-classes/create" class="btn btn-primary">Add Class</a>
                    </div>
                    {{--  <ul class="nav navbar-right panel_toolbox">
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
                    </ul>  --}}
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    {{--  <p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p>  --}}

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th>
                              <input type="checkbox" id="check-all" class="flat">
                            </th>
                            <th class="column-title">Class ID</th>
                            <th class="column-title">Class Name</th>
                            {{--  <th class="column-title">Order </th>
                            <th class="column-title">Bill to Name </th>
                            <th class="column-title">Status </th>
                            <th class="column-title">Amount </th>  --}}
                            <th class="column-title no-link last"><span class="nobr">Action</span>
                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                        @foreach($school_classes as $class)
                        <?php
                        //$id = $class['id'];
                        //$id++;

                        //$css_class = ($id%2 == 0)? 'even pointer': 'odd pointer';
                        //echo "<tr class='$css_class'>";
                        ?>
                           <tr class="even pointer"> 
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" ">{{$class['id']}}</td>
                            <td class=" ">{{$class['name']}} </td>
                            {{--  <td class=" ">121000210 <i class="success fa fa-long-arrow-up"></i></td>
                            <td class=" ">John Blank L</td>
                            <td class=" ">Paid</td>
                            <td class="a-right a-right ">$7.45</td>  --}}
                            <td class=" last"><a href="#">View</a>
                            </td>
                          </tr>

                          {{--  <tr class="odd pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" ">121000039</td>
                            <td class=" ">May 28, 2014 11:30:12 PM</td>
                             <td class=" ">121000208</td>
                            <td class=" ">John Blank L</td>
                            <td class=" ">Paid</td>
                            <td class="a-right a-right ">$741.20</td> 
                            <td class=" last"><a href="#">View</a>
                            </td>
                          </tr>  --}}
                        @endforeach
                        </tbody>
                      </table>
                    </div>
							
						
                  </div>
                </div>

        </div>
        </div>
    </div>
@endsection
@push('scripts')
  @include('includes/dynamic-table-scripts')
@endpush 

