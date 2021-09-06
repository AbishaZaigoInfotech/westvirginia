@extends('larasnap::layouts.app', ['class' => 'station-index'])
@section('title','Station Management')
@section('content')
<!-- Page Heading  Start-->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800">Stations</h1>
</div>
<!-- Page Heading End-->				  
<!-- Page Content Start-->				  
<div class="row">
   <div class="col-xl-12">
      <div class="card shadow mb-4">
         <div class="card-body">
            <div class="card-body">
                    <div class="col-md-2 pad-0">
                        <a href="{{ route('stations.create') }}" title="Add New Station" class="btn btn-primary btn-sm"><i aria-hidden="true" class="fa fa-plus"></i> Add New Station
                        </a>
                    </div>
               <br> <br> 
               <form>
                     <div class="row">
                        <div class="col-3">
                           <div class="dropdown">
                              <div class="form-group">
                                 <select name="format[]" id="format" class="form-control" multiple="multiple">
                                    @foreach($categories as $category)
                                    <option class="fcaps" value="{{ $category->id }}" 
                                    @foreach($formats as $format)
                                       @if(request('format') == $category->id) selected="selected" 
                                       @endif
                                    @endforeach>
                                    {{ $category->label }}
                                    </option>
                                       <!-- <option value="{{ $category->id }}" @if (request('format') == "$category->id") selected="selected" @endif>{{ $category->label }}</option> -->
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="col-3">
                           <div class="dropdown">
                              <div class="form-group">
                                 <select class="form-control" name="call_letters" id="call_letters">
                                       <option value="">Sort by call letters</option>
                                       <option value="asc" @if (request('call_letters') == 'asc') selected="selected" @endif>Ascending</option>
                                       <option value="desc" @if (request('call_letters') == 'desc') selected="selected" @endif>Descending</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="col-3">
                           <div class="dropdown">
                              <div class="form-group">
                                 <select class="form-control" name="status" id="status">
                                       <option value="">Sort by status</option>
                                       <option value="1" @if (request('status') == '1') selected="selected" @endif>Active</option>
                                       <option value="0" @if (request('status') == '0') selected="selected" @endif>Inactive</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <input type="text" name="search" placeholder="Search..." class="form-control" value="{{request('search')}}" data-toggle="tooltip" data-placement="top" title="Search by station name, call letters, frequency, phone, email">
                           </div>
                        </div>
                        <div class="col-0">
                            <div class="form-group">
                                <button class="btn btn-primary float-right" type="submit"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                     </div>
                  </form>
               <form  method="POST" action="{{ route('stations.index') }}" id="list-form" class="form-inline my-2 my-lg-0" autocomplete="off">
                    @method('POST')
                    @csrf
               <div class="table-responsive">
                  <table class="table">
                     <thead>
                        <tr>
                           <th>ID</th>
                           <th>Name</th>
                           <!-- <th>Logo</th> -->
                           <th>Call Letters</th>
                           <th>Frequency</th>
                           <th>Format</th>
                           <!-- <th>Streaming Player</th>
                           <th>Website</th> -->
                           <th>Phone</th>
                           <th>Email</th>
                           <th>Status</th>
                           <th>Actions</th>
                        </tr>
                     </thead>
                     <tbody>
                     @php $s_no = $stations->firstItem(); @endphp
                        @forelse($stations as $station)
                        <tr>
                           <td>{{ $s_no++ }}</td>
                           <td>{{ $station->name }}</td>
                           <!-- <td>
                              <img src="{{asset('storage/images/'.$station->logo)}}" style="width:50px; height=50px;"></img>
                           </td> -->
                           <td>{{ $station->call_letters }}</td>
                           <td>{{ $station->frequency }}</td>
                           <td>
                           @foreach($formats as $format)
                              @if($station->id == $format->station_id)
                                 @foreach($categories as $category)
                                    @if($category->id == $format->category_id)
                                       {{$category->label}}<br>
                                    @endif
                                 @endforeach
                              @endif
                           @endforeach
                        </td>
                           <!-- <td><a href="{{ $station->streaming_player }}" target="_blank">{{ $station->streaming_player }}</a></td>
                           <td><a href="{{ $station->website }}" target="_blank">{{ $station->website }}</a></td> -->
                           <td>{{ $station->phone }}</td>
                           <td>{{ $station->email }}</td>
                           <td>
                           @if($station->status == 1)
                              <span class="badge badge-success">Active</span>
                           @elseif($station->status == 0)
                              <span class="badge badge-danger">Inactive</span>
                           @endif
                           </td>
                           <td>
                              <div class="row" style="width:150px;">
                                 <div class="col-1">
                                 @canAccess('stations.show')
                                    <a href="{{ route('stations.show', $station->id) }}" title="View Station"><button class="btn btn-info btn-sm" type="button"><i aria-hidden="true" class="fa fa-eye"></i></button></a>
                                 @endcanAccess
                                 </div>
                                 <div class="col-1">
                                 </div>
                                 <div class="col-1">
                                 @canAccess('stations.edit')
                                    <a href="{{ route('stations.edit', $station->id) }}" title="Edit Station"><button class="btn btn-primary btn-sm" type="button"><i aria-hidden="true" class="fa fa-pencil-square-o"></i></button></a>
                                 @endcanAccess
                                 </div>
                                 <div class="col-1">
                                 </div>
                                 <div class="col-1">
                                 @canAccess('stations.destroy')
							            <a href="#" onclick="return individualDelete({{ $station->id}})" title="Delete Station"><button class="btn btn-danger btn-sm" type="button"><i aria-hidden="true" class="fa fa-trash"></i></button></a>
                                 @endcanAccess
                                 </div>
                              </div>
                           </td>
                        </tr>
                        @empty
                        <tr>
                           <td class="text-center" colspan="12">No Station found!</td>
                        </tr>
                        @endforelse
                     </tbody>
                  </table>
                  <div class="pagination">
                  {{ $stations->links() }}
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