@extends('layouts.admindashboard')

@section('content')
<div class="page-content">
    <div class="row">
        <!-- Profile Details Section -->
        <div class="col-12 col-lg-4">
    <div class="card">
        <div class="card-body text-center">
            <!-- Client Photo -->
            <img src="{{ asset('storage/photos/'.$client->photo) }}" alt="Client Photo" class="rounded-circle mb-3" width="50%" height="120px">
            
            <!-- Client Full Name -->
            <h3 class="mt-3">{{ $client->full_name }}</h3>
        </div>
    </div>

    <!-- Shop Name Card -->
    <div class="card mt-3">
        <div class="card-body">
            <p><strong>Shop Name:</strong> {{ $client->shop_name }}</p>
        </div>
    </div>

    <!-- Email Card -->
    <div class="card mt-3">
        <div class="card-body">
            <p><strong>Email:</strong> {{ $client->email }}</p>
        </div>
    </div>

    <!-- Phone Card -->
    <div class="card mt-3">
        <div class="card-body">
            <p><strong>Phone:</strong> {{ $client->phone }}</p>
        </div>
    </div>

    <!-- Location Card -->
    <div class="card mt-3">
        <div class="card-body">
            <p><strong>Location:</strong> {{ $client->location }}</p>
        </div>
    </div>

    <!-- ID Photos Card -->
    <div class="card mt-3">
        <div class="card-body">
            <h5>ID Photos:</h5>
            <div class="d-flex justify-content-center">
                @foreach (json_decode($client->id_photos) as $photo)
                    <img src="{{ asset('storage/id_photos/' . $photo) }}" alt="ID Photo" width="50" class="mx-2 hover-effect">
                @endforeach
            </div>
        </div>
    </div>

</div>


        <!-- Loan History Section -->
        <div class="col-12 col-lg-8">
            <div class="card">
                <div class="card-body">
                <div class="row">
                    <div class="card mt-3 col-md-5">
                        <div class="card-body text-center">
                        <h4>Loan History</h4>
                        </div>
                    </div>
                    <div class=" col-md-2">
                       
                    </div>
                                    <div class="card mt-3 col-md-5">
                        <div class="card-body text-center">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loanModal">Grant Loan</button>
                        </div>
                    </div>
                    </div>
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
            </div>
        </div>
    </div>

    <!-- Loan Modal -->
    <div class="modal fade" id="loanModal" tabindex="-1" aria-labelledby="loanModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loanModalLabel">Grant Loan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form id="loanForm">
                @csrf
                    <div class="mb-3">
                        <input type="hidden" class="form-control" id="client_id" name="client_id" value="{{ $client->id }}" required readonly>
                    </div>
                    <div class="mb-3">  
                        <label for="loan_amount" class="form-label">Loan Amount</label>
                        <input type="number" class="form-control" id="loan_amount" name="loan_amount" required>
                    </div>
                    <div class="mb-3">
                        <label for="loanDuration" class="form-label">Loan Duration (Weeks)</label>
                        <input type="number" class="form-control" id="loanDuration" name="loan_duration" required>
                    </div>
                    <button type="submit" class="btn btn-success">Grant Loan</button>
                </form>

                <!-- Add a loading spinner or success message here -->
                <div id="responseMessage"></div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
