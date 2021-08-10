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
				<form  method="POST" action="{{ route('stations.index') }}" id="list-form" class="form-inline my-2 my-lg-0" autocomplete="off">
                    @method('POST')
                    @csrf
                    <div class="col-md-2 pad-0">
                                <a href="{{ route('stations.create') }}" title="Add New Station" class="btn btn-primary btn-sm"><i aria-hidden="true" class="fa fa-plus"></i> Add New Station
                                </a>
                    </div>
               <br> <br> 
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
                        @foreach($stations as $station)
                        <tr>
                           <td>{{ $station->id }}</td>
                           <td>{{ $station->logo }}</td>
                           <td>{{ $station->call_letters }}</td>
                           <td>{{ $station->frequency }}</td>
                           <td>{{ $station->format }}</td>
                           <td>{{ $station->streaming_player }}</td>
                           <td>{{ $station->website }}</td>
                           <td>{{ $station->phone }}</td>
                           <td>{{ $station->email }}</td>
                           <td>
							         <a href="{{ route('stations.edit', $station->id) }}" title="Edit Station"><button class="btn btn-primary btn-sm" type="button"><i aria-hidden="true" class="fa fa-pencil-square-o"></i></button></a>
                               <a href="#" onclick="return individualDelete({{ $station->id }})" title="Delete Station"><button class="btn btn-danger btn-sm" type="button"><i aria-hidden="true" class="fa fa-trash"></i></button></a>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
                  <div class="pagination">
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