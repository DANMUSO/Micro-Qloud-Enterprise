@extends('layouts.client')
@section('content')
<div class="page-content">
	<div class="row">
    <div class="col-md-8">
        <div class="card radius-10 border-start border-0 border-4 border-primary">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="me-3">
                        <p class="mb-0 text-secondary"><b>Amount Reserved Just for You</b></p>
                        <div class="row">
    <div class="col-md-12">
                        <div class="card">
            <div class="card-body">
            <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Loan Amount</th>
                            <th>Weekly Payment</th>
                            <th>Total Due</th>
                            <th>Next Payment Due</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($client->loans as $loan)
                            <tr>
                                <td>KES {{ number_format($loan->principal_amount, 2) }}</td>
                                <td>KES {{ number_format($loan->weekly_payment, 2) }}</td>
                                <td>KES {{ number_format($loan->total_due, 2) }}</td>
                              
                                <td>{{ \Carbon\Carbon::parse($loan->next_payment_due)->format('Y-m-d') }}</td>
                                <td><button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#scheduleModal{{ $loan->id }}">View Schedule</button></td>
                            </tr>

                            <!-- Modal for Loan Payment Schedule -->
                            <div class="modal fade" id="scheduleModal{{ $loan->id }}" tabindex="-1" aria-labelledby="scheduleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="scheduleModalLabel">Payment Schedule for Loan: KES {{ number_format($loan->principal_amount, 2) }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <div class="row">
                                            <!-- Loop through each payment schedule and display it in a card -->
                                            @foreach($loan->loanschedule as $schedule)
    @php
        $isActive = \Carbon\Carbon::today()->between(
            \Carbon\Carbon::parse($schedule->due_date)->subDays(7),
            \Carbon\Carbon::parse($schedule->due_date)
        );
    @endphp
    <div class="col-md-4 mb-3">
        <!-- Dynamically add classes to the card based on status and active schedule -->
        <div class="card 
            @if($isActive) bg-primary text-white 
            @elseif($schedule->status == 0) bg-warning text-dark 
            @elseif($schedule->status == 1) bg-success text-white 
            @elseif($schedule->status == 2) bg-danger text-white 
            @else bg-secondary text-white 
            @endif">
            <div class="card-body">
                <h5 class="card-title">Week {{ $schedule->week }}</h5>
                <p class="card-text"><strong>Amount Due:</strong> KES {{ number_format($schedule->amount_due, 2) }}</p>
                <p class="card-text"><strong>Due Date:</strong> {{ \Carbon\Carbon::parse($schedule->due_date)->format('Y-m-d') }}</p>

                <!-- Displaying the status -->
                <p class="card-text">
                    <strong>Status:</strong> 
                    @if($schedule->status == 0)
                        <span class="text-dark">Processed</span>
                    @elseif($schedule->status == 1)
                        <span class="text-white">Paid</span>
                    @elseif($schedule->status == 2)
                        <span class="text-white">Overdue</span>
                    @else
                        <span class="text-white">Unknown</span>
                    @endif
                </p>

                <!-- Indicate active card -->
                @if($isActive)
                    <span class="badge bg-light text-dark">Current Schedule</span>
                @endif
            </div>
        </div>
    </div>
@endforeach

                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>


                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div><!-- Example loan amount -->
        </div></div>
                        <p class="mb-0 font-13"><i>Money will be send to this number {{$client->phone}}<b></b></i></p>
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
                   
                        <button  class="btn btn-secondary" disabled>You cannot apply, as it is within 3 days before or after the payroll date.</button>
                                     
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
                        <h5 class="my-1 text-success">Borrowed amount is payable on the next payroll date.</h5>
                        <p class="mb-0 font-13">Loan Amount: KES </p>
                        <p class="mb-0 font-13">Interest: KES  </p>
                        <p class="mb-0 font-13"><strong>Total Payable: KES  </strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
                  
				</div><!--end row-->



			</div>
@endsection
