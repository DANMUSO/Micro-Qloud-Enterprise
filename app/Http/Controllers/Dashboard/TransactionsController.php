<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transactions;
use App\Models\Employees;
use Illuminate\Support\Facades\Mail;
use App\Mail\Loanrequest;
use Illuminate\Support\Facades\Auth;
use App\Mail\Paymentupdate;
class TransactionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staff = Auth::user();
        $staff_email = $staff->email;
        $employee = Employees::where('email', $staff_email)->first();
        $transactions = Transactions::where('employee_id', $employee->id)->latest()->get();
       
        return view('Staff.Transactions', compact('transactions') );
    }
    public function updateStatus(Request $request){
        $id = $request->id;
        
        $transaction = Transactions::find($id);
        $transaction->status = $request->status;
        
        if ($transaction->save()) {
            $payment = Transactions::with('employee')->where('id', $id)->first();
            $email = $payment ->employee->email;
            $amount =  $payment->amount + $payment->profit;
            Mail::to($email)->send(new Paymentupdate($amount));
            return response()->json(['success' => true, 'message' => 'Transaction status updated successfully.']);
        } else {
            return response()->json(['success' => false, 'message' => 'Failed to update transaction status.']);
        }
    }
    public function updatePayment(Request $request)
    {
        $companyId = $request->input('company_id');

        // Fetch transaction with related employee
        $transaction = Transactions::with('employee')
            ->whereHas('employee', function ($query) use ($companyId) {
                $query->where('company_id', $companyId);
            })
            ->get();
        if ($transaction->isEmpty()) {
            return response()->json(['message' => 'No transactions found for the provided company ID.'], 404);
        }
        foreach ($transaction as $trans) {
            $trans->status = 4; // Change the status or perform any other update
            $trans->save();
        }
    }
    public function declined()
    {
     
        $transactions = Transactions::with('employee')->where('status', 3)->latest()->get();
      
        return view('Dashboard.Declined', compact('transactions') );
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
        // Validate data
        $request->validate([
            'employee_id' => 'required|integer',
            'amount' => 'required|numeric',
            'payroll_date' => 'required|date',
            'status' => 'required|integer'
        ]);

        // Insert data into the transaction table
        $transaction = new Transactions();
        $transaction->employee_id = $request->employee_id;
        $transaction->amount = $request->amount;
        $transaction->profit = $request->amount * 0.3;
        $transaction->payroll_date = $request->payroll_date;
        $transaction->status = $request->status;
        
        if ($transaction->save()) {
            Mail::to('kimdan2030@gmail.com')->send(new Loanrequest("Loan Request"));
            return response()->json(['success' => 'Transaction recorded successfully']);
        } else {
            return response()->json(['error' => 'Failed to record transaction'], 500);
        }
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
    public function update($id, Request $request)
    {
        $loanRequest = Transactions::find($id);
    
        if (!$loanRequest) {
            return response()->json(['success' => false, 'message' => 'Loan request not found.']);
        }
    
        $loanRequest->status = $request->status;
        $loanRequest->save();
    
        $message = $request->status == 2 ? 'Loan request approved.' : 'Loan request declined.';
    
        return response()->json(['success' => true, 'message' => $message]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
