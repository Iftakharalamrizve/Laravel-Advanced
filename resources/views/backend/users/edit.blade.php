@extends('layouts.backend.app')
@push('css')

@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
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
            <!-- Form controls -->
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="btn-group">
                            <a class="btn btn-primary" href="{{ route('admin.users.index') }}">
                                <i class="fa fa-backward"></i>  Back </a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form class="row col-sm-12" method="post" action="{{ route('admin.users.update',$user->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="col-sm-6 form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter Name" required="" value="{{ $user->name }}">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter Email Name" required="" value="{{ $user->email }}">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter Password " >
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control" name="confirm-password" placeholder="Enter Confirm Password ">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Role</label>
                                <select class="form-control" name="roles[]" >
                                    <option value="">Select Role</option>
                                    @foreach($role as $item)
                                        <option value="{{$item['id']}}" {{ $item['id'] == $user['id'] ? 'selected' : '' }}>{{$item['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-12">
                                <button type="submit"  class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </section> <!-- /.content -->
@endsection

@push('js')

@endpush
