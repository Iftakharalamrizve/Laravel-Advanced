@extends('layouts.backend.app')
@push('css')

@endpush

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-user-md"></i>
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
                            <a class="btn btn-primary" href="{{ route('admin.schedules.index') }}">
                                <i class="fa fa-backward"></i>  Back </a>
                        </div>
                    </div>

                    <div class="panel-body">
                        <form class="col-sm-12" method="post" action="{{ route('admin.schedules.store') }}">
                            @csrf
                            <div class="col-sm-6 form-group">
                                <label>Start Time *</label>
                                <input type="text" class="form-control @error('start_time') is-invalid @enderror" placeholder="Enter Start time" name="start_time" value="{{ old('start_time') }}">
                                @error('start_time')
                                <span class="invalid-feedback" role="alert"><strong style="color: red;font-size: 12px">{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="col-sm-6 form-group">
                                <label>End Time *</label>
                                <input type="text" class="form-control @error('end_time') is-invalid @enderror" name="end_time" placeholder="Enter End time" value="{{ old('end_time') }}">
                                @error('end_time')
                                <span class="invalid-feedback" role="alert"><strong style="color: red;font-size: 12px">{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="col-sm-12">
                                <button type="submit" href="#" class="btn btn-success">Save</button>
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
