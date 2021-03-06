@extends('larasnap::layouts.app', ['class' => 'category-create'])
@section('title','Category Management')
@section('content')
<!-- Page Heading  Start-->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800">Add Category - {{ $parentCategoryLabel }}</h1>
</div>
<!-- Page Heading End-->				  
<!-- Page Content Start-->				  
<div class="row">
   <div class="col-xl-12">
      <div class="card shadow mb-4">
         <div class="card-body">
            <div class="card-body">
               <a href="{{ route('categories.index', $parentCategoryID) }}" title="Back to Category List" class="btn btn-warning btn-sm"><i aria-hidden="true" class="fa fa-arrow-left"></i> Back to Category List
               </a> 
               <br> <br> 
               <form method="POST" action="{{ route('categories.store', $parentCategoryID) }}"  class="form-horizontal" autocomplete="off">
                  @csrf
                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                           <label for="name" class="control-label">Name(Slug)<small class="text-danger required">*</small></label> 
                           <input name="name" type="text" id="name" class="form-control lower-case" value="{{ old('name') }}">
                           @error('name')
                           <span class="text-danger">{{ $message }}</span>
                           @enderror 							
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                           <label for="label" class="control-label">Label<small class="text-danger required">*</small></label> 
                           <input name="label" type="text" id="label" class="form-control" value="{{ old('label') }}">
                           @error('label')
                           <span class="text-danger">{{ $message }}</span>
                           @enderror 							
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                           <label for="description" class="control-label">Description<small class="text-danger required">*</small></label> 
                           <input name="description" type="text" id="description" class="form-control" value="{{ old('description') }}">
                           @error('description')
                           <span class="text-danger">{{ $message }}</span>
                           @enderror 							
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                            <label for="label" class="control-label">Parent Category<small class="text-danger required">*</small></label></br>
                            <label class="radio-inline">
                                <input type="radio" name="is_parent" value="1">Yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="is_parent" value="0" checked>No
                            </label>
                            <br>
                            <small>(Selecting YES will provide you option for mapping other categories to this category.)</small><br>
                           @error('is_parent')
                           <span class="text-danger">{{ $message }}</span>
                           @enderror 							
                        </div>
                     </div>
                     <input type="hidden" name="position" value={{ $categoryPosition }}>
                     @error('position')
                           <span class="text-danger">{{ $message }}</span>
                     @enderror 
                     </div>
                     <div class="row">
                     <div class="col-md-6">
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