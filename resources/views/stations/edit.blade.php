@extends('larasnap::layouts.app', ['class' => 'station-edit'])
@section('title','Station Management')
@section('content')
<!-- Page Heading  Start-->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800">Edit Station</h1>
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
               <form method="POST" action="{{ route('stations.update', $station->id) }}" class="form-horizontal" autocomplete="off" enctype="multipart/form-data">
			   @csrf
			   @method('PUT')
               <div class="row">
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="name" class="control-label">Station Name<small class="text-danger required">*</small></label> 
                           <input name="name" type="text" id="name" class="form-control" value="{{ old('name', $station->name) }}">
                           @error('name')
                           <span class="text-danger">{{ $message }}</span>
                           @enderror 							
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="call_letters" class="control-label">Station Call Letters<small class="text-danger required">*</small></label> 
                           <input name="call_letters" type="text" id="call_letters" class="form-control" value="{{ old('call_letters', $station->call_letters) }}">
                           @error('call_letters')
                           <span class="text-danger">{{ $message }}</span>
                           @enderror 							
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="frequency" class="control-label">Station Frequency<small class="text-danger required">*</small></label> 
                           <input name="frequency" type="text" id="frequency" class="form-control" value="{{ old('frequency', $station->frequency) }}">
                           @error('frequency')
                           <span class="text-danger">{{ $message }}</span>
                           @enderror 							
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="format" class="control-label">Station Format<small class="text-danger required">*</small></label> 
                           <select multiple="multiple" id="format" class="form-control format chosen" name="format[]">
                              @foreach($categories as $category)
                                 <option class="fcaps" value="{{ $category->id }}" 
                                    {{ (collect(old('format'))->contains($category->id)) ? 'selected' : ''}}
                                    @foreach($formats as $format){{ ($category->id==$format->category_id) ? 'selected' : ''}}@endforeach>
                                 {{ $category->label }}
                                 </option>   
                              @endforeach
                           </select>
                           @error('format')
                           <span class="text-danger">{{ $message }}</span>
                           @enderror 							
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="status" class="control-label">Status<small class="text-danger required">*</small></label> 
                           <select name="status" id="status" class="form-control">
                                 <option value="1" {{ $station->status == "1" ? 'selected' : '' }}>Active</option>
                                 <option value="0" {{ $station->status == "0" ? 'selected' : '' }}>Inactive</option>
                           </select>
                           @error('status')
                           <span class="text-danger">{{ $message }}</span>
                           @enderror 							
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="streaming_player" class="control-label">Link to streaming player<small class="text-danger required">*</small></label> 
                           <input name="streaming_player" type="text" id="streaming_player" class="form-control" value="{{ old('streaming_player', $station->streaming_player) }}">
                           @error('streaming_player')
                           <span class="text-danger">{{ $message }}</span>
                           @enderror 							
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="website" class="control-label">Link to station website<small class="text-danger required">*</small></label> 
                           <input name="website" type="text" id="website" class="form-control" value="{{ old('website', $station->website) }}">
                           @error('website')
                           <span class="text-danger">{{ $message }}</span>
                           @enderror 							
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="phone" class="control-label">Station Phone<small class="text-danger required">*</small></label> 
                           <input name="phone" type="tel" id="phone" class="form-control" value="{{ old('phone', $station->phone) }}">
                           @error('phone')
                           <span class="text-danger">{{ $message }}</span>
                           @enderror 							
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="email" class="control-label">Station Email Address<small class="text-danger required">*</small></label> 
                           <input name="email" type="email" id="email" class="form-control" value="{{ old('email', $station->email) }}">
                           @error('email')
                           <span class="text-danger">{{ $message }}</span>
                           @enderror 							
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="logo" class="control-label">Station Logo</label> 
                           <input name="logo" type="file" id="logo" class="form-control" value="{{ old('logo') }}">
                           <small class="text-danger">Allowed File Formats: jpg, png</small>
                           <br>
                           <?php $path = 'storage/images/'; ?>
                              <!-- <a href="{{ asset($path.$station->logo) }}" target="_blank">{{$station->logo}}</a>
                              <a href="{{URL::to('/delete/image/'. $station->id)}}">Delete</a> -->
                           @error('logo')
                           <span class="text-danger">{{ $message }}</span>
                           @enderror 							
                        </div>
                     </div>
                     <div class="col-md-4">
                     </div>
                     <div class="col-md-4">
                        <div class="form-group mt-4">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js" defer></script>	
<script>
   $(document).ready(function() {
      $("#format").select2();
   });
</script>				  
@endsection