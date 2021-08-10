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
                        <div class="col-4">
                           <div class="dropdown">
                              <div class="form-group">
                                 <select class="form-control" name="format" id="format">
                                       <option value="">Select</option>
                                       <option value="1" @if (old('format') == '1') selected="selected" @endif>Rock</option>
                                       <option value="2" @if (old('format') == '2') selected="selected" @endif>Country</option>
                                       <option value="3" @if (old('format') == '3') selected="selected" @endif>AC</option>
                                       <option value="4" @if (old('format') == '4') selected="selected" @endif>CHR</option>
                                       <option value="5" @if (old('format') == '5') selected="selected" @endif>News/Talk</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="col-4">
                           <div class="dropdown">
                              <div class="form-group">
                                 <select class="form-control" name="call_letters" id="call_letters">
                                       <option value="">Sort by call letters</option>
                                       <option value="1" @if (old('call_letters') == '1') selected="selected" @endif>Ascending</option>
                                       <option value="2" @if (old('call_letters') == '2') selected="selected" @endif>Descending</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <input type="text" name="search" placeholder="Search..." class="form-control" data-toggle="tooltip" data-placement="top" title="" >
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
                           <th>Logo</th>
                           <th>Call Letters</th>
                           <th>Frequency</th>
                           <th>Format</th>
                           <th>Streaming Player</th>
                           <th>Website</th>
                           <th>Phone</th>
                           <th>Email</th>
                           <th>Actions</th>
                        </tr>
                     </thead>
                     <tbody>
                        @forelse($stations as $station)
                        <tr>
                           <td>{{ $station->id }}</td>
                           <td>
                              <img src="{{asset('storage/images/'.$station->logo)}}" style="width:50px; height=50px;" />
                           </td>
                           <td>{{ $station->call_letters }}</td>
                           <td>{{ $station->frequency }}</td>
                           <td>
                              @if($station->format=='1')
                                 Rock
                              @elseif($station->format=='2')
                                 Country
                              @elseif($station->format=='3')
                                 AC
                              @elseif($station->format=='4')
                                 CHR
                              @elseif($station->format=='5')
                                 News/Talk
                              @endif
                           </td>
                           <td>{{ $station->streaming_player }}</td>
                           <td>{{ $station->website }}</td>
                           <td>{{ $station->phone }}</td>
                           <td>{{ $station->email }}</td>
                           <td>
							         <a href="{{ route('stations.edit', $station->id) }}" title="Edit Station"><button class="btn btn-primary btn-sm" type="button"><i aria-hidden="true" class="fa fa-pencil-square-o"></i></button></a>
                              <form action="{{ route('stations.destroy', $station->id) }}" method="POST">
                                 @csrf
                                 @method('DELETE')
                                 <button class="btn btn-danger btn-sm" type="submit"><i aria-hidden="true" class="fa fa-trash"></i></button>
                              </form>
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
@endsection