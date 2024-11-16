@extends('layouts.app')

@section('content')
<div class="page-content">

				<div class="row">
                   <div class="col-12 col-lg-12 d-flex">
                    
                      <div class="card radius-10 w-100">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<div>
									<h6 class="mb-0">Transactions</h6>
								</div>
							</div>
						</div>
                        
						  <div class="card-body">
                            
                          <div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>Transaction ID</th>
										<th>Total Amount</th>
										<th>Status</th>
										<th>Due Date</th>
									</tr>
								</thead>
								<tbody>
								@foreach ($transactions as $transaction)
									<tr>
										<td>{{ $loop->iteration }}</td>
										<td>KES {{ $transaction->amount +  $transaction->amount *0.3 }}</td>
										<td> <!--status 0 pending, 1 proceed, 2 paid-->
												@if ($transaction->status == 0)
													<span class="badge bg-warning">Pending</span>
												@elseif ($transaction->status == 2)
													<span class="badge bg-primary">Approved</span>
												@elseif ($transaction->status == 3)
													<span class="badge bg-danger">Declined</span>
											
												@elseif ($transaction->status == 4)
													<span class="badge bg-success">Paid</span>
												@endif	
									 </td>
										<td>{{ $transaction->created_at }}</td>
									</tr>
								@endforeach
									
								</tbody>
								<tfoot>
									<tr>
                                    <th>Transaction ID</th>
										<th>Total Amount</th>
										<th>Status</th>
										<th>Due Date</th>
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
