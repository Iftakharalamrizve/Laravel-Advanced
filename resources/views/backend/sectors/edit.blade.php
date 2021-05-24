@extends('layouts.backend.app')
@push('css')
    <style>
        input[type="file"] {
            display: block;
        }
        .imageThumb {
            max-height: 75px;
            border: 2px solid;
            padding: 1px;
            cursor: pointer;
        }
        .pip {
            display: inline-block;
            margin: 10px 10px 0 0;
        }
        .remove {
            display: block;
            background: #444;
            color: white;
            text-align: center;
            cursor: pointer;
        }
        .remove:hover {
            background: white;
            color: black;
        }
    </style>
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="fa fa-server"></i>
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
                            <a class="btn btn-primary" href="{{ route('admin.sectors.index') }}">
                                <i class="fa fa-backward"></i>  Back </a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form class="row" method="post" action="{{ route('admin.sectors.update',$sector->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-sm-6 col-md-6 form-group">
                                <label>Name *</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter Name" value="{{$sector->name}}">
                                @error('name')
                                <span class="invalid-feedback" role="alert"><strong style="color: red;font-size: 12px">{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="col-sm-4 form-group">
                                <label>Picture upload</label>
                                <input type="file" id="files" class="form-control" id="image" name="image"><span class="mandatory">Max size: 2MB </span>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="image">Previous Photo</label>
                                <div class="">
                                    <div class="image">
                                        <img src="{{url('/')}}/backend/image/sector/{{ $sector->image }}" width="100" alt="sector" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section> <!-- /.content -->
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            if (window.File && window.FileList && window.FileReader) {
                $("#files").on("change", function(e) {
                    var files = e.target.files,
                        filesLength = files.length;
                    for (var i = 0; i < filesLength; i++) {
                        var f = files[i]
                        var fileReader = new FileReader();
                        fileReader.onload = (function(e) {
                            var file = e.target;
                            $("<span class=\"pip\">" +
                                "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                                "<br/><span class=\"remove\"><i class=\"fa fa-times\" aria-hidden=\"true\"></i></span>" +
                                "</span>").insertAfter("#files");
                            $(".remove").click(function(){
                                $(this).parent(".pip").remove();
                            });
                        });
                        fileReader.readAsDataURL(f);
                    }
                });
            } else {
                alert("Your browser doesn't support to File API")
            }
        });
    </script>
@endpush
