@extends('layouts.master')

@push('stylesheets')
@include('includes/dynamic-table-css')
@endpush


@section('main_container')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3><small></small></h3>
                </div>
                <div class="title_right">
                </div>
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    
                    <div class="x_content">
                
             
               
                  <div class="x_title">
                    <h2>User Profile </h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                         <i class="fa fa-user fa-5x"></i>
                        </div>
                      </div>
                      <h3>{{$user->name}}</h3>

                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-map-marker user-profile-icon"></i> 
                          @if(isset($user->school->name))
                          {{$user->school->name}} ,
                          @endif
                          
                          @if(isset($user->dzongkhag->name))
                          {{$user->dzongkhag->name}}
                          @else
                          HRD, Ministry of Education
                          @endif
                        </li>

                        <li>
                          <i class="fa fa-user user-profile-icon"></i> {{$user->role->name}}
                        </li>

                        <li class="m-top-xs">
                          <i class="fa fa-envelope user-profile-icon"></i>
                          <a href="mailto:{{$user->email}}" target="_blank">{{$user->email}}</a>
                        </li>
                      </ul>

                    

                    </div>
                
                  </div>
               
              
           
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

