<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Employees;
use App\Models\Companies;
use App\Models\Loan;
use App\Models\Onboardedclients;
use App\Models\Transactions;
use Carbon\Carbon;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $userName = $user->name;
       
        $role = $user->role; 
        if($role == 2){
// Fetch all payments grouped by YEAR, MONTH, and DAY based on updated_at and status = 4
$payments = Transactions::selectRaw('DATE_FORMAT(updated_at, "%Y-%m-%d") as full_date, SUM(amount + profit) as total_payment')
    ->where('status', 4)
    ->groupBy('full_date')
    ->orderByRaw('DATE_FORMAT(updated_at, "%Y-%m-%d") ASC')
    ->get();

// Fetch all disbursements grouped by YEAR, MONTH, and DAY
$disbursements = Transactions::selectRaw('DATE_FORMAT(created_at, "%Y-%m-%d") as full_date, SUM(amount) as total_disbursement')
    ->where('status', 2)
    ->groupBy('full_date')
    ->orderByRaw('DATE_FORMAT(created_at, "%Y-%m-%d") ASC')
    ->get();

// Initialize arrays for data
$labels = []; // To hold 'Year-Month-Day' labels
$paymentData = []; // To hold payment values
$disbursementData = []; // To hold disbursement values

// Process payments and disbursements to match data by full date
$paymentMap = $payments->keyBy('full_date');
$disbursementMap = $disbursements->keyBy('full_date');

// Merge all unique dates and sort them
$allFullDates = $paymentMap->keys()->merge($disbursementMap->keys())->unique()->sort();

// Prepare data for the chart
foreach ($allFullDates as $fullDate) {
    $labels[] = $fullDate; // Use the full date format for the label
    $paymentData[] = $paymentMap->get($fullDate)->total_payment ?? 0;
    $disbursementData[] = $disbursementMap->get($fullDate)->total_disbursement ?? 0;
}
            $disbursement = Transactions::select('amount', "profit")->where('status', 2)->get();
            $paid = Transactions::select('amount', "profit")->where('status', 4)->get();
            $olb = Transactions::select('amount', "profit")->where('status', 5)->get();

            $recenttrans =Transactions::with('employee.company')->latest()->limit(5)->get();
            $activestaffCount = Employees::where('status', 0)->count();
            $inactivestaffCount = Employees::where('status', 1)->count();
            Session::put([
                'userName' =>  $userName,
                'disbursement' =>  $disbursement,
                'paid' =>  $paid,
                'olb' =>  $olb,
            ]);
            return view('admin', compact('labels', 'paymentData', 'disbursementData','recenttrans','activestaffCount','inactivestaffCount'));
        }elseif( $role == 0 ){
            $email = $user->email;
            $employee = Employees::with('company')->where('email', $email)->first();
            $transaction = Transactions::where('employee_id', $employee->id)->latest()->first();
    
            Session::put([
                'userName' =>  $userName,
                'employee' =>  $employee,
                'transaction' =>  $transaction,
            ]);
            return view('home');
        }else{
            $email = $user->email;
          
            $client = Onboardedclients::with('loans.loanschedule')->where('email', $email)->first();
            
            $id = $client->id;
            $loan = Loan::where('client_id', $id)->latest()->first();
            $userName = $user->name;
            Session::put([
                'userName' =>  $userName,
            ]);
            return view('clientdashboard', compact('client','loan'));
        }
      
        
    }
}
