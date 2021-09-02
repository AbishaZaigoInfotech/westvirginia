@extends('larasnap::layouts.app', ['class' => 'promo-index'])
@section('title','Promo Management')
@section('content')
<!-- Page Heading  Start-->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800">Promos</h1>
</div>
<!-- Page Heading End-->				  
<!-- Page Content Start-->				  
<div class="row">
   <div class="col-xl-12">
      <div class="card shadow mb-4">
         <div class="card-body">
            <div class="card-body">
                    <div class="col-md-2 pad-0">
                        <a href="{{ route('promos.create') }}" title="Add New Promo" class="btn btn-primary btn-sm"><i aria-hidden="true" class="fa fa-plus"></i> Add New Promo
                        </a>
                    </div>
               <br> <br> 
               <form  method="POST" action="{{ route('promos.index') }}" id="list-form" class="form-inline my-2 my-lg-0" autocomplete="off">
                    @method('POST')
                    @csrf
               <div class="table-responsive">
                  <table class="table">
                     <thead>
                        <tr>
                           <th>ID</th>
                           <th>Promo Title</th>
                           <!-- <th>Promo Image</th> -->
                           <th>Status</th>
                           <th>Actions</th>
                        </tr>
                     </thead>
                     <tbody>
                     @php $s_no = $promos->firstItem(); @endphp
                        @forelse($promos as $promo)
                        <tr>
                           <td>{{ $s_no++ }}</td>
                           <td>{{ $promo->title }}</td>
                           <!-- <td>
                              <img src="{{asset('storage/images/'.$promo->image)}}" style="width:50px; height=50px;"></img>
                           </td> -->
                           <td>
                              @if($promo->status == 1)
                                 <span class="badge badge-success">Active</span>
                              @elseif($promo->status == 0)
                                 <span class="badge badge-danger">Inactive</span>
                              @endif
                           </td>
                           <td>
                              <div class="row" style="width:150px;">
                                 <div class="col-1">
                                 @canAccess('promos.show')
                                    <a href="{{ route('promos.show', $promo->id) }}" title="View Promo"><button class="btn btn-info btn-sm" type="button"><i aria-hidden="true" class="fa fa-eye"></i></button></a>
                                 @endcanAccess
                                 </div>
                                 <div class="col-1">
                                 </div>
                                 <div class="col-1">
                                 @canAccess('promos.edit')
                                    <a href="{{ route('promos.edit', $promo->id) }}" title="Edit Promo"><button class="btn btn-primary btn-sm" type="button"><i aria-hidden="true" class="fa fa-pencil-square-o"></i></button></a>
                                 @endcanAccess
                                 </div>
                                 <div class="col-1">
                                 </div>
                                 <div class="col-1">
                                 @canAccess('promos.destroy')
							            <a href="#" onclick="return individualDelete({{ $promo->id}})" title="Delete Promo"><button class="btn btn-danger btn-sm" type="button"><i aria-hidden="true" class="fa fa-trash"></i></button></a>
                                 @endcanAccess
                                 </div>
                              </div>
                           </td>
                        </tr>
                        @empty
                        <tr>
                           <td class="text-center" colspan="12">No Promos found!</td>
                        </tr>
                        @endforelse
                     </tbody>
                  </table>
                  <div class="pagination">
                  {{ $promos->links() }}
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