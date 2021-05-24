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
                             <a class="btn btn-primary" href="{{ route('admin.roles.index') }}">
                                 <i class="fa fa-backward"></i>  Back </a>
                         </div>
                     </div>
                     <div class="panel-body">
                         <div class="col-md-12">
                             <form method="POST" action="{{ route('admin.roles.store') }}" autocomplete="off">
                                 @csrf
                                 <div class="form-group row">
                                     <div class="col-md-3"></div>
                                     <div class="col-md-6">
                                         <label>Name*</label>
                                         <input id="name" type="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter name">
                                         @error('name')
                                         <span class="invalid-feedback" role="alert"><strong style="color: red;font-size: 12px">{{ $message }}</strong></span>
                                         @enderror
                                     </div>
                                 </div>
                                 <br><br>
                                 <div class="text-center">
                                     <strong class=""> Manage Permission </strong><hr>
                                 </div><br>
                                 <div class="form-row">
                                     <div class="mb-3 ml-4">
                                         <div class="custom-control custom-checkbox mb-5">
                                             <input type="checkbox" class="custom-control-input" id="select-all">
                                             <label for="select-all" class="custom-control-label">Select All Permission</label>
                                         </div>
                                     </div>
                                 </div>
                                 @forelse($permissions->chunk(3) as $key=>$chunks)
                                     <div class="form-row">
                                         @foreach($chunks as $key=>$module)
                                             <div class="col-lg-4">
                                                 <input name="permission[]" class="form-check-input" type="checkbox" id="inlineCheckbox1" value="{{$module->id}}">
                                                 <label class="custom-control-label">{{$module->name}}</label>
                                             </div>
                                         @endforeach
                                     </div>
                                 @empty
                                     <div class="text-center">
                                         <strong> No data found </strong>
                                     </div>
                                 @endforelse
                                 <div class="form-group row">
                                     <div class="col-sm-12">
                                         <br>
                                         <button type="submit" class="btn btn-success px-4 ">Save</button>
                                     </div>
                                 </div>
                             </form>
                         </div>
                         </div>
                     </div>
                 </div>
             </div>

         </section> <!-- /.content -->
@endsection

@push('js')
    <script>
        $('#select-all').click(function (event) {
            if(this.checked){
                $(':checkbox').each(function () {
                    this.checked=true;
                });
            }else{
                $(':checkbox').each(function () {
                    this.checked=false;
                });
            }
        })
    </script>
@endpush
