@extends('layouts.backend.app')
@push('css')

@endpush

@section('content')
    <!-- Content Wrapper. Contains page content -->
        <!-- Content Header (Page header) -->
    <section class="content-header">
        <form action="#" method="get" class="sidebar-form search-box pull-right hidden-md hidden-lg hidden-sm">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <div class="header-icon">
            <i class="fa fa-list"></i>
        </div>
        <div class="header-title">
            <h1> {{$pageTitle ? $pageTitle:''}} </h1>
            <small> {{$pageDes ? $pageDes:''}} </small>
            <ol class="breadcrumb hidden-xs">
                <li><a href="#"><i class="pe-7s-home"></i> Home</a></li>
                <li class="active">{{$pageTitle ? $pageTitle:''}}</li>
            </ol>
        </div>
    </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                            <div class="btn-group">
                                <a class="btn btn-success" href="{{route('admin.roles.create')}}"> <i class="fa fa-plus"></i>  Add New</a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="panel-header">
                                    <div class="col-sm-4">
                                        <div class="dataTables_length">
                                            <label>Display <select name="example_length">
                                                    <option value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select> records per page</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="dataTables_length">
                                            <a class="btn btn-default buttons-copy btn-sm" tabindex="0"><span>Copy</span></a>
                                            <a class="btn btn-default buttons-csv buttons-html5 btn-sm" tabindex="0"><span>CSV</span></a>
                                            <a class="btn btn-default buttons-excel buttons-html5 btn-sm" tabindex="0"><span>Excel</span></a>
                                            <a class="btn btn-default buttons-pdf buttons-html5 btn-sm" tabindex="0"><span>PDF</span></a>
                                            <a class="btn btn-default buttons-print btn-sm" tabindex="0"><span>Print</span></a>

                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="dataTables_length">
                                            <div class="input-group custom-search-form">
                                                <input type="search" class="form-control" placeholder="search..">
                                                <span class="input-group-btn">
                                                      <button class="btn btn-primary" type="button">
                                                          <span class="glyphicon glyphicon-search"></span>
                                                      </button>
                                                  </span>
                                            </div><!-- /input-group -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>Name</th>
                                        <th>Permission </th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($roles as $key=>$role)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$role->name}}</td>
                                            <td>
                                                @if(!empty($role->permission))
                                                    @foreach($role->permission as $v)
                                                        <label class="label label-success">{{ $v->name }}</label>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route('admin.roles.edit',$role->id)}}" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="left" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="right" title="Delete "
                                                        onclick="deleteData({{ $role->id }})">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                                <form id="delete-form-{{ $role->id }}"
                                                      action="{{ route('admin.roles.destroy',$role->id) }}" method="POST"
                                                      style="display: none;">
                                                    @csrf()
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="page-nation text-right">
                                <ul class="pagination pagination-large">
                                    <li class="disabled"><span>«</span></li>
                                    <li class="active"><span>1</span></li>
                                    <li><a href="#">2</a></li>
                                    <li class="disabled"><span>...</span></li><li>
                                    <li><a rel="next" href="#">Next</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> <!-- /.content -->
    </div> <!-- /.content-wrapper -->
@endsection

@push('js')

@endpush
