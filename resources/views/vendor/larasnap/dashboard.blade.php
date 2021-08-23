@extends('larasnap::layouts.app', ['class' => 'dashboard'])

@section('title','Dashboard')

@section('content')
<!-- Page Heading  Start-->
<div class="container">
   <div class="row admin">
        <div class="col-lg-3 col-sm-6">
            <div class="card-box bg-green"> 
                <div class="inner">
                    <h5> Active Stations </h5>
                    <h5>stationsActiveCount</h5>
                </div>
                <div class="icon">
                    <i class="fa fa-users" aria-hidden="true"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card-box bg-red">
                <div class="inner">
                    <h5> Inactive Stations </h5>
                </div>
                <div class="icon">
                    <i class="fa fa-users" aria-hidden="true"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Content End-->				  
@endsection
