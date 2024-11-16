@extends('layouts.admindashboard')

@section('content')
<div class="page-content">

				<div class="row">
                   <div class="col-12 col-lg-12 d-flex">
                    
                      <div class="card radius-10 w-100">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<div>
									<h6 class="mb-0">Prospect Clients</h6>
								</div>
							</div>
						</div>
                        
						  <div class="card-body">
                         
                          <div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
									<td>#IDn</td>
										<td>Name</td>
										<td>Phone</td>
										<td>Email</td>
										<td>Company</td>
										<td>Address</td>
										<td>Date</td>
									</tr>
								</thead>
								<tbody>
								@foreach($prospects as $prospects)
									<tr>
										<td>{{$loop->iteration}}</td>
										<td>{{$prospects->name}}</td>
										<td>{{$prospects->phone}}</td>
										<td>{{$prospects->email}}</td>
										<td>{{$prospects->employer_name}}</td>
										<td>{{$prospects->address}}</td>
										<td>{{$prospects->created_at}}</td>
										
									</tr>
									@endforeach
									
									
								</tbody>
								<tfoot>
									<tr>
									<td>#IDn</td>
										<td>Name</td>
										<td>Phone</td>
										<td>Email</td>
										<td>Company</td>
										<td>Address</td>
										<td>Date</td>
									</tr>
								</tfoot>
							</table>
						</div>
						  </div>
					  </div>
				   </div>
				</div><!--end row-->
</div>
@endsection
