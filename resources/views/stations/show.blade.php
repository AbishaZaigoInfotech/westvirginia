@extends('larasnap::layouts.app', ['class' => 'station-index'])
@section('title','Station Management')
@section('content')
<!-- Page Heading  Start-->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800">Station Details - {{ucfirst($station->call_letters)}} ({{$station->status == 1 ? 'Active' : 'Inactive'}})</h1>
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
                <div class="container" style="margin-top:20px;">
                    <div class="row">
                        <div class="col-3 font-weight-bold">
                            <h5>STATION INFORMATION</h5>
                        </div>
                        <div class="col-9">
                        </div>
                        <div class="col-3 font-weight-bold mt-2">
                            Call Letters
                        </div>
                        <div class="col-9 mt-2">
                            {{ucfirst($station->call_letters)}}
                        </div>
                        <div class="col-3 font-weight-bold mt-2">
                            Frequency
                        </div>
                        <div class="col-9 mt-2">
                            {{ucfirst($station->frequency)}}
                        </div>
                        <div class="col-3 font-weight-bold mt-2">
                            Format
                        </div>
                        <div class="col-9 mt-2">
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
                        </div>
                        <div class="col-3 font-weight-bold mt-2">
                            Play
                        </div>
                        <div class="col-9 mt-2">
                            <a href="{{ $station->streaming_player }}" target="_blank">{{ $station->streaming_player }}</a>
                        </div>
                        <div class="col-3 font-weight-bold mt-2">
                            Website
                        </div>
                        <div class="col-9 mt-2">
                            <a href="{{ $station->website }}" target="_blank">{{ $station->website }}</a>
                        </div>
                        <div class="col-3 font-weight-bold mt-2">
                            Phone
                        </div>
                        <div class="col-9 mt-2">
                            {{ $station->phone }}
                        </div>
                        <div class="col-3 font-weight-bold mt-2">
                            Email
                        </div>
                        <div class="col-9 mt-2">
                            {{ $station->email }}
                        </div>
                        <div class="col-3 font-weight-bold mt-2">
                            
                        </div>
                        <div class="col-9 mt-2">
                        </div>
                        <div class="col-3 mt-2">
                            <img src="{{asset('storage/images/'.$station->logo)}}" width="100px" height="100px"/>
                        </div>
                        <div class="col-9 mt-2">
                        </div>
                        <div class="col-3 mt-2" style="margin-top:5px;">
                            <?php $path = 'storage/images/'; ?>
                            <a href="{{ asset($path.$station->logo) }}" target="_blank">View</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Page Content End-->		
@endsection