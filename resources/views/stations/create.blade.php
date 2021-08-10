@extends('larasnap::layouts.app', ['class' => 'station-create'])
@section('title','Station Management')
@section('content')
<!-- Page Heading  Start-->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800">Add Station</h1>
</div>
<!-- Page Heading End-->				  
<!-- Page Content Start-->				  
<div class="row">
   <div class="col-xl-12">
      <div class="card shadow mb-4">
         <div class="card-body">
            <div class="card-body">
               <a href="{{ route('stations.index') }}" title="Back to Station List" class="btn btn-warning btn-sm"><i aria-hidden="true" class="fa fa-arrow-left"></i> Back to Station List
               </a> 
               <br> <br> 
               <form method="POST" action="{{ route('stations.store') }}"  enctype="multipart/form-data" class="form-horizontal" autocomplete="off" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="call_letters" class="control-label">Station Call Letters<small class="text-danger required">*</small></label> 
                           <input name="call_letters" type="text" id="call_letters" class="form-control" value="{{ old('call_letters') }}">
                           @error('call_letters')
                           <span class="text-danger">{{ $message }}</span>
                           @enderror 							
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="frequency" class="control-label">Station Frequency<small class="text-danger required">*</small></label> 
                           <input name="frequency" type="text" id="frequency" class="form-control" value="{{ old('frequency') }}">
                           @error('frequency')
                           <span class="text-danger">{{ $message }}</span>
                           @enderror 							
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="format" class="control-label">Station Format<small class="text-danger required">*</small></label> 
                           <select name="format" id="format" class="form-control">
                            <option value="">Select</option>
                            <option value="1" @if (old('format') == '1') selected="selected" @endif>Rock</option>
                            <option value="2" @if (old('format') == '2') selected="selected" @endif>Country</option>
                            <option value="3" @if (old('format') == '3') selected="selected" @endif>AC</option>
                            <option value="4" @if (old('format') == '4') selected="selected" @endif>CHR</option>
                            <option value="5" @if (old('format') == '5') selected="selected" @endif>News/Talk</option>
                           </select>
                           @error('format')
                           <span class="text-danger">{{ $message }}</span>
                           @enderror 							
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="streaming_player" class="control-label">Link to streaming player<small class="text-danger required">*</small></label> 
                           <input name="streaming_player" type="text" id="streaming_player" class="form-control" value="{{ old('streaming_player') }}">
                           @error('streaming_player')
                           <span class="text-danger">{{ $message }}</span>
                           @enderror 							
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="website" class="control-label">Link to station website<small class="text-danger required">*</small></label> 
                           <input name="website" type="text" id="website" class="form-control" value="{{ old('website') }}">
                           @error('website')
                           <span class="text-danger">{{ $message }}</span>
                           @enderror 							
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="phone" class="control-label">Station Phone<small class="text-danger required">*</small></label> 
                           <input name="phone" type="number" id="phone" class="form-control" value="{{ old('phone') }}">
                           @error('phone')
                           <span class="text-danger">{{ $message }}</span>
                           @enderror 							
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="email" class="control-label">Station Email Address<small class="text-danger required">*</small></label> 
                           <input name="email" type="email" id="email" class="form-control" value="{{ old('email') }}">
                           @error('email')
                           <span class="text-danger">{{ $message }}</span>
                           @enderror 							
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="logo" class="control-label">Station Logo<small class="text-danger required">*</small></label> 
                           <input name="logo" type="file" id="logo" class="form-control" value="{{ old('logo') }}">
                           @error('logo')
                           <span class="text-danger">{{ $message }}</span>
                           @enderror 							
                        </div>
                     </div>
                     <div class="col-md-4">
                     </div>
                     <div class="col-md-1">
                        <div class="form-group">
                           <input type="submit" value="Save" class="btn btn-primary">
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