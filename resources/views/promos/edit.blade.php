@extends('larasnap::layouts.app', ['class' => 'promo-edit'])
@section('title','Promo Management')
@section('content')
<!-- Page Heading  Start-->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800">Edit Promo</h1>
</div>
<!-- Page Heading End-->				  
<!-- Page Content Start-->				  
<div class="row">
   <div class="col-xl-12">
      <div class="card shadow mb-4">
         <div class="card-body">
            <div class="card-body">
               <a href="{{ route('promos.index') }}" title="Back to Promo List" class="btn btn-warning btn-sm"><i aria-hidden="true" class="fa fa-arrow-left"></i> Back to Promo List
               </a> 
               <br> <br> 
               <form method="POST" action="{{ route('promos.update', $promo->id) }}" class="form-horizontal" autocomplete="off" enctype="multipart/form-data">
			   @csrf
			   @method('PUT')
               <div class="row">
               <div class="col-md-4">
                        <div class="form-group">
                           <label for="title" class="control-label">Promo title<small class="text-danger required">*</small></label> 
                           <input name="title" type="text" id="title" class="form-control" value="{{ old('title', $promo->title) }}">
                           @error('title')
                           <span class="text-danger">{{ $message }}</span>
                           @enderror 							
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="status" class="control-label">Status<small class="text-danger required">*</small></label> 
                           <select name="status" id="status" class="form-control">
                                 <option value="1" {{ $promo->status == "1" ? 'selected' : '' }}>Active</option>
                                 <option value="0" {{ $promo->status == "0" ? 'selected' : '' }}>Inactive</option>
                           </select>
                           @error('status')
                           <span class="text-danger">{{ $message }}</span>
                           @enderror 							
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="image" class="control-label">Promo image</label> 
                           <input name="image" type="file" id="image" class="form-control" value="{{ old('image') }}">
                           <small class="text-danger">Allowed File Formats: jpg, png</small>
                           <br>
                           <?php $path = 'storage/images/'; ?>
                              <!-- <a href="{{ asset($path.$promo->image) }}" target="_blank">{{$promo->image}}</a> -->
                           @error('image')
                           <span class="text-danger">{{ $message }}</span>
                           @enderror 							
                        </div>
                     </div>
                     <div class="col-md-4">
                     </div>
                     <div class="col-md-1">
                        <div class="form-group">
                           <input type="submit" value="Update" class="btn btn-primary">
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