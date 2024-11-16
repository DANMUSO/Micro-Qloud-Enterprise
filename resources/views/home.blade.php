@extends('layouts.app')
@section('content')
<div class="page-content">
				<div class="row">
                   

    <div class="col-md-8">
        <div class="card radius-10 border-start border-0 border-4 border-primary">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="me-3">
                        <p class="mb-0 text-secondary"><b>Amount Reserved Just for You</b></p>
                        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Loan Summary</h5>
                <hr>
                <p class="card-text">
                    <strong>Principal Amount:</strong> KES {{ Session::get('employee')['amount'] }}
                </p>
                <p class="card-text">
                    <strong>Interest Amount:</strong> KES {{ Session::get('employee')['amount'] * 0.3 }}
                </p>
                <p class="card-text">
                    <strong>Total Amount:</strong> KES {{ Session::get('employee')['amount'] + (Session::get('employee')['amount'] * 0.3) }}
                </p>
            </div>
        </div><!-- Example loan amount -->
                        <p class="mb-0 font-13"><i>Money will be send to this number <b>{{ Session::get('employee')['phone_no'] }}</b></i></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card radius-10 border-start border-0 border-4 border-primary">
            <div class="card-body">
                <div class="d-flex align-items-center">
              
                    <div class="ms-auto">
                    <!-- if   {{ Session::get('employee')['company']['payroll_date'] }} someone can't apply 5 days prior to payroll date and 5 days after payroll  -->

                        @php
                            $payrollDate = \Carbon\Carbon::parse(Session::get('employee')['company']['payroll_date']);
                            $currentDate = \Carbon\Carbon::now();
                            $dateDifference = $currentDate->diffInDays($payrollDate);
                        @endphp

                        @if ($dateDifference <= 5 && $dateDifference >= -5)
                        <button  class="btn btn-secondary" disabled>You cannot apply, as it is within 5 days before or after the payroll date.</button>
                        
                        @else
                        @if (session()->get('transaction.status', '5') == 0 || session()->get('transaction.status', '5') == 1)
                                                <button class="btn btn-primary" disabled>Pending</button>
                                                @elseif (session()->get('transaction.status', '5') == 2)
                                                <button class="btn btn-success" disabled>Approved</button>
                                                @else
                                                @if (Session::get('employee')['status'] == 1)
                                                <button class="btn btn-danger" disabled>Await Confirmation</button>
                                                @else
                                                <button id="applyNowBtn" class="btn btn-primary">Apply Now </button>
                                                <!-- Status message -->
                                                 
                                                @endif
                                                <p id="statusMessage" class="mt-3"></p><!-- Apply Now button -->
                                                @endif
                        @endif




                                            
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Card 3: Loan Duration and Payable Amount -->
    <div class="col-md-12">
        <div class="card radius-10 border-start border-0 border-4 border-success">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="me-3">
                        <p class="mb-0 text-secondary"><b>Loan Duration & Payable Amount</b></p>
                        <h5 class="my-1 text-success">1 Month</h5>
                        <p class="mb-0 font-13">Loan Amount: KES {{ Session::get('employee')['amount'] }}</p>
                        <p class="mb-0 font-13">Interest: KES {{ Session::get('employee')['amount'] *0.3 }} </p>
                        <p class="mb-0 font-13"><strong>Total Payable: KES {{ Session::get('employee')['amount'] + Session::get('employee')['amount'] *0.3 }} </strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
                  
				</div><!--end row-->



			</div>
@endsection
