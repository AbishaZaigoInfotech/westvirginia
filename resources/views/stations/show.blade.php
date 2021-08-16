@extends('larasnap::layouts.app', ['class' => 'station-index'])
@section('title','Station Management')
@section('content')
<!-- Page Heading  Start-->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800">{{ucfirst($station->call_letters)}}</h1>
</div>
<!-- Page Heading End-->	
<!-- Page Content Start-->	
    <img src="{{asset('storage/images/'.$station->logo)}}" width="100px" height="100px"/>
    <div class="container" style="margin-top:20px;">
        <div class="row">
            <div class="col-3">
                Frequency:
            </div>
            <div class="col-3">
                {{$station->frequency}}
            </div>
            <div class="col-6">
            </div>
            <div class="col-3">
                Format:
            </div>
            <div class="col-3">
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
            <div class="col-6">
            </div>
            <div class="col-3">
                Play:
            </div>
            <div class="col-3">
                <a href="{{ $station->streaming_player }}" target="_blank">{{ $station->streaming_player }}</a>
            </div>
            <div class="col-6">
            </div>
            <div class="col-3">
                Website:
            </div>
            <div class="col-3">
                <a href="{{ $station->website }}" target="_blank">{{ $station->website }}</a>
            </div>
            <div class="col-6">
            </div>
            <div class="col-3">
                Phone:
            </div>
            <div class="col-3">
                {{ $station->phone }}
            </div>
            <div class="col-6">
            </div>
            <div class="col-3">
                Email:
            </div>
            <div class="col-3">
                {{ $station->email }}
            </div>
            <div class="col-6">
            </div>
        </div>
    </div>
<!-- Page Content End-->		
@endsection