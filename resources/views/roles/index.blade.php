@extends('layouts.master')

@push('stylesheets')
@include('includes/dynamic-table-css')
@endpush


@section('main_container')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Role Management<small></small></h3>
                </div>
                <div class="title_right">
                </div>
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <div class="nav navbar-left add-button">
                            <a href="{{url('/roles/create')}}" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Add Role</a>
                        </div>
                       
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                            <thead>
                            <tr>
                                <th>Role ID</th>
                                <th>Role Name</th>
                                <th>Role Label</th>
                                
                                <th class="column-title no-link last"><span class="nobr">Action</span>
                                </th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{$role->id}}</td>
                                    <td>{{$role->name}}</td>
                                    <td>{{$role->label}}</td>
                                  
                                    <td class=" last">
                                        
                                         <a href="{{url('/')}}/roles/view/{{$role->id}}" class="btn btn-xs btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="left" title="View role"><i class="fa fa-pencil-square fa-lg" aria-hidden="true"></i> View</a>

                                        <a href="{{url('/')}}/roles/edit/{{$role->id}}" class="btn btn-xs btn-warning waves-effect waves-light" data-toggle="tooltip" data-placement="left" title="Edit role"><i class="fa fa-pencil-square fa-lg" aria-hidden="true"></i> Edit</a>
                                       
                                        
                                       

                                                <!--<div class="modal fade bs-example-modal-sm" id="modal-delete-{{ $role->id }}" tabIndex="-1" aria-hidden="true" role="dialog">  
                                                    <div class="modal-dialog modal-sm">
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Confirm Delete</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure you want to delete the role?</p>
                                                        </div>
                                                        <div class="modal-footer">

                                                                <form action="{{url('/')}}/roles/{{$role->id}}/delete" method="post">
                                                                 {{ csrf_field() }}
                                                                 {{ method_field('DELETE')}}
                                                                 <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                                    <Button class="btn btn-xs btn-danger waves-effect waves-light" data-toggle="tooltip" type="submit"><i class="fa fa-trash fa-lg"></i> Delete</Button>
                                                                </form>
                                                        </div>
                                                      </div>
                                                  </div>
                                       </div>!-->
                                            <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" >
                                            <div class="modal-dialog modal-sm">
                                              <div class="modal-content">

                                                <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                                  </button>
                                                  <h4 class="modal-title" id="myModalLabel2">Modal title</h4>
                                                </div>
                                                <div class="modal-body">
                                                  <h4>Text in a modal</h4>
                                                  <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                                                  <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                  <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>

                                              </div>
                                            </div>
                                         </div>
                                       
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

