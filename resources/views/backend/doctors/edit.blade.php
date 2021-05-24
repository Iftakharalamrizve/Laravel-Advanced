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
                            <a class="btn btn-primary" href="{{ route('admin.doctors.index') }}">
                                <i class="fa fa-backward"></i>  Back </a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form class="row" method="post" action="{{ route('admin.doctors.update',$doctor->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="col-sm-6 form-group">
                                <label>Name *</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter name" value="{{ old('name') }}">
                                @error('name')
                                <span class="invalid-feedback" role="alert"><strong style="color: red;font-size: 12px">{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="col-sm-6 form-group">
                                <label>Qualification *</label>
                                <input type="text" class="form-control @error('qualification') is-invalid @enderror" placeholder="Enter qualification" value="{{ old('qualification') }}">
                                @error('qualification')
                                <span class="invalid-feedback" role="alert"><strong style="color: red;font-size: 12px">{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="col-sm-6 form-group">
                                <label>Department *</label>
                                <select class="form-control" id="exampleSelect1" name="select" size="1">
                                    <option selected="">Select Department</option>
                                    <option>Gynaecology</option>
                                    <option>Microbiology</option>
                                    <option>Pharmacy</option>
                                    <option>Neonatal</option>
                                </select>
                            </div>

                            <div class="col-sm-6 form-group">
                                <label>Location *</label>
                                <select class="form-control" id="exampleSelect1" name="select" size="1">
                                    <option selected="">Select Location</option>
                                    <option>Gynaecology</option>
                                    <option>Microbiology</option>
                                    <option>Pharmacy</option>
                                    <option>Neonatal</option>
                                </select>
                            </div>

                            <div class="col-sm-6 form-group">
                                <label>Fees *</label>
                                <input type="text" class="form-control @error('fees') is-invalid @enderror" placeholder="Enter Fees" value="{{ old('fees') }}">
                                @error('fees')
                                <span class="invalid-feedback" role="alert"><strong style="color: red;font-size: 12px">{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="col-sm-6 form-group">
                                <label>Date of Birth</label>
                                <input name="birth_date" class="datepicker form-control hasDatepicker @error('birth_date') is-invalid @enderror" type="date" placeholder="Date of Birth" value="{{ old('birth_date') }}">
                                @error('birth_date')
                                <span class="invalid-feedback" role="alert"><strong style="color: red;font-size: 12px">{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="col-sm-6 form-group">
                                <label>Blood group</label>
                                <select class="form-control @error('blood_group') is-invalid @enderror" id="exampleSelect" name="blood_group">
                                    <option selected>Select Blood group</option>
                                    <option value="A+">A+</option>
                                    <option value="AB+">AB+</option>
                                    <option value="O+">O+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="B+">B+</option>
                                    <option value="A-">A-</option>
                                    <option value="B-">B-</option>
                                    <option value="O-">O-</option>
                                </select>
                            </div>

                            <div class="col-sm-6 form-group">
                                <label>Sex *</label><br>
                                <select class="form-control @error('sex') is-invalid @enderror" id="exampleSelectsex" name="sex">
                                    <option selected>Select Sex</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>

                            <div class="col-sm-6 form-group">
                                <label>Available Emergency Support *</label><br>
                                <select class="form-control @error('is_emergency_support') is-invalid @enderror" id="exampleSelectsex" name="is_emergency_support">
                                    <option selected>Select Available For Emergency Support</option>
                                    <option value="YES">YES</option>
                                    <option value="NO">NO</option>
                                </select>
                            </div>

                            <div class="col-sm-6 form-group">
                                <label>Featured</label><br>
                                <select class="form-control @error('is_featured') is-invalid @enderror" id="exampleSelectsex" name="is_featured">
                                    <option selected>Select Featured *</option>
                                    <option value="YES">YES</option>
                                    <option value="NO">NO</option>
                                </select>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Status</label><br>
                                <select class="form-control @error('is_active') is-invalid @enderror" id="exampleSelectsex" name="is_active">
                                    <option selected>Select Status</option>
                                    <option value="YES">YES</option>
                                    <option value="NO">NO</option>
                                </select>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Band</label><br>
                                <select class="form-control @error('is_band') is-invalid @enderror" id="exampleSelectsex" name="is_band">
                                    <option selected>Select Band</option>
                                    <option value="YES">YES</option>
                                    <option value="NO">NO</option>
                                </select>
                            </div>

                            <div class="col-sm-12 form-group">
                                <label>Short Biography</label>
                                <textarea id="some-textarea" class="form-control" rows="3" placeholder="Enter text ..."></textarea>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Picture upload</label>
                                <input type="file" id="files" class="form-control" name="image" />
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

                            // Old code here
                            /*$("<img></img>", {
                              class: "imageThumb",
                              src: e.target.result,
                              title: file.name + " | Click to remove"
                            }).insertAfter("#files").click(function(){$(this).remove();});*/

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
