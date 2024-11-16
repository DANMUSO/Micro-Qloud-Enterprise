@extends('layouts.admindashboard')

@section('content')
<div class="page-content">

				<div class="row">
                   <div class="col-12 col-lg-12 d-flex">
                    
                      <div class="card radius-10 w-100">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<div>
									<h6 class="mb-0">Disbursement</h6>
								</div>
							</div>
						</div>
                        
						  <div class="card-body">
                            
						  <div class="row row-cols-1 row-cols-md-3 row-cols-xl-3 g-0 row-group text-center border-top">
							<div class="col">
							  <div class="p-3">
							  @foreach($transactions as $loanrequest)
									
									@endforeach
								<h5 class="mb-0"> 

								<p> <button class="btn btn-primary">KES {{ $transactions->sum('amount') }}</button>
									 </p>
								</h5>
								<small class="mb-0">Amount Disbursed <span> <i class="bx bx-up-arrow-alt align-middle"></i> 2.43%</span></small>
							  </div>
							</div>
							<div class="col">
							  <div class="p-3">
								<h5 class="mb-0">
								<button class="btn btn-primary">KES {{ $transactions->sum('amount')*0.3 }}</button>
								 </h5>
								<small class="mb-0">Estimated Profit <span> <i class="bx bx-up-arrow-alt align-middle"></i> 12.65%</span></small>
							  </div>
							</div>
							<div class="col">
							  <div class="p-3">
								<h5 class="mb-0">
								<button class="btn btn-primary">KES {{ $transactions->sum('amount') + $transactions->sum('amount')*0.3 }} </button>
								</h5>
								<small class="mb-0">Total Amount<span> <i class="bx bx-up-arrow-alt align-middle"></i> 5.62%</span></small>
							  </div>
							</div>
						  </div>
                          <div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
							<thead>
									<tr>
										<th>#ID</th>
										<th>Staff Name</th>
										<th>Staff Phone Number</th>
										<th>Amount</th>
										<th>Due Date</th>
										<th>Comapny</th>
										<th>Borrowed Date</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									@foreach($transactions as $loanrequest)
									<tr>
										<td>{{$loop->iteration}}</td>
										<td>{{$loanrequest->employee['name']}}</td>
										<td>{{$loanrequest->employee['phone_no']}}</td>
										<td>{{$loanrequest->amount}}</td>
										<td>{{$loanrequest->payroll_date}}</td>
										
										<td>{{$loanrequest->created_at}}</td>
										<td>{{$loanrequest->employee->company['company_name']}}</td>
										<td>
											<div class="btn-group" role="group" aria-label="Basic example">
												<button type="button" class="btn btn-outline-danger">Unpaid</button>
												
											</div>
										</td>
									</tr>
									@endforeach
									
									
								</tbody>
								<tfoot>
									<tr>
									<th>#ID</th>
										<th>Staff Name</th>
										<th>Staff Phone Number</th>
										<th>Amount</th>
										<th>Due Date</th>
										<th>Comapny</th>
										<th>Borrowed Date</th>
										<th>Status</th>
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
