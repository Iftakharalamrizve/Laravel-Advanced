@extends('layouts.backend.app')
@push('css')

@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-location-arrow"></i>
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
                            <a class="btn btn-primary" href="{{ route('admin.locations.index') }}">
                                <i class="fa fa-backward"></i>  Back </a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form class="row" method="post" action="{{ route('admin.locations.update',$location->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="col-md-3"></div>
                            <div class=" col-md-6 col-sm-12 col-lg-6 offset-md-3 offset-lg-3 form-group">
                                <label>Name *</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter Name" value="{{ $location->name }}">
                                @error('name')
                                <span class="invalid-feedback" role="alert"><strong style="color: red;font-size: 12px">{{ $message }}</strong></span>
                                @enderror
                                <br>
                                <button type="submit" class="btn btn-success ">Update</button>
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
