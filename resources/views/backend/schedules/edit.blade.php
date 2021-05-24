@extends('layouts.backend.app')
@push('css')

@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-clock-o"></i>
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
                        <form class="row" method="post" action="{{ route('admin.schedules.update',$schedule->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="col-sm-6 form-group">
                                <label>Institution Name *</label>
                                <input type="text" class="form-control @error('start_time') is-invalid @enderror" placeholder="Enter start time" name="start_time" value="{{ $schedule->start_time }}">
                                @error('start_time')
                                <span class="invalid-feedback" role="alert"><strong style="color: red;font-size: 12px">{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="col-sm-6 form-group">
                                <label>Discipline Name *</label>
                                <input type="text" class="form-control @error('end_time') is-invalid @enderror" name="end_time" placeholder="Enter end time" value="{{ $schedule->end_time}}">
                                @error('end_time')
                                <span class="invalid-feedback" role="alert"><strong style="color: red;font-size: 12px">{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="col-sm-12">
                                <button type="submit" href="#" class="btn btn-success">Update</button>
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
