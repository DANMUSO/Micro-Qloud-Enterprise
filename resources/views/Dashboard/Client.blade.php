@extends('layouts.admindashboard')

@section('content')
<div class="page-content">
    <div class="row">
        <!-- Profile Details Section -->
        <div class="col-12 col-lg-4">
            <div class="card">
                <div class="card-body text-center">
                    <img src="{{ asset('storage/photos/'.$client->photo) }}" alt="Client Photo" class="rounded-circle" width="50%" height="120px">
                    <h3 class="mt-3">{{ $client->full_name }}</h3>
                    <p>{{ $client->shop_name }}</p>
                    <p>Email: {{ $client->email }}</p>
                    <p>Phone: {{ $client->phone }}</p>
                    <p>Location: {{ $client->location }}</p>

                    <!-- ID Photos Display -->
                    <div class="mt-3">
                        <h5>ID Photos:</h5>
                        <div class="d-flex justify-content-center">
                            @foreach (json_decode($client->id_photos) as $photo)
                                <img src="{{ asset('storage/id_photos/' . $photo) }}" alt="ID Photo" width="50" class="mx-2 hover-effect">
                            @endforeach
                        </div>
                    </div>
                    
                    <!-- Modal Trigger Button -->
                    <button class="btn btn-primary mt-4" data-bs-toggle="modal" data-bs-target="#loanModal">Grant Loan</button>
                </div>
            </div>
        </div>

        <!-- Loan History Section -->
        <div class="col-12 col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h4>Loan History</h4>
                    <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Loan Amount</th>
                            <th>Weekly Payment</th>
                            <th>Total Due</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($client->loans as $loan)
                            <tr>
                                <td>KES {{ number_format($loan->amount, 2) }}</td>
                                <td>KES {{ number_format($loan->weekly_payment, 2) }}</td>
                                <td>KES {{ number_format($loan->total_due, 2) }}</td>
                                <td>{{ $loan->status }}</td>
                            </tr>
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
                        <div class="mb-3">
                            <label for="loanAmount" class="form-label">Loan Amount</label>
                            <input type="number" class="form-control" id="loanAmount" name="loan_amount" required>
                        </div>
                        <div class="mb-3">
                            <label for="loanTerms" class="form-label">Loan Terms</label>
                            <textarea class="form-control" id="loanTerms" name="loan_terms" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="loanDuration" class="form-label">Loan Duration (Months)</label>
                            <input type="number" class="form-control" id="loanDuration" name="loan_duration" required>
                        </div>
                        <button type="submit" class="btn btn-success">Grant Loan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
