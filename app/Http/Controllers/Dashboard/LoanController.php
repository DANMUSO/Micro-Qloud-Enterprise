<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\Onboardedclients;
use Carbon\Carbon; 
use App\Models\PaymentSchedule;
class LoanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function createLoan(Request $request)
    {
       // Validate request data
    $validated = $request->validate([
        'client_id' => 'required|integer',
        'loan_amount' => 'required|numeric',
        'loan_duration' => 'required|integer|in:3,4,5', // Restrict to 3, 4, or 5 weeks
    ]);
    // Calculate constants
    $principal = $validated['loan_amount'];
    $weeks = $validated['loan_duration'];
    $weeklyInterest = $principal * 0.0625; // 6.25% interest
    $weeklyInstallment = $principal / $weeks;

    // Weekly payment (interest + installment)
    $weeklyPayment = $weeklyInterest + $weeklyInstallment;

    // Penalty for late payment
    $penalty = $weeklyPayment * 0.10; // 10% of weekly payment

    // Calculate all next payment dues
    $currentDate = Carbon::now();
    $paymentSchedule = [];
    for ($i = 1; $i <= $weeks; $i++) {
        $paymentSchedule[] = [
            'week' => $i,
            'amount_due' => $weeklyPayment,
            'due_date' => $currentDate->copy()->addWeeks($i),
        ];
    }

    // Save loan record
    $loan = Loan::create([
        'client_id' => $validated['client_id'],
        'principal_amount' => $principal,
        'weekly_interest' => $weeklyInterest,
        'weekly_installment' => $weeklyInstallment,
        'weekly_payment' => $weeklyPayment,
        'penalty_rate' => 0.10, // 10%
        'next_payment_due' => $paymentSchedule[0]['due_date'], // First payment due date
        'total_due' => $principal + ($weeklyInterest * $weeks), // Total due without penalties
    ]);

    // Optionally save payment schedule in a separate table
    foreach ($paymentSchedule as $payment) {
        PaymentSchedule::create([
            'loan_id' => $loan->id,
            'week' => $payment['week'],
            'amount_due' => $payment['amount_due'],
            'due_date' => $payment['due_date'],
            'status' => 0,
        ]);
    }

    // Return response
    return response()->json([
        'message' => 'Loan created successfully',
        'loan' => $loan,
        'payment_schedule' => $paymentSchedule,
    ]); 
    
    }

    public function makePayment(Request $request, $loanId)
    {
        $loan = Loan::findOrFail($loanId);

        $validated = $request->validate([
            'payment_amount' => 'required|numeric',
        ]);

        $paymentAmount = $validated['payment_amount'];

        // Check if the payment is late
        $daysLate = Carbon::now()->diffInDays($loan->next_payment_due, false);
        $penalty = $loan->calculatePenalty($daysLate);

        // If the payment is late, apply the penalty
        if ($penalty > 0) {
            $loan->penalty_total += $penalty;
        }

        // Check if the client has paid the full weekly amount
        if ($paymentAmount >= $loan->weekly_payment) {
            // Update the loan status and next payment date
            $loan->next_payment_due = Carbon::now()->addWeek();
            $loan->status = 'approved'; // Example: Change status to approved after each payment

            // Calculate remaining total due
            $loan->total_due = $loan->calculateDueAmount();
            $loan->save();
            return response()->json(['message' => 'Payment successful', 'loan' => $loan]);
        } else {
            return response()->json(['message' => 'Insufficient payment amount']);
        }
    }

    public function viewLoan($loanId)
    {
        $loan = Loan::findOrFail($loanId);
        return view('loan.details', compact('loan'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
