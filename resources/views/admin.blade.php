@extends('layouts.admindashboard')
@section('content')
<div class="page-content">
				<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
                   <div class="col">
					 <div class="card radius-10 border-start border-0 border-4 border-info">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
								@php
									// Check if the 'transactions' session data exists
									$totalAmount = 0;
									if (Session::has('disbursement')) {
										// Convert the Eloquent collection to an array
										$disbursement = Session::get('disbursement')->toArray();
										// Sum up the 'amount' values
										$totalAmount = array_sum(array_column($disbursement, 'amount'));
									}
								@endphp
									<p class="mb-0 text-secondary">Total Disbursed Amount</p>
									<h5 class="my-1 text-info">KES  {{ number_format($totalAmount, 2) }}</h5>
									<p class="mb-0 font-13">+2.5% from last week</p>
								</div>
							</div>
						</div>
					 </div>
				   </div>
				   <div class="col">
					<div class="card radius-10 border-start border-0 border-4 border-danger">
					   <div class="card-body">
						   <div class="d-flex align-items-center">
							   <div>
								   <p class="mb-0 text-secondary">Total Paid Amount</p>
								   @php
									// Check if the 'paid' session data exists
									$totalAmountpaid = 0;
									$totalprofit = 0;
									if (Session::has('paid')) {
										// Convert the Eloquent collection to an array
										$paid = Session::get('paid')->toArray();
										// Sum up the 'amount' values
										$totalAmountpaid = array_sum(array_column($paid, 'amount'));
										$totalprofit = array_sum(array_column($paid, 'profit'));
									}
								@endphp
								   <h5 class="my-1 text-danger">KES {{ number_format($totalAmountpaid, 2)}}</h5>
								   <p class="mb-0 font-13">+5.4% from last week</p>
							   </div>
						   </div>
					   </div>
					</div>
				  </div>
				  <div class="col">
					<div class="card radius-10 border-start border-0 border-4 border-success">
					   <div class="card-body">
						   <div class="d-flex align-items-center">
							   <div>
								   <p class="mb-0 text-secondary">Total Income</p>
								   <h5 class="my-1 text-success">KES {{ number_format($totalprofit, 2)}} </h5>
								   <p class="mb-0 font-13">+4.5% from last week</p>
							   </div>
						   </div>
					   </div>
					</div>
				  </div>
				  <div class="col">
					<div class="card radius-10 border-start border-0 border-4 border-dark">
					   <div class="card-body">
						   <div class="d-flex align-items-center">
							   <div>
							   @php
									// Check if the 'paid' session data exists
									$totalolb = 0;
									$totalprofitolb = 0;
									if (Session::has('olb')) {
										// Convert the Eloquent collection to an array
										$olb = Session::get('olb')->toArray();
										// Sum up the 'amount' values
										$totalolb = array_sum(array_column($olb, 'amount'));
										$totalprofitolb = array_sum(array_column($olb, 'profit'));
									}
								@endphp
								   <p class="mb-0 text-secondary">Out Standing Balance</p>
								   <h5 class="my-1 text-dark">KES  {{ number_format($totalolb + $totalprofitolb, 2)}} </h5>
								   <p class="mb-0 font-13">+8.4% from last week</p>
							   </div>
						   </div>
					   </div>
					</div>
				  </div>
				  <div class="col">
					<div class="card radius-10 border-start border-0 border-4 border-primary">
					   <div class="card-body">
						   <div class="d-flex align-items-center">
							   <div>
								   <p class="mb-0 text-secondary">Total Acive Clients</p>
								   <h5 class="my-1 text-primary">100</h5>
								   <p class="mb-0 font-13">+8.4% from last week</p>
							   </div>
						   </div>
					   </div>
					</div>
				  </div> 
				  
                  <div class="col">
					<div class="card radius-10 border-start border-0 border-4 border-secondary">
					   <div class="card-body">
						   <div class="d-flex align-items-center">
							   <div>
								   <p class="mb-0 text-secondary">Total Active Staff</p>
								   <h5 class="my-1 text-secondary">10,000</h5>
								   <p class="mb-0 font-13">+8.4% from last week</p>
							   </div>
						   </div>
					   </div>
					</div>
				  </div> 
                  <div class="col">
					<div class="card radius-10 border-start border-0 border-4 border-info">
					   <div class="card-body">
						   <div class="d-flex align-items-center">
							   <div>
								   <p class="mb-0 text-secondary">Total Inactive Clients</p>
								   <h5 class="my-1 text-info">0</h5>
								   <p class="mb-0 font-13">+100% from last week</p>
							   </div>
						   </div>
					   </div>
					</div>
				  </div> 
                  <div class="col">
					<div class="card radius-10 border-start border-0 border-4 border-warning">
					   <div class="card-body">
						   <div class="d-flex align-items-center">
							   <div>
								   <p class="mb-0 text-secondary">Total Inactive Staff</p>
								   <h5 class="my-1 text-warning">0</h5>
								   <p class="mb-0 font-13">+100% from last week</p>
							   </div>
						   </div>
					   </div>
					</div>
				  </div> 
                  
				</div><!--end row-->

				<div class="row">
                  
				   <div class="col-6 col-lg-6 d-flex">
                      <div class="card radius-10 w-100">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<div>
									<h6 class="mb-0">Payment & Disbursement Overview</h6>
								</div>
							</div>
						</div>
						  <div class="card-body">
							<div class="d-flex align-items-center ms-auto font-13 gap-2 mb-3">
								<span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1" style="color: #14abef"></i>Payment</span>
								<span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1" style="color: #ffc107"></i>Disbursement</span>
							</div>
							<div class="chart-container-1">
								<canvas id="chart1"></canvas>
							  </div>
						  </div>
						  <div class="row row-cols-1 row-cols-md-3 row-cols-xl-3 g-0 row-group text-center border-top">
							<div class="col">
							  <div class="p-3">
								<h5 class="mb-0">KES 3,050,000</h5>
								<small class="mb-0">Overall Payment <span> <i class="bx bx-up-arrow-alt align-middle"></i> 2.43%</span></small>
							  </div>
							</div>
							<div class="col">
							  <div class="p-3">
								<h5 class="mb-0">KES 4,500,000</h5>
								<small class="mb-0">Overall Disbursement <span> <i class="bx bx-up-arrow-alt align-middle"></i> 12.65%</span></small>
							  </div>
							</div>
							<div class="col">
							  <div class="p-3">
								<h5 class="mb-0">KES 2,050,000</h5>
								<small class="mb-0">Income<span> <i class="bx bx-up-arrow-alt align-middle"></i> 5.62%</span></small>
							  </div>
							</div>
						  </div>
					  </div>
				   </div>
				   <div class="col-12 col-lg-4 d-flex">
                       <div class="card radius-10 w-100">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<div>
									<h6 class="mb-0">Trending Products</h6>
								</div>
							</div>
						</div>
						   <div class="card-body">
							<div class="chart-container-2">
								<canvas id="chart2"></canvas>
							  </div>
						   </div>
						   <ul class="list-group list-group-flush">
							<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center border-top">KES 3,000 <span class="badge bg-success rounded-pill">25%</span>
							</li>
							<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">KES 5,000 <span class="badge bg-danger rounded-pill">10%</span>
							</li>
						</ul>
					   </div>
				   </div>
				</div><!--end row-->

				 <div class="card radius-10">
					<div class="card-header">
						<div class="d-flex align-items-center">
							<div>
								<h6 class="mb-0">Recent Transactions</h6>
							</div>
						</div>
					</div>
                         <div class="card-body">
						 <div class="table-responsive">
						   <table class="table align-middle mb-0">
							<thead class="table-light">
							 <tr>
							   <th>Product</th>
							   <th>Product ID</th>
							   <th>Status</th>
							   <th>Amount</th>
							   <th>Date</th>
							 </tr>
							 </thead>
							 <tbody><tr>
							  <td>KES 5,000</td>
							  <td>#9405822</td>
							  <td><span class="badge bg-gradient-quepal text-white shadow-sm w-100">Paid</span></td>
							  <td>KES 5,000</td>
							  <td>03 Feb 2020</td>
							 </tr>
		  
							 <tr>
							  <td>KES 3,000</td>
							  <td>#8304620</td>
							  <td><span class="badge bg-gradient-blooker text-white shadow-sm w-100">Pending</span></td>
							  <td>KES 3,000</td>
							  <td>05 Feb 2020</td>
							 </tr>
		  
							 <tr>
							  <td>KES 5,000</td>
							  <td>#4736890</td>
							  <td><span class="badge bg-gradient-bloody text-white shadow-sm w-100">Proccessed</span></td>
							  <td>KES 5,000</td>
							  <td>06 Feb 2020</td>
							 </tr>
		  
							 <tr>
							  <td>KES 3,000</td>
							  <td>#8543765</td>
							  <td><span class="badge bg-gradient-quepal text-white shadow-sm w-100">Paid</span></td>
							  <td>KES 3,000</td>
							  <td>14 Feb 2020</td>
							 </tr>
							 <tr>
							  <td>KES 5,000</td>
							  <td>#9629240</td>
							  <td><span class="badge bg-gradient-blooker text-white shadow-sm w-100">Pending</span></td>
							  <td>KES 5,000</td>
							  <td>18 Feb 2020</td>
							 </tr>
							 <tr>
							  <td>KES 5,000</td>
							  <td>#8506790</td>
							  <td><span class="badge bg-gradient-bloody text-white shadow-sm w-100">Processed</span></td>
							  <td>KES 5,000</td>
							  <td>21 Feb 2020</td>
							 </tr>
						    </tbody>
						  </table>
						  </div>
						 </div>
					</div>


			</div>
			<script>
    $(function() {
        "use strict";

        // Get the context of the canvas element
        var ctx = document.getElementById("chart1").getContext('2d');
        
        // Create gradients for the chart lines
        var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
        gradientStroke1.addColorStop(0, '#6078ea');  
        gradientStroke1.addColorStop(1, '#17c5ea'); 

        var gradientStroke2 = ctx.createLinearGradient(0, 0, 0, 300);
        gradientStroke2.addColorStop(0, '#ff8359');
        gradientStroke2.addColorStop(1, '#ffdf40');

        // Initialize the chart
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($labels),  // Inject the dynamic labels (months)
                datasets: [{
                    label: 'Payments',
                    data: @json($paymentData),  // Inject dynamic data for Payments
                    borderColor: gradientStroke1,
                    backgroundColor: gradientStroke1,
                    hoverBackgroundColor: gradientStroke1,
                    pointRadius: 0,
                    fill: false,
                    borderRadius: 20,
                    borderWidth: 0
                }, {
                    label: 'Disbursement',
                    data: @json($disbursementData),  // Inject dynamic data for Disbursements
                    borderColor: gradientStroke2,
                    backgroundColor: gradientStroke2,
                    hoverBackgroundColor: gradientStroke2,
                    pointRadius: 0,
                    fill: false,
                    borderRadius: 20,
                    borderWidth: 0
                }]
            },
            options: {
                maintainAspectRatio: false,
                barPercentage: 0.5,
                categoryPercentage: 0.8,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>

@endsection
