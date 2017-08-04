@extends('layouts.master')

@push('stylesheets')
    <!-- Example -->
    <!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->
@endpush

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">


    	@can('add_teacher')

    	<h1>You have the right to add a teacher</h1>
    	@endcan
    </div>
    <!-- /page content -->

@endsection


