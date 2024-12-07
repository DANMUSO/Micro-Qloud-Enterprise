<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\Onboardedclients;
use Carbon\Carbon;
class LoanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function createLoan(Request $request, $clientId)
    {
        
        // Validate request data
        $validated = $request->validate([
            'loan_amount' => 'required|numeric',
            'penalty_rate' => 'required|numeric',
            'payment_schedule_weeks' => 'required|integer',
        ]);

        $weeklyPayment = $validated['loan_amount'] / $validated['payment_schedule_weeks'];
        $totalDue = $validated['loan_amount'] + ($weeklyPayment * $validated['payment_schedule_weeks'] * $validated['penalty_rate']);

        // Create loan record
        $loan = Loan::create([
            'client_id' => $clientId,
            'amount' => $validated['loan_amount'],
            'penalty_rate' => $validated['penalty_rate'],
            'total_due' => $totalDue,
            'weekly_payment' => $weeklyPayment,
            'next_payment_due' => Carbon::now()->addWeeks(1), // Next payment due in 1 week
        ]);

        return response()->json(['message' => 'Loan created successfully', 'loan' => $loan]);
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
