@extends('layouts.master')

@push('stylesheets')
@include('includes/dynamic-table-css')
@endpush


@section('main_container')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>School Teacher Projection<small></small></h3>
                </div>
                <div class="title_right">
                </div>
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        
                        
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr><td>Dzongkhag: 
                                    @if($user->role->id<=2)
                                    <select name="dzongkhags" id="dzongkhagslist" class="select2_single form-control" onchange="populateSchools()" >
                                        
                                        <option value="" selected disabled>Please select Dzongkhag</option>
                                        @foreach($dzongkhags as $d)
                                        <option value="{{$d->id}}">{{$d->name}}</option>
                                        @endforeach
                                    </select>
                                    @else
                                    <select name="dzongkhags" id="dzongkhagslist" class="select2_single form-control" disabled>
                                        
                                        <option value="{{$user->dzongkhag->id}}" selected>{{$user->dzongkhag->name}}</option>
                                        
                                        
                                    </select>
                                    @endif

                                </td>
                                    <td>School:
                                        @if($user->role->id==4)
                                        <select id="schoolslist" class="select2_single form-control" disabled><option value="{{$user->school->id}}">{{$user->school->name}}</option></select>
                                        @else
                                         <select id="schoolslist" class="select2_single form-control" ><option>Please select</option></select>
                                         @endif
                                    </td>
                                    <td>Year<select class="select2_single form-control" id="year">
                                        @foreach($year as $y)
                                        <option value="{{$y}}" selected>{{$y}}</option>
                                        @endforeach
                                    </select>
                                    </select></td>
                                    <td>Type: <select name="projection_type" class="select2_single form-control" id="type">
                                        @foreach($projection_type as $p)
                                     <option value="{{$p->id}}">{{$p->name}}</option>
                                     @endforeach
                                 </select>
                                <td> <br/><button onclick="getProjection()" class="btn btn-success">Get Projection</button></td>
                                </tr></thead>
                           

                            <tbody >
                           
                            </tbody>
                        </table>
                        <div id="projection"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')

@include('includes/school_from_dzongkhag')
@include('includes/projection_script')


@endpush

