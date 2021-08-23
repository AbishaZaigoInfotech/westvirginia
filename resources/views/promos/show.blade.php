@extends('larasnap::layouts.app', ['class' => 'promo-index'])
@section('title','Promo Management')
@section('content')
<!-- Page Heading  Start-->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800">Promo Details - {{ucfirst($promo->title)}}</h1>
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
                <div class="container" style="margin-top:20px;">
                    <div class="row">
                        <div class="col-3 font-weight-bold">
                            <h5>PROMO INFORMATION</h5>
                        </div>
                        <div class="col-9">
                        </div>
                        <div class="col-3 mt-2">
                            <img src="{{asset('storage/images/'.$promo->image)}}" width="100px" height="100px"/>
                        </div>
                        <div class="col-9 mt-2">
                        </div>
                        <div class="col-3 mt-2" style="margin-top:5px;">
                            <?php $path = 'storage/images/'; ?>
                            <a href="{{ asset($path.$promo->image) }}" target="_blank">View</a>
                        </div>
                        <div class="col-9 mt-2">
                        </div>
                        <div class="col-3 font-weight-bold mt-2">
                            Promo title
                        </div>
                        <div class="col-9 mt-2">
                            {{ucfirst($promo->title)}}
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