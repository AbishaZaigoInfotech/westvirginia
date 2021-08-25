@extends('larasnap::layouts.app', ['class' => 'auth-change'])
@section('title','Change Password')
@section('content')				  
<!-- Page Content Start-->				  
<div class="row">
   <div class="col-xl-12">
      <div class="card shadow mb-4">
         <div class="card-body">
            <div class="card-body">
               <form method="POST" action="{{ route('password.store') }}"  enctype="multipart/form-data" class="form-horizontal" autocomplete="off" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="old_password" class="control-label">Old Password<small class="text-danger required">*</small></label> 
                           <input name="old_password" type="password" id="old_password" class="form-control" value="{{ old('old_password') }}">
                           @error('old_password')
                           <span class="text-danger">{{ $message }}</span>
                           @enderror 							
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="password" class="control-label">New Password<small class="text-danger required">*</small></label> 
                           <input name="password" type="password" id="password" class="form-control" value="{{ old('password') }}">
                           @error('password')
                           <span class="text-danger">{{ $message }}</span>
                           @enderror 							
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="confirm_password" class="control-label">Confirm Password<small class="text-danger required">*</small></label> 
                           <input name="confirm_password" type="password" id="confirm_password" class="form-control" value="{{ old('confirm_password') }}">
                           @error('confirm_password')
                           <span class="text-danger">{{ $message }}</span>
                           @enderror 							
                        </div>
                     </div>
                     <div class="col-md-4">
                     </div>
                     <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                <input type="submit" value="Save" class="btn btn-primary">
                                </div>
                            </div>
                            <div class="col-md-4">
                            </div>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Page Content End-->				  
@endsection